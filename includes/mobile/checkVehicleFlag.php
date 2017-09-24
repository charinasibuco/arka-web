<?php
	include 'config.php';

        $vehicleID=$_POST['vehicleID'];

	$query = "SELECT * FROM vehicle WHERE V_ID='$vehicleID' AND  V_Flag!=''";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_assoc($result)) {
			$output[]=$row;
		}
		echo(json_encode($output));
	} else {
		echo 0;
	}
?>