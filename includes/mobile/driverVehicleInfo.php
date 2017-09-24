<?php
	include 'config.php';

	$driver_id= $_POST['driver_id'];


	$query = "SELECT U_FName, U_LName, users.V_ID, V_Number, V_Type, V_Plate FROM users INNER JOIN vehicle on users.V_ID = vehicle.V_ID WHERE U_ID ='$driver_id'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_assoc($result)) {
			$output[]=$row;
		}
		echo(json_encode($output));
	} else {
		echo -1;
	}
?>