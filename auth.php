<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">
<?php echo Auth(); ?>
</div>
</body>
</html>

<?php
function Auth (){
	$data = new mysqli('localhost','ronlab','GSyngach','bike_service');
	if(!$data){echo "<p>connect db error</p>";}

	$query = $data->query("SELECT mech_login, mech_password FROM mechanic");

	while($log_pass = $query->fetch_assoc()){
	if( $log_pass['mech_login'] == $_POST['login'] and $log_pass['mech_password'] == $_POST['password'] ) {
		$h1="<h1>вы вошли</h1>";
		return $h1;
	}
	else{
		$h1="<h1>НЕВЕРНЫЙ ЛОГИН ИЛИ ПАРОЛЬ</h1>";
		return $h1;	
	};
	};
};
?>