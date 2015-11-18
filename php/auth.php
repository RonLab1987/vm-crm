<?php include_once 'database.php'; ?>

<?php


function Auth (){
		
	$database = new database;
	$data = $database->connect_with_access("quest");

	$query = $data->query("SELECT mech_login, mech_password FROM mechanic");

	while($log_pass = $query->fetch_assoc()){
	if( $log_pass['mech_login'] == $_POST['login'] and $log_pass['mech_password'] == $_POST['password'] ) {
		$h1="вы вошли";
			}
	else{
		$h1="НЕВЕРНЫЙ ЛОГИН ИЛИ ПАРОЛЬ";
	};
	};
	
	$database->free;
	return $h1;
};
?>