<?php
	include 'config.php';

        $trailerID= $_POST['trailerID'];

	$query = "SELECT * FROM trailer where T_ID='$trailerID'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
	     $trailerInfo = mysql_fetch_array($result);
             echo $trailerInfo ['T_Number'];
	} else {
		echo 0;
	}
?>