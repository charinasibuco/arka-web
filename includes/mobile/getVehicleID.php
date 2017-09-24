<?php
	include 'config.php';

        $vehicleNum= $_POST['vehicleNum'];

	$query = "SELECT * FROM vehicle where V_Number='$vehicleNum'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
	     $vehicleInfo = mysql_fetch_array($result);
             echo $vehicleInfo ['V_ID'];
	} else {
		echo 0;
	}
?>