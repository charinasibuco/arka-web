<?php
	include 'config.php';

        $timeStamp = date("y/m/d : H:i:s", time());
        $qr = $_POST['qr'];

	$query = "UPDATE visitor_log SET VL_OUT='$timeStamp' WHERE VI_ID='$qr'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

        if ($result) {
           echo 1;
        } else { 
           echo 0; 
        }
?>