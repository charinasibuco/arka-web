<?php
	include 'config.php';

        $vehicleID=$_POST['vehicleID'];

	$query = "SELECT * FROM vehicle WHERE V_ID='$vehicleID'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
		echo 1;
	} else {
		echo 0;
	}
?>