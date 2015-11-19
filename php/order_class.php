<?php
include_once 'database_class.php'; 
include_once 'client_class.php'; 


class order{
	
	
	/* 
	* функция addOrder() добавляет новый заказ.
	* При этом уже проверялось новый это клиент или повторный:
	* принимаем cl_id из формы.
	*
	*/
	function addOrder(){
		
		if($_POST['cl_id']<0){
			$client = new client;
			$client->addClient();
			$client->existClient(); 
		}
		
		$ord_cl_id= $_POST['cl_id'];
		$ord_bike = $_POST['ord_bike'];
		//$ord_start_job = strtotime($_POST['ord_date_start']);
		$ord_start_job = $_POST['ord_date_start'];
		$ord_internal_note = $_POST['ord_internal_note'];
		
		$query = "INSERT INTO `order`(`ord_cl_id`,`ord_bike`,`ord_start_job`,`ord_internal_note`) 
							VALUES ('$ord_cl_id','$ord_bike', STR_TO_DATE('$ord_start_job','%d.%m.%Y'),'$ord_internal_note')";
		
		$database = new database;
		$database->dbQuery($query);
		
		//return $query;
		return $_POST['cl_id'];	
	}




}

?>