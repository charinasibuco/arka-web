<?php
	include 'config.php';

	$query = "SELECT VL_Name, VL_IN, VI_ID FROM visitor_log WHERE VL_OUT='0000-00-000 00:00:00'";
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