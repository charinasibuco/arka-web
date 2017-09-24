<?php
	include 'config.php';

	$query = "SELECT * FROM users WHERE U_Type ='Staff'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
            while($row = mysql_fetch_assoc($result)) {
                $data[] = array('staffID'=>$row['U_ID'], 'staffLastName'=>$row['U_LName'], 'staffFirstName'=>$row['U_FName']); 
		}
		echo(json_encode($data));
	} else {
		echo -1;
	}
?>