//$('button#AddSubmit').on('click',
//	function() {alert ('hi');}
//);

$(document).ready(reNew());

$( "#pricelistFormAdd" ).submit(function( event ) {
  pricelistAdd();
  event.preventDefault();
});

function reNew(){
	pricelistTable();
	pricelistGroupList();	
}

function pricelistTable(){
	$('#pricelistTable').load("php/test-ajax-pricelist.php");
}

function pricelistAdd(){
	
	var action = $(pricelistFormAdd).attr("action"); 
	var post = $(pricelistFormAdd).serializeArray(); 
	var result = $.post(action, post,function (){reNew()});
	
}

function pricelistGroupList(){
	
	$('#priselistgroupSelect').load("php/test-ajax-pricelistGroupList.php");
	
}
