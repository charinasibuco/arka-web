<?php
	include 'config.php';

	$guard_id= $_POST['guard_id'];
        $tenant_id= $_POST['tenant_id'];
        $time_stamp = date("y/m/d : H:i:s", time());

	$query = "INSERT INTO tenant_log(TL_UID, T_ID, TL_IN) VALUES ('$guard_id', '$tenant_id', '$time_stamp')";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

        if($result){
          echo "1";
	} else { 
          echo "0"; 
        }
?>