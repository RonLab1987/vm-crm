<?php include_once 'database_class.php'; 

class client{
	
	
	/* 
	* функция existClient() проверяет наличие клиента по номеру телефона.
	* При наличии оного возвращает данные в json, иначе - FALSE 
	*
	*/
	
	function existClient() {
		
		$phone = $_POST['cl_phone'];
		$query = "SELECT `cl_id`, `cl_name` FROM `client` WHERE `cl_phone1` = '$phone' OR `cl_phone2` = '$phone' ";
		
		$database = new database;
		$qResult = $database->dbQuery($query); 
		
		$result = FALSE;
		if($qResult->num_rows>0){
			$result=$qResult->fetch_assoc();
		}
		$_POST['cl_id'] = $result['cl_id'];
		return $result;	
	}
	
	
	
	/*
	 * функция addClient() добавляет клиента с минимумом данных:
	 * cl_name и  cl_phone1
	 *
	 */
	 
	 function addClient(){
		 $name=$_POST['cl_name'];
		 $phone = $_POST['cl_phone'];
		 $query = "INSERT INTO `client`(`cl_name`,`cl_phone1`) VALUES ('$name','$phone')";
		
		 $database = new database;
		 $qResult = $database->dbQuery($query); 		 
	 }
	
	 



} //end of class



?>