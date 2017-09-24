<?php
	include 'config.php';

	$query = "SELECT * FROM users WHERE U_Flag!=''";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_assoc($result)) {
$data[] = array('flagPrimaryInfo'=>$row['U_LName'], 'flagSecondaryInfo'=>$row['U_FName'], 'flagColor'=>$row['U_Flag'], 'flagRemarks'=>$row['U_Remarks']); 
	
		}
		echo(json_encode($data));
	} else {
		echo -1;
	}
?>