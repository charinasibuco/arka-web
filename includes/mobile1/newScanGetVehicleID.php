<?php
	include 'config.php';

        $vehicleNum= $_POST['vehicleNum'];

	$query = "SELECT * FROM vehicle where V_Number='$vehicleNum'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
	     $vehicleInfo = mysql_fetch_array($result);
             
             $data = array('vehicleID'=>$vehicleInfo ['V_ID']); 
             echo(json_encode($data));

	} else {
	     $data = array('vehicleID'=>'0'); 
             echo(json_encode($data));
	}
?>