// ОБРАБОТЧИКИ СОБЫТИЙ * ОБРАБОТЧИКИ СОБЫТИЙ * ОБРАБОТЧИКИ СОБЫТИЙ * ОБРАБОТЧИКИ СОБЫТИЙ *

$('document').ready(function(){showOrderById(); $('#nav_div').load ("nav.html"); });

// END ОБРАБОТЧИКИ СОБЫТИЙ | END ОБРАБОТЧИКИ СОБЫТИЙ | END ОБРАБОТЧИКИ СОБЫТИЙ |



// DOM FUNCTION  * DOM FUNCTION  * DOM FUNCTION  * DOM FUNCTION

/*
 * showOrderFormById(json)
 * получаем JSON из showOrderById()
 * и выводим в форму
 * 
 */
function showOrderFormById(json){
    $('#ordBike').val(json['ord_bike']);
    $('#clName').val(json['cl_name']);
    $('#clPhone').val(json['cl_phone1']);
    
    $('#ordStartDay').val(json['ord_start_job']);
    $('#ordFinishDay').val(json['ord_finish_job']);
    $('#ordInternalNote').val(json['ord_internal_note']);        
    $('#ordClientNote').val(json['ord_client_note']); 
    $('#ordMechName').val(json['mech_name']); 
    
}

// END DOM FUNCTION | END DOM FUNCTION | END DOM FUNCTION | END DOM FUNCTION |





// AJAX  FUNCTION * AJAX  FUNCTION * AJAX  FUNCTION * AJAX  FUNCTION

/*
 * showOrderById()
 * получаем заказ по ID, включая данные
 * о клиенте и механике
 *
 */
function showOrderById(){
	var ordId = $("#ordIdForm").serializeArray();
    console.dir(ordId);
    $.ajax({
        method: "POST",
        data: ordId,
        dataType: "json",
        url: "php/showOrderByIdJSON.php",
        error: function(json, status, error){console.log('Error !'); console.log(status); console.log(error);},
        success: function(json){ showOrderFormById(json); console.dir(json); }
    });
}

// END AJAX  FUNCTION | END AJAX  FUNCTION | END AJAX  FUNCTION |  END AJAX  FUNCTION |