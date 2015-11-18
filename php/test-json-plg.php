<?php 
include_once 'pricelist_class.php'; 

$pricelist = new pricelist;
$result = $pricelist->plgJSON();
echo $result;

?>