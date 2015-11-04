<?php include_once 'database.php'; ?>

<?php

class pricelist{
	
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
	while($group = $query->fetch_assoc()){
		$i++;
		$table .= "<tr><td>" . $i . "</td><td>" . $group['plg_name'] ."</td></tr>";
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