<?php

class WarehousePackager {
	const CONTROL_WEIGHT = 1; // pound
	const SESSION_CACHE_KEY = '__JOYCONE_WAREHOUSE_PACKAGES__';

	private $order;

	private $products = array();
	private $product_nodes = array();
	private $warehouses = array();
	private $warehouse_packages = array();
	private $warehouse_products = array();
	private $product_warehouses = array();
	private $warehouses_sorted = null;

	private $packaging_done = false;
	private $is_packaging = false;

	private $current_control_warehouse = null;
	private $is_calculating_control = false;

	private static $instance = null;
	public static function instance($order = null) {
		if (static::$instance === null) static::$instance = new self($order);
		return static::$instance;
	}

	private function __construct($order) {
		error_reporting(E_ALL);
		ini_set('display_erorrs', 1);

		if ($order === null) throw new Exception('OOPS!!!');

		$this->order = $order;

		$warehouses = Warehouse::all();
		foreach ($warehouses as $w) {
			$bundlePackage = new stdClass();
			$bundlePackage->products     = array();
			$bundlePackage->orig         = $w->getAddressArray();
			$bundlePackage->weight       = 0;
			$bundlePackage->qty          = 1;
			$bundlePackage->price        = 0;
			$bundlePackage->length_units = 'in';
			$bundlePackage->weight_units = 'lb';

			$this->warehouses[$w->warehouse_id] = $w;
			$this->warehouse_packages[$w->warehouse_id] = array('bundle' => $bundlePackage);
		}

		foreach ($order->products as $product) {
			$this->products[$product->nid] = $product;
			$this->product_nodes[$product->nid] = node_load($product->nid);
		}

		$this->tryLoadFromSession();
	}

	public function tryLoadFromSession() {
		if (empty($_SESSION[static::SESSION_CACHE_KEY])) return false;
		$cache = unserialize($_SESSION[static::SESSION_CACHE_KEY]);
		if (empty($cache['sig'])) return false;

		$signature = '|';

		$details = array();
		foreach ($this->order as $key => $value) {
			if (substr($key, 0, 9) == 'delivery_') {
				$signature .= $value.'|';
			}
		}
		foreach ($this->order->products as $product) {
			$signature .= str_repeat($product->nid, $product->qty).'|';
		}

		if ($cache['sig'] !== $signature) return false;

		$this->warehouse_packages = $cache['warehouse_packages'];
		$this->warehouse_products = $cache['warehouse_products'];
		$this->product_warehouses = $cache['product_warehouses'];

		$this->packaging_done = true;

		return true;
	}

	public function saveToSession() {
		$signature = '|';

		$details = array();
		foreach ($this->order as $key => $value) {
			if (substr($key, 0, 9) == 'delivery_') {
				$signature .= $value.'|';
			}
		}
		foreach ($this->order->products as $product) {
			$signature .= str_repeat($product->nid, $product->qty).'|';
		}

		$cache = array(
			'sig' => $signature,
			'warehouse_packages' => $this->warehouse_packages,
			'warehouse_products' => $this->warehouse_products,
			'product_warehouses' => $this->product_warehouses,
		);

		$_SESSION[static::SESSION_CACHE_KEY] = serialize($cache);
	}

	public function sortWarehousesByCost() {
		if ($this->warehouses_sorted !== null) return;

		require_once drupal_get_path('module', 'uc_quote').'/uc_quote.pages.inc';

		$this->is_calculating_control = true;

		$warehouse_control_costs = array();

		$dummy_order = drupal_clone($this->order);
		$dummy_product = drupal_clone($this->order->products[0]);
		unset($dummy_order->products);
		$dummy_product->weight = static::CONTROL_WEIGHT;
		$dummy_order->products = array($dummy_product);

		foreach (array_keys($this->warehouses) as $warehouse_id) {
			$this->current_control_warehouse = $warehouse_id;
			$quoteData = _uc_quote_assemble_quotes($dummy_order);

		    $bestRate = 0;
		    $bestMethod = '';
		    foreach ($quoteData as $methodName => $methodRates) {
				foreach ($methodRates as $methodRate => $rateDetails) {
					if ($rateDetails['rate']) {
						if (($rateDetails['rate'] < $bestRate) || ($bestRate == 0)) {
							$bestRate = $rateDetails['rate'];
							$bestMethod = $methodName;
						}
					}
				}
		    }

		    $warehouse_control_costs[$warehouse_id] = $bestRate;
		}

		asort($warehouse_control_costs);
		$this->warehouses_sorted = array_keys($warehouse_control_costs);

		$this->is_calculating_control = false;
		$this->current_control_warehouse = null;
	}

	public function getCheapestWarehouse($warehouse_ids) {
		if (empty($warehouse_ids)) { var_dump($this->products); throw new Exception('OOPS!!!'); }

		if (count($warehouse_ids) === 1) return reset($warehouse_ids);

		$this->sortWarehousesByCost();
		foreach ($this->warehouses_sorted as $id) {
			if (in_array($id, $warehouse_ids)) return $id;
		}

		return reset($warehouse_ids);
	}

