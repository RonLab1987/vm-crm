
<?php
function Auth (){
	$data = new mysqli('localhost','ronlab','GSyngach','bike_service');
	if(!$data){echo "<p>connect db error</p>";}

	$query = $data->query("SELECT mech_login, mech_password FROM mechanic");

	while($log_pass = $query->fetch_assoc()){
	if( $log_pass['mech_login'] == $_POST['login'] and $log_pass['mech_password'] == $_POST['password'] ) {
		$h1="вы вошли";
		return $h1;
	}
	else{
		$h1="НЕВЕРНЫЙ ЛОГИН ИЛИ ПАРОЛЬ";
		return $h1;	
	};
	};
};
?>