<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>test-bootstrap</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
 
  <!-- CAROUSEL -->
  <div class="container-fluid">
    <div id="cl" class="carousel slide" data-ride="carousel">
      <!--indicator-->
      <ol class="carousel-indicators">
        <li data-target="#cl" data-slide-to="0"  class="active"></li>
        <li data-target="#cl" data-slide-to="1"></li>
        <li data-target="#cl" data-slide-to="2"></li>
      </ol>
      
      <!-- wrapper -->
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img  src="image/scr1.jpg" alt="Screen 1">
          <div class="carousel-caption">
            <h2>MESSAGE #1 <br><small>screen #1 message</small></h2>
          </div>
        </div>
        <div class="item ">
          <img src="image/scr2.jpeg" alt="Screen 2">
          <div class="carousel-caption">
            <h1>MESSAGE #2</h1>
            <p class="lead text-uppercase">screen #2 message<p>
          </div>
        </div>
         <div class="item ">
          <img src="image/scr3.jpg" alt="Screen 3">
          <div class="carousel-caption">
            <h2>MESSAGE #3</h2>
            <p class="leade">screen #3 message<p>
          </div>
        </div>
        
        <!-- Controls -->
        <a class="left carousel-control" href="#cl" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#cl" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>    
<!-- END OF CAROUSEL -->

<!-- MENU -->
    <nav class="navbar navbar-default navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">КАТАЙ.</a>
          <p class="navbar-text text-uppercase">веломастерская. киров.</p>
        </div>
        
        
      </div>
    </nav>

