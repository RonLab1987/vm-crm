<?php 
include_once 'order_class.php'; 

$order = new order;
$result = $order->showOrders();
echo json_encode( $result);

?>