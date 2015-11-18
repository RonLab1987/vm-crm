<?php 
include_once 'client_class.php'; 

$client = new client;
$result = $client->existClient();
echo json_encode( $result);

?>