<!-- END OF MENU -->

    
  <div class="container">  

    <div class="row bg-primary">
      <div class="col-md-12 ">
        <h1>ЭКСПЕРЕМЕНТИРУЕМ С BOOTSTRAP</h1>
      </div>
    </div>
    
    
    <div class="row">
      <div class="col-md-4">
        <h1>Заголовок h1</h1>
        <h1>Заголовок h1<small> + пояснение</small></h1>
         <h3>Заголовок h3</h1>
        <h3>Заголовок h3<small> + пояснение</small></h3>
      </div>
      <div class="col-md-4">
        <p class="lead">Параграф lead</p>
        <p>Обычный параграф</p>
        <p>текст который <code>код</code></p>
        <p>текст который <mark>выделили</mark></p>
        <p>текст который <del>удалили</del></p>
        <p>текст который <s>больше не релевантен</s></p>
        <p>текст который <ins>вставили</ins></p>
        <p>текст который <u>подчеркнули</u></p>
        <p>текст обычный, <small>маленький,</small> <strong>полужирный,</strong> <em>курсив,</em> обычный</p>
      </div>
      <div class="col-md-4">
        <p class="text-left">Left aligned text.</p>
        <p class="text-center">Center aligned text.</p>
        <p class="text-right">Right aligned text.</p>
        <p class="text-justify">Justified text.</p>
        <p class="text-nowrap">No wrap text.</p>
        
        <p class="text-lowercase">Lowercased text.</p>
        <p class="text-uppercase">Uppercased text.</p>
        <p class="text-capitalize">Capitalized text.</p>
      </div>
   </div>
   <div class="row">
     <div class="col-md-3 bg-success" >
       <h2>Адрес</h2>
       <adress>
         <strong>ВЕЛОМАСТЕРСКАЯ "КАТАЙ"</strong><br>
         <small>1.</small> Киров, Волкова, 12<br>
         <small>2.</small> Киров, Ломоносова, 29<br>
         <strong>43-45-95</strong> 
       </adress>
     </div>
     <div class="col-md-6 ">
       <h2>Цитата</h2>
       <blockquote >
         <p class="lead">Да, именно так я изучаю BOOTSTRAP.<br> И он мне нравится!<p>
         <footer>Роман <cite title="Source Title">Писк из вечности</cite></footer>
       </blockquote>
     </div>
     <div class="col-md-3 bg-info">
       <h2>Списки</h2>
       <ul>
         <li>Список 1</li>
         <li>Список 2
          <ul>
         <li>Подсписок 1</li>
         <li>Подсписок 2</li>  
          </ul></li>
          <li>Пункт 3</li>  
       </ul>
       
        <ol>
         <li>Список 1</li>
         <li>Список 2</li>
          <ol>
         <li>Подсписок 1</li>
         <li>Подсписок 2</li>  
          </ol>
          <li>Пункт 3</li>  
       </ol>
       
        <ul class="list-unstyled">
         <li>Список 1</li>
         <li>Список 2</li>
          <ul >
         <li>Подсписок 1</li>
         <li>Подсписок 2</li>  
          </ul>
          <li>Пункт 3</li>  
       </ul>
       
       <ul class="list-inline">
         <li>Список 1</li>
         <li>Список 2</li>
          <li>Пункт 3</li>  
       </ul>
       
     </div>
  </div>
   
  <div class="row">
  <div class="col-md-12 text-primary">
    <h2>Table's</h2>
  </div>  
  </div>
  
  <div class="row">
    <div class="col-md-3">
      <p>class="table"</p>
      <table class="table">
            <tr><th>Header 1</th><th>Header 2</th></tr>
            <tr><td>Value 1</td><td>Value 2</td></tr>
            <tr><td>Value 1</td><td>Value 2</td></tr>
            <tr><td>Value 1</td><td>Value 2</td></tr>
            <tr><td>Value 1</td><td>Value 2</td></tr>
      </table>
    </div>
    <div class="col-md-3">
      <p>class="table table-striped"</p>
      <table class="table table-striped">
            <tr><th>Header 1</th><th>Header 2</th></tr>
            <tr><td>Value 1</td><td>Value 2</td></tr>
            <tr><td>Value 1</td><td>Value 2</td></tr>
            <tr><td>Value 1</td><td>Value 2</td></tr>
            <tr><td>Value 1</td><td>Value 2</td></tr>
      </table>
    </div>
    <div class="col-md-3">
       <p>div class="table-responsive" + class="table table-bordered"</p>
      <div class="table-responsive">
      <table class="table table-bordered">
            <tr><th>Header 1</th><th>Header 2</th><th>Header 1</th><th>Header 2</th><th>Header 1</th><th>Header 2</th></tr>
            <tr><td>Value 1</td><td>Value 2</td><td>Value 1</td><td>Value 2</td><td>Value 1</td><td>Value 2</td></tr>
            <tr><td>Value 1</td><td>Value 2</td><td>Value 1</td><td>Value 2</td><td>Value 1</td><td>Value 2</td></tr>
            <tr><td>Value 1</td><td>Value 2</td><td>Value 1</td><td>Value 2</td><td>Value 1</td><td>Value 2</td></tr>
            <tr><td>Value 1</td><td>Value 2</td><td>Value 1</td><td>Value 2</td><td>Value 1</td><td>Value 2</td></tr>
      </table>
      </div>
    </div>
    <div class="col-md-3">
      <p>class="table table-hover"</p>
      <table class="table table-hover">
            <tr><th>Header 1</th><th>Header 2</th></tr>
            <tr><td>Value 1</td><td>Value 2</td></tr>
            <tr><td>Value 1</td><td>Value 2</td></tr>
            <tr><td>Value 1</td><td>Value 2</td></tr>
            <tr><td>Value 1</td><td>Value 2</td></tr>
      </table>
    </div>    
  </div>
  
  
  <div class="row">
  <div class="col-md-12 text-primary">
    <h2>Form's</h2>
  </div>  
  </div>
  
  <div class="row">
    <div class="col-md-4">
      <form>
        <div class="form-group">
          <label for="clientPhone">Ваш номер телефона</label>
          <input type="text" class="form-control" id="clientPhone" placeholder="Номер телефона">
          <label for="clientPhone">Ваше имя</label>
          <input type="text" class="form-control" id="clientPhone" placeholder="Имя">
          <button class="submit">Войти</button>
        </div>
        
        <p class="lead">CHECKBOX</p>
        <div class="form-group">
          <div class="checkbox">
            <label>
              <input type="checkbox" value="chek1" id="chekbox1">
              Check #1
            </label>
          </div>
          <div class="checkbox">
            <label>
              <input type="checkbox" value="chek2" id="chekbox1">
              Check #2
            </label>
          </div>
          <div class="checkbox disabled">
            <label>
              <input type="checkbox" value="chek3" id="chekbox1" disabled>
              Check #3
            </label>
          </div>
        </div>
        
             
        <p class="lead">RADIO</p>
        <div ="form-group">
          <div class="radio">
            <label>
              <input type="radio" name="radio" value="chek1" id="radio1" >
              Check #1
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="radio" value="chek2" id="radio2" cheked>
              Check #2
            </label>
          </div>
          <div class="radio ">
            <label>
              <input type="radio" name="radio" value="chek3" id="radio3" >
              Check #3
            </label>
          </div>
        </div>    

        
      </form>
    </div>
    <div class="col-md-4">
      <form>
        <label for="date">DATETIME-LOCAL</label>
        <input type="datetime-local" class="form-control" id="date">
        <label for="date">DATE</label>
        <input type="date" class="form-control" id="date">
        <label for="clientPhone2">Phone</label>
        <input type="tel" class="form-control" id="clientPhone2">
        <label for="color">Color</label>
        <input type="color" class="form-control" id="num" value="#339955">
        <label for="search">search</label>
        <input type="search" class="form-control" id="search">
      </form>
    </div>
    
    <div class="col-md-4">
 
      
      
    </div>
  </div>
    
  
  
  
   
  </div>  
  
  
  <footer>
    QU
  </footer>
    <!--
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 col-sm-3"><p>column 1</p></div>
        <div class="col-md-9 col-sm-9 ">
          <p>column 2</p>
          <table class="table">
            <tr><th>Header 1</th><th>Header 2</th></tr>
            <tr><td>Value 1</td><td>Value 2</td></tr>
          </table>
         </div>
      </div>
     </div>
     -->

<!--form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form-->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>