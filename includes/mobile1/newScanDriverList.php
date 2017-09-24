<?php
	include 'config.php';

	$query = "SELECT * FROM users WHERE U_Type ='Driver' ORDER BY U_ID ASC";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
	        while($row = mysql_fetch_assoc($result)) {
                   $data[] = array('driverID'=>$row['U_ID'], 'driverLName'=>$row['U_LName'], 'driverFName'=>$row['U_FName']); 
	
		}
		echo(json_encode($data));
	} else {
		echo -1;
	}
?>