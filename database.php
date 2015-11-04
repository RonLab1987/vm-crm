<?php

class database{
		
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
} 



?>