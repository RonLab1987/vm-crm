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
	$('#pricelistTable').load("test-ajax-pricelist.php");
}

function pricelistAdd(){
	$.ajaxSetup({
  		async: false
	});
		var action = $(pricelistFormAdd).attr("action"); 
	var post = $(pricelistFormAdd).serializeArray(); 
	var result = $.post(action, post);
	
	$.ajaxSetup({
		async: true
	});
	result.complete(reNew());
	//clearTimeout (5000);
	
	//pricelistTable();
	
}

function pricelistGroupList(){
	
	$('#priselistgroupSelect').load("test-ajax-pricelistGroupList.php");
	
}
