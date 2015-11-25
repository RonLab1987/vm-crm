<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="ru"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>КАТАЙ: редактирование заказа</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
       
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        
        
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
       <div id='nav_div'></div>
    
    
    
    
    <div class="container">
        <h3> Заказ №: <span id="ordIdSpan"> <?php echo $_GET['ord_id'] ?> </span> </h3>
        <div id="mainInfo">
            <form id='mainInfoForm'>
                <label for="ordBike">велосипед / запчасть</label>
                <input class="form-control" id='ordBike' type="text" />
                <label for="clName">имя хозяина</label>
                <input class="form-control" id='clName' type="text" />
                <label for="clPhone">телефон хозяина</label>
                <input class="form-control" id='clPhone' type="text" />
                <label for="ordStartDay">дата начала обслуживания</label>
                <input class="form-control" id='ordStartDay' type="text" />
                <label for="ordFinishDay">дата окончания обслуживания</label>
                <input class="form-control" id='ordFinishDay' type="text" />
                <label for="ordInternalNote">внутренний коментарий</label>
                <textarea class="form-control"  id='ordInternalNote' type="text" rows="5"></textarea> 
                <label for="ordClientNote">коментарий для клиента</label>
                <textarea class="form-control"  id='ordClientNote' type="text" rows="5"></textarea>  
                <label for="ordMechName">механик</label>
                <input class="form-control" id='ordMechName' type="text" />
            </form>
            
        </div>
        
    </div>
       
       
       
       
       
       <!-- поле с id заказа. Не удалять. JS берет значение отсюда  -->
       <form id="ordIdForm">
           <input class="invisible" id="ordId" type="text" name="ordId" value="<?php echo $_GET['ord_id'] ?>"> 
       </form>
       
   </body>
   
    
    
   
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.js"><\/script>')</script>

        <script src="js/vendor/bootstrap.min.js"></script>
        
       <script src="js/edit-order.js"></script>

       
    </body>
</html>
