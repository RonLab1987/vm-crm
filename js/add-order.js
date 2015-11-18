/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$('document').ready( function (){
        $('#cl_phone_status').html('введи номер телефона');
        $('#cl_phone').inputmask("+7(999)999-99-99", {
                        "oncomplete": function(){$('#cl_phone_status').html('ищу клиента');}, //здесь будет вызов функции поиска клиента по телефону
                        "oncleared": function(){$('#cl_phone_status').html('введи номер телефона'); }} );
        $('#ord_date_start').inputmask("dd.mm.yyyy",{"placeholder": "дд.мм.гггг"} );
        var date = new Date();
        $('#ord_date_start').val(date.toLocaleDateString());
       
    }
);
