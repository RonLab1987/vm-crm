// ОБРАБОТЧИКИ СОБЫТИЙ * ОБРАБОТЧИКИ СОБЫТИЙ * ОБРАБОТЧИКИ СОБЫТИЙ * ОБРАБОТЧИКИ СОБЫТИЙ *

$('document').ready(function(){showOrders();$('#nav_div').load ("nav.html");});

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

// END AJAX  FUNCTION | END AJAX  FUNCTION | END AJAX  FUNCTION |  END AJAX  FUNCTION |