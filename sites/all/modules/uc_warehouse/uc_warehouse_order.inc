<?php

/**
 * Set the uc_order_warehouses variable for the given order
 *
 * The uc_order_warehouses variable will contain an array of warehouses used on
 * the given order.  Each warehouse entry will contain a list of products to be
 * shipped from that particular warehouse.
 *
 * @param $order
 *   The Ubercart order to set warehouse for.  Default to NULL/
 */
function setupOrderWarehouses($order = '') {
  require_once __DIR__.'/uc_warehouse_packager.inc';
  // variable_set('uc_order_warehouses' . uc_cart_get_id(), '');

  if ($order) {
    $packager = WarehousePackager::instance($order);
    $packager->packageProducts();

    // $orderWarehouses = loadWarehouses($order);
    // $orderWarehouses = setWarehousePriorityRates($order, $orderWarehouses);
    // $orderWarehouses = processSingleWarehouseProducts($order, $orderWarehouses);
    // $orderWarehouses = sortArray($orderWarehouses);
    // $orderWarehouses = addProductsToWarehouseByPriority($order, $orderWarehouses);

    // echo '<pre>';var_dump($orderWarehouses);die();

    // variable_set('uc_order_warehouses' . uc_cart_get_id(), $orderWarehouses);
  }
}


/**
 * Create an array of warehouses available to pick from based on the
 * products ordered.
 *
 * @param $order
 *   Ubercart order to process
 */
function loadWarehouses($order) {
  $warehouses = array();

  foreach ($order->products as $product) {
    foreach ($product->uc_warehouse_id as $warehouseId) {
      if (! array_key_exists($warehouseId, $warehouses)) {
        $warehouses[$warehouseId] = new Warehouse($warehouseId);
      }
    }
  }

  return $warehouses;
}


/**
 * Determine what the average product weight is for this order.
 *
 * @param $order
 *   Ubercart order to process
 *
 * @return
 *   Returns the average product weight for the given order.
 */
function calcAverageProductWeight($order) {
  $totalWeight = 0;
  $totalProducts = 0;

  foreach ($order->products as $product) {
    $totalWeight += $product->weight;
    $totalProducts ++;
  }

  return $totalWeight / $totalProducts;
}


/**
 * Determine the best shipping rate for each warehouse
 */
function setWarehousePriorityRates($order, $warehouses) {
  variable_set('uc_warehouse_check_for_product_address' . uc_cart_get_id(), false);
  $defautlStoreAddress = variable_get('uc_quote_store_default_address' . uc_cart_get_id(), '');

  // Create a test order with the dummy product
  $testOrder = drupal_clone($order);
  $testProduct = drupal_clone($order->products[0]);
  unset($testOrder->products);
  $testProduct->weight = calcAverageProductWeight($order);
  $testOrder->products[0] = $testProduct;


  $address = new stdClass();
  foreach ($warehouses as $warehouseKey => $warehouse) {
    $address->street1 = $warehouse->street_address_1;
    $address->street2 = $warehouse->street_address_2;
    $address->city = $warehouse->city;
    $address->zone = $warehouse->zone;
    $address->postal_code = $warehouse->postal_code;
    $address->country = $warehouse->country;
    variable_set('uc_quote_store_default_address' . uc_cart_get_id(), $address);

    $quoteData = _uc_quote_assemble_quotes($testOrder);

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

    $warehouses[$warehouseKey]->priority_rate = $bestRate;
  }

  variable_set('uc_warehouse_check_for_product_address' . uc_cart_get_id(), true);
  variable_set('uc_warehouse_check_for_product_address' . uc_cart_get_id(), $defautlStoreAddress);

  return $warehouses;
}

/**
 * Set the ship_from value for each of the products
 *
 * The warehouse selected is the warehouse that has the highest priority and has that
 * product available
 */
function addProductsToWarehouseByPriority($order, $warehouses) {
  foreach ($order->products as $productKey => $product) {
    if (count($product->uc_warehouse_id) > 1) {
      foreach ($warehouses as $warehouseKey => $warehouse) {
        if (in_array($warehouse->warehouse_id, $product->uc_warehouse_id)) {
          $warehouses[$warehouseKey]->products[] = $product;
          break;
        }
      }
    }
  }

  return $warehouses;
}

/**
 * Add products only available in one warehouse to that warehouse
 */
function processSingleWarehouseProducts($order, $warehouses) {
  $testOrder = drupal_clone($order);
  foreach ($order->products as $productKey => $product) {
    if (count($product->uc_warehouse_id) == 1) {
      foreach ($product->uc_warehouse_id as $warehouseId) {
        $warehouses[$warehouseId]->products[] = $product;
        $warehouses[$warehouseId]->has_exclusive_products = 1;
      }
    }
  }

  return $warehouses;
}

