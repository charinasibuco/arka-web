<?php
	include 'config.php';

        $vehicleID=$_POST['vehicleID'];

	$query = "SELECT * FROM vehicle WHERE V_ID='$vehicleID'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
             $data = array('vehicleStatus'=>'Existing'); 
             echo(json_encode($data));
	} else {
	     $data = array('vehicleStatus'=>'NotExisting'); 
             echo(json_encode($data));
	}
?>