<?php
	include 'config.php';

        $vehicleID= $_POST['vehicleID'];

	$query = "SELECT * FROM vehicle where V_ID='$vehicleID'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
	     $vehicleInfo = mysql_fetch_array($result);
             echo $vehicleInfo ['V_Number'];
	} else {
		echo 0;
	}
?>