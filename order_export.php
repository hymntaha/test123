<?php

$OrderID = (integer) (array_key_exists('OrderID', $_REQUEST) ? $_REQUEST['OrderID'] : 0);
$Hash = (string) (array_key_exists('Hash', $_REQUEST) ? $_REQUEST['Hash'] : '');
    
if(md5($OrderID . 'tnpll') !== $Hash) exit();
    
$rs_Link = mysql_connect('localhost', 'devjycn_dev', 'VV75NtI4fCIPaGCVgm');
mysql_select_db('joyconeb_joycon', $rs_Link);

//  $str_UpdateOrderStatusSQL = "UPDATE uc_orders " .
//      "SET order_status='completed' " .
//      "WHERE order_id = " . (integer) $OrderID;
    
//  mysql_query($str_UpdateOrderStatusSQL);

$str_UCOrdersSQL = "SELECT uc_orders.*, " .
    "users.*, " .
    "uc_orders.delivery_country AS delivery_country_id, " .
    //"uc_orders.card_cvv, " .
    "NULL as card_cvv, " .
    "(SELECT zone_name FROM uc_zones WHERE uc_zones.zone_id = uc_orders.delivery_zone) AS delivery_state, " .
    "(SELECT zone_name FROM uc_zones WHERE uc_zones.zone_id = uc_orders.billing_zone) AS billing_state, " .
    "(SELECT zone_code FROM uc_zones WHERE uc_zones.zone_id = uc_orders.delivery_zone) AS delivery_state_code, " .
    "(SELECT zone_code FROM uc_zones WHERE uc_zones.zone_id = uc_orders.billing_zone) AS billing_state_code, " .
    "(SELECT country_name FROM uc_countries WHERE uc_countries.country_id = uc_orders.delivery_country) AS delivery_country, " .
    "(SELECT country_name FROM uc_countries WHERE uc_countries.country_id = uc_orders.billing_country) AS billing_country, " .
    "(SELECT country_iso_code_2 FROM uc_countries WHERE uc_countries.country_id = uc_orders.delivery_country) AS delivery_country_code, " .
    "(SELECT country_iso_code_2 FROM uc_countries WHERE uc_countries.country_id = uc_orders.billing_country) AS billing_country_code " .
    //"FROM uc_orders, users " .
    "FROM uc_orders, users " .
    "WHERE uc_orders.uid = users.uid " .
    "AND order_id = " . (integer) $OrderID;
    
$rs_UCOrders = mysql_query($str_UCOrdersSQL);

if(! mysql_num_rows($rs_UCOrders))
{
    exit;
}

$arr_UCOrders = mysql_fetch_assoc($rs_UCOrders);

$str_TaxRateSQL = "SELECT ROUND(SUM(uc_taxes.rate), 3) AS tax_rate " .
    "FROM uc_taxes, uc_countries " .
    "WHERE uc_countries.country_id = " . $arr_UCOrders['delivery_country_id'] . " " .
    "AND (uc_taxes.name LIKE '%(" . $arr_UCOrders['delivery_state_code'] . ")%' " .
    "OR uc_taxes.name LIKE '%" . $arr_UCOrders['delivery_state'] . "%' " .
    "OR uc_taxes.name LIKE '%" . $arr_UCOrders['delivery_country'] . "%' " .
    "OR uc_taxes.name LIKE '%(" . $arr_UCOrders['delivery_country_code'] . ")%') ";

$rs_TaxRate = mysql_query($str_TaxRateSQL);

$arr_TaxRate = mysql_fetch_assoc($rs_TaxRate);

$str_UCOrderItemsSQL = "SELECT uc_order_products.*, " .
    "uc_products.* " .
    "FROM uc_order_products, uc_products " .
    "WHERE uc_order_products.nid = uc_products.nid " .
    "AND uc_order_products.order_id = " . (integer) $OrderID;

$arr_UCOrderItems = array();

$rs_UCOrderItems = mysql_query($str_UCOrderItemsSQL);

while($arr_Item = mysql_fetch_assoc($rs_UCOrderItems))
{
    $arr_UCOrderItems[$arr_Item['nid']] = $arr_Item;
}

