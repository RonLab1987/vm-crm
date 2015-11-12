<?php

class database{
	
	//connect_with_access
	//устанавливаю соединение, юзеры MySQL имеют разные права 	
	function connect_with_access($UserAccess){
	$SqlServer="localhost";
	$Database="bike_service";
	
	$DatabaseUserMechLogin="bs_mechanic";
	$DatabaseUserMechPassword="bs_mechanic";
	
	$DatabaseUserQuesthLogin="bs_quest";
	$DatabaseUserQuestPassword="bs_quest";
	
	if($UserAccess=="mechanic"){
		$DatabaseLink = new mysqli($SqlServer, $DatabaseUserMechLogin, $DatabaseUserMechPassword, $Database);
	}
	else{
		if($UserAccess=="quest"){
		$DatabaseLink = new mysqli($SqlServer, $DatabaseUserQuesthLogin, $DatabaseUserQuestPassword, $Database);
		};
	};	

	if($DatabaseLink){
		$DatabaseLink->set_charset("utf8");
		return $DatabaseLink;
	}
	else{
		return "connect error";
	}
	
	}
	
	/*
	 * попытка оптимизации
	 * удалась! добаление позиции в прайс: ожидание ответа с 2 сек -> 1 сек 
	 *
	 */	
	function db_connect(){
		
		if(!isset($GLOBALS['db_connect'])){
			$SqlServer="localhost";
			$Database="bike_service";
			$DatabaseUserMechLogin="bs_mechanic";
			$DatabaseUserMechPassword="bs_mechanic";
			$GLOBALS['db_connect'] = new mysqli($SqlServer, $DatabaseUserMechLogin, $DatabaseUserMechPassword, $Database);
			$GLOBALS['db_connect']->set_charset("utf8");
			//echo('step db_connect() == '. $_GLOBAL['db_connect'] );
		}
		
				
	}
	
	
	// query_with_access
	// выполняю запрос с учетом прав юзера
	function query_with_access ($Query , $UserAccess){
	/*$database = new database;
	$data = $database->connect_with_access($UserAccess);
	$query = $data->query($Query);*/
	if(!isset($GLOBALS['db_connect'])){
		$database = new database;
		$data = $database->db_connect();
	};
	
	$query = $GLOBALS['db_connect']->query($Query);
	return $query;
	}





} 

?>