/**
 * Set the ship_from value for each of the products
 *
 * The warehouse selected is the warehouse that has the highest priority and has that
 * product available
 */
function addProductsToWarehouseByCost($order, $warehouses) {
  variable_set('uc_warehouse_check_for_product_address' . uc_cart_get_id(), false);
  $defautlStoreAddress = variable_get('uc_quote_store_default_address' . uc_cart_get_id(), '');

  $testOrder = drupal_clone($order);
  foreach ($order->products as $productKey => $product) {
    // Product only available in one warehouse
    if (count($product->uc_warehouse_id) == 1) {
      foreach ($product->uc_warehouse_id as $warehouseId) {
        $warehouses[$warehouseId]->products[] = $product;
      }
    }

    // Check for least expensive warehouse
    else {
      $shipFrom = new stdClass();
      $bestRate = 0;
      $bestWarehouseId = '';
      foreach ($product->uc_warehouse_id as $warehouseId) {
        // Set the default shipping address to the warehouse address.
        $shipFrom->street1 = $warehouses[$warehouseId]->street_address_1;
        $shipFrom->street2 = $warehouses[$warehouseId]->street_address_2;
        $shipFrom->city = $warehouses[$warehouseId]->city;
        $shipFrom->zone = $warehouses[$warehouseId]->zone;
        $shipFrom->postal_code = $warehouses[$warehouseId]->postal_code;
        $shipFrom->country = $warehouses[$warehouseId]->country;
        variable_set('uc_quote_store_default_address' . uc_cart_get_id(), $shipFrom);
        $product->shipping_address = $shipFrom;

        unset($testOrder->products);
        $testOrder->products[0] = $product;
        $quoteData = _uc_quote_assemble_quotes($testOrder);

        $methodDate = $quoteData[0];
        $rate = $methodData[0]['rate'];

        if (($rate < $bestRate) || ($bestRate == 0)) {
          $bestRate = $rate;
          $bestWarehouseId = $warehouseId;
        }
      }

      $warehouses[$bestWarehouseId]->products[] = $product;
    }
  }

  variable_set('uc_warehouse_check_for_product_address' . uc_cart_get_id(), true);
  variable_set('uc_warehouse_check_for_product_address' . uc_cart_get_id(), $defautlStoreAddress);

  return $warehouses;
}


/**
 * Determine order packages and save to uc_packages table
 *
 * @param $order
 *   Order object that is to be packaged.
 */
function createWarehousePackages($order) {
  $orderWarehouses = variable_get('uc_order_warehouses' . uc_cart_get_id(), Array());

  if ($orderWarehouses) {
		// Remove any packages that may exist for this order
		$result = db_query("SELECT * FROM uc_packages WHERE order_id = %d", $order->order_id);
		while ($package = db_fetch_object($result)) {
			db_query("DELETE FROM uc_packaged_products WHERE pacakge_id = %d", $package->package_id);
		}
		db_query("DELETE FROM uc_packages WHERE order_id = %d", $order->order_id);


    foreach ($orderWarehouses as $warehouse) {
      $warehousePackage = array();
      $warehousePackage['order_id'] = $order->order_id;

      if ($warehouse->products) {
        foreach ($warehouse->products as $product) {
          if ($product->uc_warehouse_ship_separately) {
          	for ($i = 1; $i <= $product->qty; $i++) {
            	$seperatePackage = Array();
            	$orderProductId = getOrderProductId($order->order_id, $product->nid);
            	$seperatePackage['products'][$orderProductId] = new stdClass();
            	$seperatePackage['products'][$orderProductId]->checked = 1;
            	$seperatePackage['products'][$orderProductId]->qty = 1;
            	$seperatePackage['shipping_type'] = $product->shipping_type;
            	$seperatePackage['order_id'] = $order->order_id;

            	if (count($seperatePackage['products'])) {
              	  uc_shipping_package_save($seperatePackage);
              	  $packageId = db_last_insert_id('uc_packages', 'package_id');
              	  db_query('UPDATE {uc_packages} SET warehouse = "%s" WHERE package_id = %d', getWarehouseName($warehouse->warehouse_id), $packageId);
            	}
            }
          }
          else {
            $orderProductId = getOrderProductId($order->order_id, $product->nid);
            $warehousePackage['products'][$orderProductId] = new stdClass();
            $warehousePackage['products'][$orderProductId]->checked = 1;
            $warehousePackage['products'][$orderProductId]->qty = $product->qty;
            $warehousePackage['shipping_type'] = $product->shipping_type;
          }
        }
      }

      if (count($warehousePackage['products'])) {
        uc_shipping_package_save($warehousePackage);
        $packageId = db_last_insert_id('uc_packages', 'package_id');
        db_query('UPDATE {uc_packages} SET warehouse = "%s" WHERE package_id = %d', getWarehouseName($warehouse->warehouse_id), $packageId);
      }
    }
  }
}


