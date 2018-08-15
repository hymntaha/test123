<?php
// $Id$
/**
* @file
* Administration page callbacks for the uc_warehouse module.
*/
/**
* Form builder. Configure annotations.
*
* @ingroup forms
* @see system_settings_form().
*/
function uc_warehouse_admin_settings() {
	// Get an array of node types with internal names as keys and "friendly names" as values. E.g.,
	// array('page' => 'Page', 'story' => 'Story')
	$options = node_get_types('names');	
	$form['uc_warehouse_node_types'] = array(
		'#type' => 'checkboxes',
		'#title' => t('Product content types'),
		'#options' => $options,
		'#default_value' => variable_get('uc_warehouse_node_types', array('product')),
		'#description' => t('A select list of warehouses will be displayed on the content edit pages.'),
	);
	
	return system_settings_form($form);
}


/**
 * Display a paged list and overview of existing warehouses.
 */
function uc_warehouse_administration() {
  $header = array(
    array('data' => t('Name'), 'field' => 'name', 'sort' => 'asc'),
    t('Operations'),
  );

  $result = pager_query("SELECT warehouse_id, name FROM {uc_warehouse}". tablesort_sql($header), 30, 0, "SELECT COUNT(warehouse_id) FROM {uc_warehouse}");
  while ($warehouse = db_fetch_object($result)) {
    $ops = array(
      l(t('edit'), 'admin/store/warehouses/'. $warehouse->warehouse_id .'/edit'),
      l(t('delete'), 'admin/store/warehouses/'. $warehouse->warehouse_id .'/delete'),
    );
    $rows[] = array(
      check_plain($warehouse->name),
      implode(' ', $ops),
    );
  }

  if (count($rows) == 0) {
    $rows[] = array(
      array('data' => t('No warehouses have been added yet.'), 'colspan' => '6')
    );
  }

  $output = theme('table', $header, $rows) . theme('pager', NULL, 30)
          . l(t('Add a warehouse'), 'admin/store/warehouses/add');

  return $output;
}


/**
 * Form definition for warehouses
 */
function uc_warehouse_form($form_state, $warehouse = NULL) {
  if (!empty($warehouse)) {
    $form['uc_warehouse_id'] = array('#type' => 'hidden', '#value' => $warehouse->warehouse_id);
    drupal_set_title(t('Edit warehouse: %name', array('%name' => $warehouse->name)));
  }

  $form['uc_warehouse_name'] = array(
    '#type' => 'textfield',
    '#title' => t('Name'),
    '#description' => t('The name of the warehouse used in content forms'),
    '#default_value' => $warehouse->name,
    '#required' => TRUE,
  );
  $form['uc_warehouse_street1'] = array(
    '#type' => 'textfield',
    '#title' => t('Street Address 1'),
    '#default_value' => $warehouse->street_address_1,
    '#maxlength' => 255,
  );
  $form['uc_warehouse_street2'] = array(
    '#type' => 'textfield',
    '#title' => t('Street Address 2'),
    '#default_value' => $warehouse->street_address_2,
    '#maxlength' => 255,
  );  
  $form['uc_warehouse_city'] = array(
    '#type' => 'textfield',
    '#title' => t('City'),
    '#default_value' => $warehouse->city,
    '#maxlength' => 255,
  );  
  $form['uc_warehouse_country'] = 
  	uc_country_select(uc_get_field_name('country'), uc_store_default_country()
  );  
 
 	if (isset($_POST['uc_warehouse_country'])) {
    $country_id = intval($_POST['uc_warehouse_country']);
  }
  else {
    $country_id = uc_store_default_country();
  }
	$form['uc_warehouse_zone'] = uc_zone_select(uc_get_field_name('zone'), $warehouse->zone, NULL, $country_id);  
  
  $form['uc_warehouse_postal_code'] = array(
    '#type' => 'textfield',
    '#title' => t('Postal Code'),
    '#default_value' => $warehouse->postal_code,
    '#maxlength' => 255,
  );  

  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Submit'),
    '#suffix' => l(t('Cancel'), 'admin/store/warehouses'),
  );

  return $form;
}


/**
 * Save the data from the form to the database table.
 */
function uc_warehouse_form_submit($form, &$form_state) {
  $table = 'uc_warehouse';
	$record = new stdClass();
	$record->name = t($form_state['values']['uc_warehouse_name']);
	$record->street_address_1 = t($form_state['values']['uc_warehouse_street1']);
	$record->street_address_2 = t($form_state['values']['uc_warehouse_street2']);
	$record->city = t($form_state['values']['uc_warehouse_city']);
	$record->country = t($form_state['values']['uc_warehouse_country']);
	$record->zone = t($form_state['values']['uc_warehouse_zone']);
	$record->postal_code = t($form_state['values']['uc_warehouse_postal_code']);
			
  if (empty($form_state['values']['uc_warehouse_id'])) {
		drupal_write_record($table, $record);
		watchdog('uc_warehouse', 'Added warehouse with id %id.', array('%id' => $record->warehouse_id));
  }
  else {
		$record->warehouse_id = $form_state['values']['uc_warehouse_id'];  	
		drupal_write_record($table, $record, 'warehouse_id');
		watchdog('uc_warehouse', 'Updated warehouse with id %id.', array('%id' => $record->warehouse_id));
  }

  $form_state['redirect'] = 'admin/store/warehouses';
}


/**
 * Confirm the deletion of the given attribute.
 *
 * @see uc_warehouse_delete_confirm_submit()
 */
function uc_warehouse_delete_confirm($form_state, $warehouse) {
  // If we got a bunk attribute, kick out an error message.
  if (empty($warehouse)) {
    drupal_set_message(t('There is no warehouse with that ID.'), 'error');
    drupal_goto('admin/store/warehouses');
  }

  $form['warehouse_id'] = array('#type' => 'value', '#value' => $warehouse->warehouse_id);
  $form['#redirect'] = 'admin/store/warehouses';

  $output = confirm_form($form, t('Are you sure you want to delete the warehouse %name?', array('%name' => $warehouse->name)),
              'admin/store/warehouses',
              NULL,
              t('Delete'), t('Cancel'));

  return $output;
}
 
  
 /**
 * @see uc_warehouse_delete_confirm()
 */
function uc_warehouse_delete_confirm_submit($form, &$form_state) {
  if ($form_state['values']['confirm']) {
  	$warehouse = uc_warehouse_load($form_state['values']['warehouse_id']);
  	db_query("DELETE FROM {uc_warehouse} WHERE warehouse_id = %d", $warehouse->warehouse_id);
  	module_invoke_all('uc_warehouse', 'delete', $warehouse);    
    
    drupal_set_message(t('Warehouse deleted.'));
  }
}