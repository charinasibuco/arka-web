<?php
	include 'config.php';

	$query = "SELECT * FROM vehicle ORDER BY V_ID ASC";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_assoc($result)) {
	               $data[] = array('vehicleNumber'=>$row['V_Number'], 'vehicleType'=>$row['V_Type'], 'vehiclePlate'=>$row['V_Plate']); 
		}
		echo(json_encode($data));
	} else {
		echo -1;
	}
?>