// ОБРАБОТЧИКИ СОБЫТИЙ * ОБРАБОТЧИКИ СОБЫТИЙ * ОБРАБОТЧИКИ СОБЫТИЙ * ОБРАБОТЧИКИ СОБЫТИЙ *

$('document').ready(function(){showOrdersInJob(); showOrdersReady(); showOrdersArchive(); $('#nav_div').load ("nav.html");});

// END ОБРАБОТЧИКИ СОБЫТИЙ | END ОБРАБОТЧИКИ СОБЫТИЙ | END ОБРАБОТЧИКИ СОБЫТИЙ |


// DOM FUNCTION  * DOM FUNCTION  * DOM FUNCTION  * DOM FUNCTION

/*
 * showOrdersTables()
 * получаем json из showOrders() и 
 * выводим в виде таблицы с разбивкой по статусам
 *
 */
function showOrdersTables(json){    
    
    var html="<tr><th>ID</th><th>поступил</th><th>велосипед / деталь </th><th>клиент</th><th>телефон</th><th>статус</th></tr>";
       
    for(var i=0; i<json.length; i++){
     html += "<tr><td>"+json[i]['ord_id']+"</td><td>"+json[i]['ord_start_job']+
             "</td><td>"+json[i]['ord_bike']+"</td><td>"+json[i]['cl_name']+
             "</td><td>"+json[i]['cl_phone1']+"</td><td>"+json[i]['os_status']+"</td></tr>";   
    }
    $('#testTable').html(html);
}

/*
 * showOrdersInJobTable()
 * получаем json из showOrdersInJob() и 
 * выводим в виде таблицы 
 *
 */
function showOrdersInJobTable(json){
    
    var html="<tr><th>ID</th><th>поступил</th><th>велосипед / деталь </th><th>клиент</th><th>телефон</th></tr>";
       
    for(var i=0; i<json.length; i++){
     html += "<tr><td>"+json[i]['ord_id']+"</td><td>"+json[i]['ord_start_job']+
             "</td><td>"+json[i]['ord_bike']+"</td><td>"+json[i]['cl_name']+
             "</td><td>"+json[i]['cl_phone1']+"</td></tr>";   
    }
    $('#inJobTable').html(html);
}


/*
 * showOrdersReadyTable()
 * получаем json из showOrdersReady() и 
 * выводим в виде таблицы 
 *
 */
function showOrdersReadyTable(json){
    
    var html="<tr><th>ID</th><th>поступил</th><th>велосипед / деталь </th><th>клиент</th><th>телефон</th><th>позвонили</th><th>заплатили</th><th>забрали</th></tr>";
       
    for(var i=0; i<json.length; i++){
     html += "<tr><td>"+json[i]['ord_id']+"</td><td>"+json[i]['ord_start_job']+
             "</td><td>"+json[i]['ord_bike']+"</td><td>"+json[i]['cl_name']+
             "</td><td>"+json[i]['cl_phone1']+"</td><td>"+json[i]['called']+
             "</td><td>"+json[i]['paid']+"</td><td>"+json[i]['taken']+"</td></tr>";   
    }
    $('#readyTable').html(html);
}

/*
 * showOrdersArchiveTable()
 * получаем json из showOrdersInJob() и 
 * выводим в виде таблицы 
 *
 */
function showOrdersArchiveTable(json){
    
    var html="<tr><th>ID</th><th>поступил</th><th>отдали</th><th>велосипед / деталь </th><th>клиент</th><th>телефон</th></tr>";
       
    for(var i=0; i<json.length; i++){
     html += "<tr><td>"+json[i]['ord_id']+"</td><td>"+json[i]['ord_start_job']+"</td><td>"+json[i]['ord_finish_job']+
             "</td><td>"+json[i]['ord_bike']+"</td><td>"+json[i]['cl_name']+
             "</td><td>"+json[i]['cl_phone1']+"</td></tr>";   
    }
    $('#archiveTable').html(html);
}



// END DOM FUNCTION | END DOM FUNCTION | END DOM FUNCTION | END DOM FUNCTION |





// AJAX  FUNCTION * AJAX  FUNCTION * AJAX  FUNCTION * AJAX  FUNCTION


/*
 * showOrders()
 * получаем сводную таблицу заказов, с включенными 
 * в неё-же данными о клиенте и статусе заказа
 *
 */
function showOrders(){
    $.ajax({
        method: "POST",
        dataType: "json",
        url: "php/showOrdersJSON.php",
        error: function(json, status, error){console.log(status); console.log(error);},
        success: function(json){ console.dir(json);showOrdersTables(json);}
    });
}

/*
 * showOrdersInJob()
 * получаем сводную таблицу заказов со статусом "В РАБОТЕ" , с включенными 
 * в неё-же данными о клиенте
 *
 */
function showOrdersInJob(){
    $.ajax({
        method: "POST",
        dataType: "json",
        url: "php/showOrdersInJobJSON.php",
        error: function(json, status, error){console.log(status); console.log(error);},
        success: function(json){ console.dir(json);showOrdersInJobTable(json);}
    });
}

/*
 * showOrdersReady()
 * получаем сводную таблицу заказов со статусом "ГОТОВО" , с включенными 
 * в неё-же данными о клиенте и мини-статусами заказа
 *
 */
function showOrdersReady(){
    $.ajax({
        method: "POST",
        dataType: "json",
        url: "php/showOrdersReadyJSON.php",
        error: function(json, status, error){console.log(status); console.log(error);},
        success: function(json){ console.dir(json);showOrdersReadyTable(json);}
    });
}

/*
 * showOrdersArchive()
 * получаем сводную таблицу заказов со статусом "АРХИВ" , с включенными 
 * в неё-же данными о клиенте и мини-статусами заказа
 *
 */
function showOrdersArchive(){
    $.ajax({
        method: "POST",
        dataType: "json",
        url: "php/showOrdersArchiveJSON.php",
        error: function(json, status, error){console.log(status); console.log(error);},
        success: function(json){ console.dir(json);showOrdersArchiveTable(json);}
    });
}

// END AJAX  FUNCTION | END AJAX  FUNCTION | END AJAX  FUNCTION |  END AJAX  FUNCTION |