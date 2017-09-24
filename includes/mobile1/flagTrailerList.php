<?php
	include 'config.php';

	$query = "SELECT * FROM trailer WHERE T_Flag!=''";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_assoc($result)) {
	           $data[] = array('flagPrimaryInfo'=>$row['T_Number']."-Trailer", 'flagSecondaryInfo' =>"", 'flagColor'=>$row['T_Flag'], 'flagRemarks'=>$row['T_Remarks']); 
		}
		echo(json_encode($data));
	} else {
		echo -1;
	}
?>