<?php
	include 'config.php';

        $timeStamp = date("y/m/d : H:i:s", time());
        $id = $_POST['staff_log_id'];

	$query = "UPDATE staff_log SET SL_OUT='$timeStamp' WHERE SL_ID='$id'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

        if($result){
          $data = array('staffStatus'=>'Success'); 
	  echo(json_encode($data));
	} else { 
          $data = array('staffStatus'=>'Failed'); 
          echo(json_encode($data)); 
        }
?>