<?php
	include 'config.php';

        $trailerNumber= $_POST['trailerNumber'];

	$query = "SELECT * FROM trailer where T_Number='$trailerNumber'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
	     $trailerInfo = mysql_fetch_array($result);
             echo $trailerInfo ['T_ID'];
	} else {
		echo 0;
	}
?>