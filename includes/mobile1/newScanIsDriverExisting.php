<?php
	include 'config.php';

        $driverID=$_POST['driverID'];

	$query = "SELECT * FROM users WHERE U_ID='$driverID' AND U_Type ='Driver'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
             $data = array('driverStatus'=>'Existing'); 
             echo(json_encode($data));
	} else {
             $data = array('driverStatus'=>'NotExisting'); 
             echo(json_encode($data));
	}
?>