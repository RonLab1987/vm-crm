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



	/* 
	* функция showOrders() выводит
	* таблицу заказов, включая в неё-же данные
	* о клиенте и статусе заказа
	*
	*/
	function showOrders(){
		$result = array();
		$query = "SELECT  `ord_id` ,  `ord_start_job` ,  `ord_bike` ,  `cl_name` ,  `cl_phone1` , 
						  `os_status` ,  `called` ,  `paid` ,  `taken` ,  `os_show_id` 
						FROM  `orderstatuslist` ,  `order` ,  `client` ,  `orderstatus` 
						WHERE  `osl_ord_id` =  `ord_id` 
						AND  `ord_cl_id` =  `cl_id` 
						AND  `osl_os_id` =  `os_id` 
						ORDER BY  `os_show_id` ASC ,  `ord_start_job` ASC" ;
				
		$database = new database;
		$qResult = $database->dbQuery($query);
				
		if($qResult){		
			while($qRow = $qResult->fetch_assoc()){
				$result[] = $qRow;
				}	
		}
		
		return  $result;	
	}
	
	/* 
	* функция showOrdersByStatus($status) выводит
	* таблицу заказов со статусом $status, включая в неё-же данные
	* о клиенте 
	*
	*/
	function showOrdersByStatus($status){
		$result = array();
		$query = "SELECT  `ord_id` ,  `ord_start_job` , `ord_finish_job` ,  `ord_bike` ,  `cl_name` ,  `cl_phone1`, 
						  `called` ,  `paid` ,  `taken`  
					FROM  `orderstatuslist` ,  `order` ,  `client` 
					WHERE  `osl_ord_id` =  `ord_id` 
					AND  `ord_cl_id` =  `cl_id` 
					AND  `osl_os_id` = $status
					ORDER BY  `ord_start_job` ASC " ;
				
		$database = new database;
		$qResult = $database->dbQuery($query);
				
		if($qResult){		
			while($qRow = $qResult->fetch_assoc()){
				$result[] = $qRow;
				}	
		}
		
		return  $result;	
	}
	
	/* 
	* функция showOrdersInJob() выводит
	* таблицу заказов со статусом "В РАБОТЕ", включая в неё-же данные
	* о клиенте 
	*
	
	function showOrdersByStatus($status){
		$result = array();
		$query = "SELECT  `ord_id` ,  `ord_start_job` , `ord_finish_job` ,  `ord_bike` ,  `cl_name` ,  `cl_phone1`, 
						  `called` ,  `paid` ,  `taken`  
					FROM  `orderstatuslist` ,  `order` ,  `client` 
					WHERE  `osl_ord_id` =  `ord_id` 
					AND  `ord_cl_id` =  `cl_id` 
					AND  `osl_os_id` = $status
					ORDER BY  `ord_start_job` ASC " ;
				
		$database = new database;
		$qResult = $database->dbQuery($query);
				
		if($qResult){		
			while($qRow = $qResult->fetch_assoc()){
				$result[] = $qRow;
				}	
		}
		
		return  $result;	
	}*/

	/* 
	* функция showOrderById() выводит
	* заказ по ID, включая данные
	* о клиенте и механике
	*
	*/
	function showOrderById(){
		$ordId = $_POST['ordId'];
		$query = "SELECT `cl_name`,`cl_phone1`, `ord_bike`, `ord_start_job`, `ord_finish_job`, `ord_client_note`, `ord_internal_note`, `mech_name`
					FROM `order`, `client`, `mechanic`
					WHERE `ord_cl_id` = `cl_id`
					AND `ord_mech_id` = `mech_id`
					AND `ord_id` = ". $ordId ;
				
		$database = new database;
		$qResult = $database->dbQuery($query);
			
		if($qResult){
			$result = $qResult->fetch_assoc();
		}		
		
		return  $result;	
	}	
	
	


}

?>