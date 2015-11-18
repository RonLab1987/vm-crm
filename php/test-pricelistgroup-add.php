<?php include_once 'pricelist_class.php'; ?>
 <?php  if($_POST['AddSubmit']){
    $pricelist = new Pricelist;
    $pricelist->pricelistAdd();
    } 
 ?>
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

    <title>тест: добавляем группу</title>

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

      <?php
      $pricelist = new pricelist;
      echo $pricelist->group_html_table();
      ?>

    </div>
    
    <div class="container">
       <form class="form-signin" action="test-pricelistgroup-add.php" method="post">
        <label for="NewGroupName" class="sr-only">имя новой группы</label>
        <input type="text" id="NewGroupName" name="NewGroupName" class="form-control" placeholder="имя новой группы" required autofocus>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="AddSubmit" value="TRUE">добавить</button>
        
        
        
      </form>
    </div>
    
     <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

