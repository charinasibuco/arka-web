<?php
	include 'config.php';

        $visitor_id= $_POST['visitor_id'];

	$query = "UPDATE visitor_log SET VL_Pic='1' WHERE VL_ID='$visitor_id'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

        if($result){
          echo 1;
	} else { 
          echo 0; 
        }
?>