/**
 * Determine order packages
 *
 * @param $order
 *   Order object that is to be packaged.
 *
 * @return
 *   Array of packages for the given order
 */
function getUPSWarehousePackages() {
  $orderWarehouses = variable_get('uc_order_warehouses' . uc_cart_get_id(), Array());
  $packages = array();

  if ($orderWarehouses) {
    foreach ($orderWarehouses as $warehouse) {
      $warehousePackage = new StdClass();

      $address = array();
      $address['street1'] = $warehouse->street_address_1;
      $address['street2'] = $warehouse->street_address_2;
      $address['city'] = $warehouse->city;
      $address['zone'] = $warehouse->zone;
      $address['postal_code'] = $warehouse->postal_code;
      $address['country'] = $warehouse->country;
      $warehousePackage->orig = $address;

      $warehousePackage->weight = 0;
      $warehousePackage->qty = 1;
      $warehousePackage->price = 0;
      $warehousePackage->length_units = 'in';
      $warehousePackage->weight_units = 'lb';

      if ($warehouse->products) {
        foreach ($warehouse->products as $product) {
          if ($product->uc_warehouse_ship_separately) {
          	for ($i = 1; $i <= $product->qty; $i++) {
            	$seperatePackage = new StdClass();
            	$seperatePackage->orig = $warehousePackage->orig;
            	$seperatePackage->description = $product->model;
            	$seperatePackage->qty = 1;
            	$seperatePackage->pkg_type = $product->ups ? $product->ups['pkg_type'] : '02';
            	$seperatePackage->weight = $product->weight;
            	$seperatePackage->price = $product->price;
            	$conversion = uc_length_conversion($product->length_units, 'in');
            	$seperatePackage->length = $product->length * $conversion;
            	$seperatePackage->width = $product->width * $conversion;
            	$seperatePackage->height = $product->height * $conversion;
            	$seperatePackage->length_units = 'in';
            	$seperatePackage->weight_units = 'lb';
            	if ($seperatePackage->weight > 0) {
              	$packages[][] = $seperatePackage;
            	}
            }
          }
          else {
            $warehousePackage->pkg_type = $product->ups ? $product->ups['pkg_type'] : '02';
            $warehousePackage->weight += $product->weight * $product->qty;
            $warehousePackage->price += $product->price * $product->qty;
            $conversion = uc_length_conversion($product->length_units, 'in');
            $warehousePackage->length = max($product->length * $conversion, $seperatePackage->length);
            $warehousePackage->width = max($product->width * $conversion, $seperatePackage->width);
            $warehousePackage->height = max($product->height * $conversion, $seperatePackage->height);
          }
        }
      }

      if ($warehousePackage->weight > 0) {
        $warehousePackage->description = 'Warehouse package';
        $packages[][] = $warehousePackage;
      }
    }
  }

  return $packages;
}


function getOrderProductId($order, $nid) {
  /*
  $mess = print_r($order, true);
  watchdog('whs_getpid', $mess);

  foreach ($order->products as $product) {
    if ($product->nid == $nid) {
      return $product->order_product_id;
    }
  }

  return '';

  */

  $query = 'SELECT * FROM {uc_order_products} WHERE order_id = "%d" AND nid="%d"';
  $result = db_query($query, $order, $nid);
  if ($data = db_fetch_object($result)) {
    return $data->order_product_id;
  }

  return '';
}


function getWarehouseName($warehouseId) {
  $query = 'SELECT * FROM {uc_warehouse} WHERE warehouse_id = "%d"';
  $result = db_query($query, $warehouseId);
  if ($data = db_fetch_object($result)) {
    return $data->name;
  }

  return '';
}


/**
 * Sort warehouse arry putting those warehouses with exclusive products first then sorting my shipping rate.
 */
function sortArray($array) {
  foreach ($array as $key => $value) {
    $priority1[$key] = $value->has_exclusive_products;
    $priority2[$key] = $value->priority_rate;
  }

  array_multisort($priority1, SORT_DESC, $priority2, SORT_ASC, $array);
  return $array;
}