<?php

class Warehouse {
	public $warehouse_id;
	public $warehouse_name;
	public $street_address_1;
	public $street_address_2;
	public $city;
	public $zone;
	public $postal_code;
	public $country;
	public $has_exclusive_products = 0;
	public $priority = 0;
	
	public function __construct($warehouseId = '') {
		if (!empty($warehouseId)) {
			$this->warehouse_id = $warehouseId;
			
			$query = 'SELECT * FROM {uc_warehouse} WHERE warehouse_id = "%d"';
			$result = db_query($query, $warehouseId);
			if ($data = db_fetch_object($result)) {
				$this->warehouse_name   = $data->name;
				$this->street_address_1 = $data->street_address_1;
				$this->street_address_2 = $data->street_address_2; 
				$this->city             = $data->city;
				$this->postal_code      = $data->postal_code;
				$this->zone             = $data->zone;
				$this->country          = $data->country;
			}
		}
	}

	public static function all() {
		$warehouses = array();

		$query = 'SELECT * FROM {uc_warehouse}';
		$result = db_query($query);
		while ($data = db_fetch_object($result)) {
			$warehouse = new self();

			$warehouse->warehouse_name   = $data->name;
			$warehouse->warehouse_id     = $data->warehouse_id;
			$warehouse->street_address_1 = $data->street_address_1;
			$warehouse->street_address_2 = $data->street_address_2; 
			$warehouse->city             = $data->city;
			$warehouse->postal_code      = $data->postal_code;
			$warehouse->zone             = $data->zone;
			$warehouse->country          = $data->country;
			
			$warehouses[] = $warehouse;
		}

		return $warehouses;
	}

	public function getAddressArray() {
		return array(
			'street1'     => $this->street_address_1,
			'street2'     => $this->street_address_2,
			'city'        => $this->city,
			'zone'        => $this->zone,
			'postal_code' => $this->postal_code,
			'country'     => $this->country,
		);
	}
}
