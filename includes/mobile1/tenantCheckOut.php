<?php
	include 'config.php';

        $timeStamp = date("y/m/d : H:i:s", time());
        $id = $_POST['tenant_log_id'];

	$query = "UPDATE tenant_log SET TL_OUT='$timeStamp' WHERE TL_ID='$id'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

        if($result){
          $data = array('tenantStatus'=>'Success'); 
	  echo(json_encode($data));
	} else { 
          $data = array('tenantStatus'=>'Failed'); 
          echo(json_encode($data)); 
        }
?>