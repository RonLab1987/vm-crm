

// ОБРАБОТЧИКИ СОБЫТИЙ * ОБРАБОТЧИКИ СОБЫТИЙ * ОБРАБОТЧИКИ СОБЫТИЙ * ОБРАБОТЧИКИ СОБЫТИЙ *

$('document').ready(dockReady); // DOM FUNCTION
$("#cityPhone").click(setPhoneMask); // DOM FUNCTION
//$( "#addOrderForm" ).submit(function( event ) { addOrder();  event.preventDefault();}); // AJAX FUNCTION
$( "#addOrderForm" ).submit(addOrder); // AJAX FUNCTION
//$("#cl_phone").change(addOrderHide);

// END ОБРАБОТЧИКИ СОБЫТИЙ | END ОБРАБОТЧИКИ СОБЫТИЙ | END ОБРАБОТЧИКИ СОБЫТИЙ |
 



// DOM FUNCTION  * DOM FUNCTION  * DOM FUNCTION  * DOM FUNCTION



/*
 * dockReady()
 * работает по готовности дока
 *
 */

function dockReady(){
    addOrderHide();
    $('#nav_div').load ("./nav.html");
    setPhoneMask();
                   
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
    addOrderHide();
    $('#cl_phone_status').html('введи номер телефона');
    $('#cl_phone').val("");
    $('#cl_name').val("");
    
    
    if($("#cityPhone").html() == 'сотовый номер' || $("#cityPhone").html() == '' ){
      var mask ="+7(999)999-99-99";
      var btn = "городской / прямой";
      var plh = "сотовый телефон"
    }
    else{
      var mask ="+7(833)299-99-99";
      var btn = "сотовый номер";
      var plh = "городской / прямой телефон"
    }
    
    $('#cl_phone').inputmask(mask, {
                        "oncomplete": function(){$('#cl_phone_status').html('ищу клиента'); existClient();}, // AJAX  FUNCTION
                        "onincomplete": function(){$('#cl_phone_status').html('введи номер телефона');  $('#cl_name').val(""); addOrderHide();}, // DOM FUNCTION
                        "oncleared": function(){$('#cl_phone_status').html('введи номер телефона');  $('#cl_name').val(""); addOrderHide();} }); // DOM FUNCTION
    cl_phone.placeholder = plh;
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
        $('#cl_id').val(json['cl_id']);
    }
    else{
        $('#cl_phone_status').html(' это новый клиент, постарайся чтобы он вернулся ;) ');
        $('#cl_name').val('');
        $('#cl_id').val('-1');
    }
    addOrderShow();
}


/*
 * dockClear()
 * очищаем значения input
 *
 */

function dockClear(){
    //addOrderHide();
    $('#cl_id').val('-1');
    $('#ord_internal_note').val('');     
    $('#ord_bike').val('');
   
    $("#cityPhone").html('');
    
    setPhoneMask();
    
                
    $('#ord_date_start').val('');
    var date = new Date();
    $('#ord_date_start').val(date.toLocaleDateString());
}

    
/*
 * addOrderHide()
 * скрывает группу input элеметов формы
 *
 */

function addOrderHide(){
    if (!$('#addOrderGroup').hasClass('invisible')){
        $('#addOrderGroup').toggleClass('invisible');
    }    
}

/*
 * addOrderShow()
 * скрывает группу input элеметов формы
 *
 */

function addOrderShow(){
    if ($('#addOrderGroup').hasClass('invisible')){
        $('#addOrderGroup').toggleClass('invisible');
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
    var dataOrder = $("#addOrderForm").serializeArray();
    console.dir (dataOrder);
    
    $.ajax({
        method: "POST",
        dataType: "json",
        url: "php/addOrderJSON.php",
        data: dataOrder,
        success: function(json){ console.log(json); dockClear();}
    });
}

// END AJAX  FUNCTION | END AJAX  FUNCTION | END AJAX  FUNCTION |  END AJAX  FUNCTION |