<?php 
include_once 'order_class.php'; 

$order = new order;
$result = $order->showOrdersByStatus(2);
echo json_encode( $result);

?>