$arr_ShippingOptions = array
(
    '01' => 'Next Day Air',
    '13' => 'Next Day Air Saver',
    '02' => 'Second Day Air',
    '12' => 'Third Day Select',
    '03' => 'Ground'
);

$str_UPSInfoSQL = "SELECT * " .
    "FROM uc_order_quotes " .
    "WHERE order_id = " . (integer) $OrderID;
    
$rs_UPSInfo = mysql_query($str_UPSInfoSQL);

$arr_UPSInfo = mysql_fetch_assoc($rs_UPSInfo);

header("Content-type: text/xml");
?><?//<<= '?'; >xml version="1.0" encoding="UTF-8"<= '?'; >>?><? //<!DOCTYPE Server SYSTEM "opt/pdos/etc/pdoslrd.dtd">?><Orders><Order Number="<?= $OrderID; ?>" DateOrdered="<?= date('', $arr_UCOrders['created']); ?>" Status="Pending Shipping"><OrderTotal>$<?= number_format($arr_UCOrders['order_total'], 2); ?></OrderTotal><Customer ID="<?= $arr_UCOrders['uid']; ?>" Email="<?= $arr_UCOrders['mail'];?>"><Address ID="276847" Type="Billing"><FirstName><?= $arr_UCOrders['delivery_first_name']; ?></FirstName><LastName><?= $arr_UCOrders['delivery_last_name']; ?></LastName><Line1><?= $arr_UCOrders['delivery_street1']; ?></Line1><Line2><?= $arr_UCOrders['delivery_street2']; ?></Line2><City><?= $arr_UCOrders['delivery_city']; ?></City><State><?= $arr_UCOrders['delivery_state_code']; ?></State><ZipCode><?= $arr_UCOrders['delivery_postal_code']; ?></ZipCode><Country><?= $arr_UCOrders['delivery_country']; ?></Country><Phone><?= $arr_UCOrders['delivery_phone']; ?></Phone></Address><Address ID="276848" Type="Shipping"><FirstName><?= $arr_UCOrders['billing_first_name']; ?></FirstName><LastName><?= $arr_UCOrders['billing_last_name']; ?></LastName><Line1><?= $arr_UCOrders['billing_street1']; ?></Line1><Line2><?= $arr_UCOrders['billing_street2']; ?></Line2><City><?= $arr_UCOrders['billing_city']; ?></City><State><?= $arr_UCOrders['billing_state_code']; ?></State><ZipCode><?= $arr_UCOrders['billing_postal_code']; ?></ZipCode><Country><?= $arr_UCOrders['billing_country']; ?></Country><Phone><?= $arr_UCOrders['billing_phone']; ?></Phone></Address></Customer><Sales><? foreach($arr_UCOrderItems AS $int_NID => $arr_Item) { ?><LineItem ID="<?= $int_NID; ?>"><SKU><?= $arr_Item['model']; ?></SKU><Quantity><?= $arr_Item['qty']; ?></Quantity><Price>$<?= number_format($arr_Item['price'], 2); ?></Price><CustomAttributes/></LineItem><? } ?></Sales><Shipping ShippingTotal="$<?= number_format($arr_UPSInfo['rate'], 2); ?>"><LineItem SaleLineItem="Master"><Cost>$<?= number_format($arr_UPSInfo['rate'], 2); ?></Cost><Method>UPS <?= $arr_ShippingOptions[$arr_UPSInfo['accessorials']]; ?></Method><TrackingNumber>new_order</TrackingNumber><ShipDate/></LineItem></Shipping><Payment><LineItem><PaymentMethod>CreditCard</PaymentMethod><CardType><?= strtoupper($arr_UCOrders['card_type']); ?></CardType><Expiration><?= $arr_UCOrders['card_exp']; ?></Expiration><CardNumber><?= $arr_UCOrders['card_id_mask']; ?></CardNumber><CVV><?= $arr_UCOrders['card_cvv']; ?></CVV></LineItem></Payment><TaxRate><?= $arr_TaxRate['tax_rate'] * 100; ?>%</TaxRate><GiftCertificateAmount/><CouponAmount>$0.00</CouponAmount></Order></Orders>