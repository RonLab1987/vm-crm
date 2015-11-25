$( "#form" ).submit(function( event ) {
  go();
  event.preventDefault();
});

function go(){
    var data = $('#form').serializeArray();
    console.dir (data);
    $.post( "php/test-polinom.php", data, function(answer){$("#answer").html(answer);});
   
}
 

