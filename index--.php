<?php

echo "start <br>";

$data = new mysqli("localhost", "ronlab", "GSyngach", "bike_service" );

if($data->connect_errno){
    echo $data->connect_error;
}
else {
    echo "host info: " . $data->host_info . "<br>";
}

$mech = $data->query("SELECT * FROM mechanic");

while ($res = $mech->fetch_assoc()){
    echo "<p> mechanic id (" . $res['mech_id'] . "):" . $res['mech_name'] . " (" . $res['mech_login'] . "); </p>" ;
}



echo "end";

?>