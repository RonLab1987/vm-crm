<?php 
include_once 'pricelist_class.php'; 

$pricelist = new pricelist;

echo "<h2>pricelistgroup query -> json</h2>";
$jsonResult = json_decode($pricelist->plgJSON(), TRUE);

var_dump($jsonResult);

foreach ($jsonResult as $json_key => $json_str){
	echo "<p> $json_key :: <br>";
	foreach ($json_str as $jKey => $jValue){
		echo $jKey . " == " . $jValue . "<br>";
	}
	echo "</p>";
}


echo "<h2> mod pricelistgroup query -> json</h2>";

$jsonResult = json_decode($pricelist->modPlgJSON(), TRUE);

var_dump($jsonResult);

foreach ($jsonResult as $json_key => $json_str){
	echo "<p> $json_key :: <br>";
	foreach ($json_str as $jKey => $jValue){
		echo $jKey . " == " . $jValue . "<br>";
	}
	echo "</p>";
}
echo $jsonResult[1]['name'];

echo "<h2>pricelist query -> json</h2>";
$jsonResult = json_decode($pricelist->plJSON(), TRUE);

foreach ($jsonResult as $json_key => $json_str){
	echo "<p> $json_key :: <br>";
	foreach ($json_str as $jKey => $jValue){
		echo $jKey . " == " . $jValue . "<br>";
	}
	echo "</p>";
}


var_dump($jsonResult);
?>