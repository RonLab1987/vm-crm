

// ОБРАБОТЧИКИ СОБЫТИЙ * ОБРАБОТЧИКИ СОБЫТИЙ * ОБРАБОТЧИКИ СОБЫТИЙ * ОБРАБОТЧИКИ СОБЫТИЙ *

$('document').ready(dockReady); // DOM FUNCTION
$("#cityPhone").click(setPhoneMask); // DOM FUNCTION
$("#addOrder").click(addOrder); // AJAX FUNCTION

// END ОБРАБОТЧИКИ СОБЫТИЙ | END ОБРАБОТЧИКИ СОБЫТИЙ | END ОБРАБОТЧИКИ СОБЫТИЙ |
 



// DOM FUNCTION  * DOM FUNCTION  * DOM FUNCTION  * DOM FUNCTION



/*
 * dockReady()
 * работает по готовности дока
 *
 */

function dockReady(){
    $('#nav_div').load ("./nav.html");
    $('#cl_phone_status').html('введи номер телефона');
    $("#cityPhone").click();                
    $('#ord_date_start').inputmask("dd.mm.yyyy",{"placeholder": "дд.мм.гггг"} );
    var date = new Date();
    $('#ord_date_start').val(date.toLocaleDateString());
}


/*
 * setPhoneMask()
 * вешаю маску на input + меняю значение кнопки-переключателя
 *
 */
 
function setPhoneMask(){
    $('#cl_phone').val("");
    $('#cl_name').val("");
    
    if($("#cityPhone").html() == 'сотовый номер' || $("#cityPhone").html() == '' ){
      var mask ="+7(999)999-99-99";
      var btn = "городской / прямой";
    }
    else{
      var mask ="+7(833)299-99-99";
      var btn = "сотовый номер";
    }
    
    $('#cl_phone').inputmask(mask, {
                        "oncomplete": function(){$('#cl_phone_status').html('ищу клиента'); existClient();}, // AJAX  FUNCTION
                        "onincomplete": function(){$('#cl_phone_status').html('введи номер телефона');  $('#cl_name').val("");},
                        "oncleared": function(){$('#cl_phone_status').html('введи номер телефона');  $('#cl_name').val("");}} );
    $("#cityPhone").html(btn);
    
} 

/*
 * ifExistClient()
 * Принимаем результат поиска от existClient() и управляем DOM соотвественно ему.
 *
 */
function ifExistClient(json){
    console.log (json);
    if(json){
        console.log (json['cl_id']);
        console.log (json['cl_name']);
        $('#cl_name').val(json['cl_name']);
        $('#cl_phone_status').html('отлично, это наш старый знакомый(ая) ');
    }
    else{
        $('#cl_phone_status').html(' это новый клиент, постарайся чтобы он вернулся ;) ');
        $('#cl_name').val("");
    }
}

// END DOM FUNCTION | END DOM FUNCTION | END DOM FUNCTION | END DOM FUNCTION |




// AJAX  FUNCTION * AJAX  FUNCTION * AJAX  FUNCTION * AJAX  FUNCTION

/*
 * existClient()
 * Ищем клиента по номеру телефона. Данные принимаем в JSON: cl_id, cl_name - если есть такой, FALSE - если это новый клиент.
 * Результат передаем в ifExistClient() для вывода.
 *
 */

function existClient(){
    var cl_phone = $('#cl_phone').serialize();
    $.ajax({
        method: "POST",
        dataType: "json",
        url: "php/existClientJSON.php",
        data: cl_phone,
        success: function(json){ ifExistClient(json)}
    });
    
} 
// end existClient()





/*
 * addOrder()
 * добавляем заказ
 *
 */
function addOrder(){
    console.clear();
    console.log ('add order');
}

// END AJAX  FUNCTION | END AJAX  FUNCTION | END AJAX  FUNCTION |  END AJAX  FUNCTION |