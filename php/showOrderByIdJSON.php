<?php 
include_once 'order_class.php'; 

$order = new order;
$result = $order->showOrderById();
echo json_encode( $result);

/*$res = "hey";
echo json_encode( $res);*/


?>