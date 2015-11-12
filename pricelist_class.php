<?php include_once 'database.php'; ?>

<?php

class pricelist{
	
	//PRICELIST_HTML_TABLE()
	//выводит html таблицу pricelist, со стилями $tableClass, $headGroupClass
	function pricelistTable($tableClass, $headGroupClass){
	// запрос
	$database = new database;
	$UserAccess = "quest";
	$QueryText = "SELECT  `pl_id` ,  `plg_id` ,  `plg_name` ,  `pl_name` ,  `pl_price` FROM  `pricelist` INNER JOIN  `pricelistgroup` ON  `pl_plg_id` =  `plg_id` ORDER BY  `plg_id` ASC ";
	$plQuery = $database->query_with_access ($QueryText , $UserAccess);
	
	// установка индикатора группы
	
	$group_id =  -1;
	
	
	//формирую html таблицу на вывод
	$html = "<table class=\" $tableClass \">";
	if($plQuery->num_rows > 0){
	while($plQueryResult = $plQuery->fetch_assoc()){
			if( $group_id != $plQueryResult['plg_id'] ){
				$html .= "<tr  class=\"$headGroupClass\"><td>" . $plQueryResult['plg_name'] . "</td><td></td></tr>";
				$group_id= $plQueryResult['plg_id'];
			}
			$html .= "<tr><td>" .$plQueryResult['pl_name'] ."</td><td>"  . $plQueryResult['pl_price'] . "</td></tr>";
		};
	}
	else{
		$html .= "<tr  class=\"$headGroupClass\"><td>Прайс лист пока пуст.</td></tr>";
	}
	$html .= "</table>";
	
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


	
	//pricelistgroupCheckListHTML
	// выводит список групп для выбора при добавлении новой позиции в pricelist
	function pricelistGroupOptionList(){
	$UserAccess = "quest";
	$QueryText = "SELECT plg_id, plg_name FROM pricelistgroup";
	$database = new database;
	$query = $database->query_with_access ($QueryText , $UserAccess);
	
	if($query){
		$checkList = "";
		while($qResult = $query->fetch_assoc()){
		
		$checkList .= "<option class=\"text-uppercase\" value=\"" . $qResult['plg_name'] . "\"></option>";
		};
		
	}
	else {
		$checkList =  "вводи новую";
	};
	
	//-----
	return $checkList;
		
	}
	
	
	
	/*pricelistAdd()
	*
	*
	/*pricelistAdd() добавляет новую позицию в pricelist*/
	function pricelistAdd(){
		$plg_name = trim($_POST['plgName']);
		$pl_name = trim($_POST['plName']);
		$pl_price= $_POST['plPrice'];
		
		
		//echo $pl_name ." == ". $plg_name . " == ". $pl_price. "<br>";
		
		//echo "<p class=\"lead\">" . $plg_name ." == ". $pl_name . " == ". $pl_price. "<br>";
		$pricelist = new pricelist;
		$plg_id = $pricelist->pricelistgroupAdd($plg_name);
		//echo "<p class=\"lead\">  " . $plg_id . " == ". $plg_name. "<br>";
		$database = new database;
		$UserAccess = "mechanic";
		$QueryText = "INSERT INTO `pricelist`(`pl_name`, `pl_plg_id`,`pl_price`) VALUES (\"$pl_name\",$plg_id,$pl_price)";
		//echo $QueryText;
		if($plg_id != -1) {
			$query = $database->query_with_access($QueryText , $UserAccess);
			if(!$query){echo "<br>что то пошло не так: " .$query->error . "<br>";};
		}	
		//echo "addDone";
	}
	
	
	
	/*pricelistgroupAdd($plg_name)
	*
	*
	*добавляет новую позицию в pricelistgroup */
	function pricelistgroupAdd($plg_name){
	//вернусь сюда, если новая группа
	search_plg_id:
	// верну plg_id
	$plg_id = -1;
	// поиск в существующих группах	
	$database = new database;
	$UserAccess = "quest";
	$QueryText = "SELECT plg_id, plg_name FROM pricelistgroup WHERE plg_name=\"$plg_name\"";
	$query = $database->query_with_access($QueryText , $UserAccess);
	
	if($query->num_rows > 0){
		$qResult= $query->fetch_assoc();
		$plg_id = $qResult['plg_id'];
	}
	else{
		$UserAccess = "mechanic";
		$QueryText = "INSERT INTO `pricelistgroup`(`plg_name`) VALUES (\"$plg_name\") ";
		$database->query_with_access($QueryText , $UserAccess);
		goto search_plg_id;
	}
	
	return $plg_id;
	}
	
	
	
	/*
	*
	*
	*/
	
}



?>