	public function packageProducts() {
		if ($this->is_packaging || $this->packaging_done) return;

		$this->is_packaging = true;

		foreach ($this->products as $product) {
			$conversion = uc_length_conversion($product->length_units, 'in');
			$weight     = $product->weight * $product->qty * uc_weight_conversion($product->weight_units, 'lb');

			$pkg_type = $product->ups ? $product->ups['pkg_type'] : '02';
			$pkg_length = $product->length * $conversion;
			$pkg_width  = $product->width  * $conversion;
			$pkg_height = $product->height * $conversion;

			$warehouse_id = $this->getCheapestWarehouse($this->product_nodes[$product->nid]->uc_warehouse_id);
			$this->product_warehouses[$product->nid] = $warehouse_id;
			$this->warehouse_products[$warehouse_id] = $product->nid;

			if ($product->uc_warehouse_ship_separately) {
				for ($q = 0; $q < $product->qty; $q++) {
					$package = new stdClass();

					$package->products     = array(array('nid' => $product->nid, 'qty' => 1));
					$package->orig         = $this->warehouses[$warehouse_id]->getAddressArray();
					$package->description  = $product->model;
					$package->qty          = 1;
					$package->pkg_type     = $pkg_type;
					$package->weight       = $product->weight;
					$package->price        = $product->price;
					$package->length       = $pkg_length;
					$package->width        = $pkg_width;
					$package->height       = $pkg_height;
					$package->length_units = 'in';
					$package->weight_units = 'lb';

					$this->warehouse_packages[$warehouse_id][] = $package;
				}
			} else {
				$this->warehouse_packages[$warehouse_id]['bundle']->products[] = array('nid' => $product->nid, 'qty' => $product->qty);
				$this->warehouse_packages[$warehouse_id]['bundle']->pkg_type   = $product->ups ? $product->ups['pkg_type'] : '02';
				$this->warehouse_packages[$warehouse_id]['bundle']->weight    += $product->weight * $product->qty;
				$this->warehouse_packages[$warehouse_id]['bundle']->price     += $product->price * $product->qty;
				$this->warehouse_packages[$warehouse_id]['bundle']->length     = max($pkg_length, $this->warehouse_packages[$warehouse_id]['bundle']->length);
				$this->warehouse_packages[$warehouse_id]['bundle']->width      = max($pkg_width,  $this->warehouse_packages[$warehouse_id]['bundle']->width);
				$this->warehouse_packages[$warehouse_id]['bundle']->height     = max($pkg_height, $this->warehouse_packages[$warehouse_id]['bundle']->height);
			}
		}

		$this->saveToSession();

		$this->packaging_done = true;
		$this->is_packaging = false;
	}

	public function isDone() {
		return $this->packaging_done;
	}

	public function getProductWarehouse($product_id) {
		return $this->warehouses[$this->product_warehouses[$product_id]];
	}

	public function overrideStoreAddress() {
		if ($this->current_control_warehouse === null) return null;
		return $this->warehouses[$this->current_control_warehouse];
	}

	public function getUPSPackages() {
		if (!$this->isDone()) $this->packageProducts();

		$ups_packages = array();

		foreach ($this->warehouse_packages as $warehouse_id => $packages) {
			foreach ($packages as $package) {
				if (empty($package->weight)) continue;

				$ups_packages[] = array($package);
			}
		}

		return $ups_packages;
	}

	public function createWarehousePackages() {
		if (!$this->isDone()) $this->packageProducts();

		$result = db_query("SELECT * FROM uc_packages WHERE order_id = %d", $this->order->order_id);
		while ($package = db_fetch_object($result)) {
			db_query("DELETE FROM uc_packaged_products WHERE package_id = %d", $package->package_id);
		}
		db_query("DELETE FROM uc_packages WHERE order_id = %d", $this->order->order_id);

		foreach ($this->warehouse_packages as $warehouse_id => $packages) {
			foreach ($packages as $package) {
				if (empty($package->products)) continue;

				$db_package = array('order_id' => $this->order->order_id, 'products' => array(), 'shipping_type' => null);

				foreach ($package->products as $product) {
					$order_product_id = static::getOrderProductId($this->order->order_id, $product['nid']);

					$db_package['products'][$order_product_id] = new stdClass();
					$db_package['products'][$order_product_id]->checked = 1;
					$db_package['products'][$order_product_id]->qty = $product['qty'];
					$db_package['shipping_type'] = $this->product_nodes[$product['nid']]->shipping_type;
				}

				uc_shipping_package_save($db_package);
				$package_id = db_last_insert_id('uc_packages', 'package_id');
				db_query('UPDATE {uc_packages} SET warehouse = "%s" WHERE package_id = %d', $this->warehouses[$warehouse_id]->warehouse_name, $package_id);
			}
		}
	}

	private static function getOrderProductId($order, $nid) {
		$query = 'SELECT * FROM {uc_order_products} WHERE order_id = "%d" AND nid="%d"';
		$result = db_query($query, $order, $nid);
		if ($data = db_fetch_object($result)) {
			return $data->order_product_id;
		}

		return '';
	}


	public static $log = [];
	public static function log() {
		static::$log[] = func_get_args();
	}
}
