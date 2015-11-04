<?php

$data = new mysqli('localhost','ronlab','GSyngach','bike_service');

if($data->connect_errno){
	echo "no connection";
}
else {
	echo "<p>connect</p>";
};

/*
For($i=4; $i<7; $i++){
	if(!$data->query("DELETE FROM client WHERE cl_id=$i")){echo "error delete". $data->error;}
};
*/

/*
if(	!$data->query("INSERT INTO client(cl_name, cl_surname, cl_phone1) VALUES ('Pasha','Mamaev', '89058721942')")){
	echo 'insert error' . $data->error;
}
else{
	echo '<p>insert complite</p>';
};*/

$client_select=$data->query("SELECT * FROM client" );

/*
echo "<p> client_select: ";
print_r($client_select);
echo "<p>";*/

$cl=$client_select->fetch_all();
for($i=0;$i<$client_select->num_rows; $i++){
	print_r($cl[$i]);
	echo "<p>";
}

/*print_r ($cl);
echo "<p>";
print_r ($cl[1]);
foreach($client_select->fetch_assoc() as $client_result){
	print_r($client_result); 
	$client_select->next;
}*/
?>
