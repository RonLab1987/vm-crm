<?php include_once 'database.php'; ?>

<?php

class pricelist{
	
	//PRICELIST_HTML_TABLE()
	//выводит html pricelistgroup
	function pricelist_html_table(){
	$database = new database;
	$UserAccess = "quest";
	$QueryText = "SELECT * FROM pricelist ";
	$plQuery = $database->query_with_access ($QueryText , $UserAccess);
	$QueryText = "SELECT * FROM pricelistgroup ";
	$plgQuery = $database->query_with_access ($QueryText , $UserAccess);
	
	
	//формирую html на вывод
	$html="";
	while ($plgQueryResult = $plgQuery->fetch_assoc()){
		$html .= "<h3>" . $plgQueryResult['plg_name'] . "</h3>";
		$plQuery->data_seek(0);
		$html .= "<table class=\"table\">";
	while($plQueryResult = $plQuery->fetch_assoc()){
		if($plQueryResult['pl_plg_id'] == $plgQueryResult['plg_id'] ){
			$html .= "<tr><td>" . $plQueryResult['pl_name'] ."</td><td>" . $plQueryResult['pl_price'] . "</td></tr>";
		};
	};
	$html .= "</table>" ;
		
	}
	
	
	
	//-----
	return $html;
	}
	
	
	
	//GROUP_HTML_TABLE()
	//выводит html таблицу pricelistgroup
	function group_html_table(){
	$UserAccess = "quest";
	$QueryText = "SELECT plg_name FROM pricelistgroup";
	$database = new database;
	$query = $database->query_with_access ($QueryText , $UserAccess);
	//формирую html таблицу на вывод
	$i=0;
	$table = "<table class=\"table\"><tr><th>№</th><th>Группа позиций</th></tr>";
	while($qResult = $query->fetch_assoc()){
		$i++;
		$table .= "<tr><td>" . $i . "</td><td>" . $qResult['plg_name'] ."</td></tr>";
	};
	$table .= "</table>";
	//-----
	return $table;
	}


	
	//GROUP_ADD
	//добавляет новую позицию в pricelistgroup
	function group_add(){
	$name = htmlspecialchars($_POST['NewGroupName']);
	$UserAccess = "mechanic";
	$QueryText = "INSERT INTO pricelistgroup (plg_name) VALUES ('" . $name . "')";
	$database = new database;
	$query = $database->query_with_access ($QueryText , $UserAccess);
	}
	
	
	
	
}



?>