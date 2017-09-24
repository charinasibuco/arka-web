<?php
	include 'config.php';

	$query = "SELECT * FROM trailer ORDER BY T_ID ASC";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_assoc($result)) {
	               $data[] = array('trailerNumber'=>$row['T_Number']); 
		}
		echo(json_encode($data));
	} else {
		echo -1;
	}
?>