<?php
	include 'config.php';

        $vehicleID= $_POST['vehicleID'];

	$query = "SELECT * FROM vehicle where V_ID='$vehicleID'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
	     $vehicleInfo = mysql_fetch_array($result);

             $data = array('vehicleNumber'=>$vehicleInfo['V_Number']); 
             echo(json_encode($data));
	} else {
	     $data = array('vehicleNumber'=>'0'); 
             echo(json_encode($data));
	}
?>