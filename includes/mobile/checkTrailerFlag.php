<?php
	include 'config.php';

        $trailerID=$_POST['trailerID'];

	$query = "SELECT * FROM trailer WHERE T_ID='$trailerID' AND  T_Flag!=''";
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