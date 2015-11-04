<?php include_once 'database.php'; ?>

<?php

class pricelist{
	
	//выводит таблицу pricelistgroup
	function group_html_table(){
	
	$database = new database;
	$data = $database->connect_with_access("quest");
	$query = $data->query("SELECT plg_id, plg_name FROM pricelistgroup");
	
	$table = "<table class=\"table\"><tr><th>№</th><th>Группа позиций</th></tr>";
	$i=0;
	
	while($group = $query->fetch_assoc()){
		$i++;
		$table .= "<tr><td>" . $i . "</td><td>" . $group['plg_name'] ."</td></tr>";
	};
	
	$table .= "</table>";
	
	$database->free;
	
	return $table;
	}
	
	//добавляет новую позицию в pricelistgroup
	function group_add(){
		
	$name = htmlspecialchars($_POST['NewGroupName']);
		
	$database = new database;
	$data = $database->connect_with_access("mechanic");
	$text = "INSERT INTO pricelistgroup (plg_name) VALUES ('" . $name . "')";
	$query = $data->query($text);
	return $text;	
	}
	
	
	
	
}



?>