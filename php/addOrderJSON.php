<?php 
include_once 'order_class.php'; 

$order = new order;
$result = $order->addOrder();
echo json_encode( $result);

?>