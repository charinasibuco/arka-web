<?php
	include 'config.php';

	$guard_id= $_POST['guard_id'];
    $staff_id= $_POST['staff_id'];
    $time_stamp = date("y/m/d : H:i:s", time());

	$query = "INSERT INTO staff_log(SL_UID, S_ID, SL_IN) VALUES ('$guard_id', '$staff_id', '$time_stamp')";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

    if($result){
          $data = array('staffStatus'=>'Success'); 
	  echo(json_encode($data));
	} else { 
          $data = array('staffStatus'=>'Failed'); 
          echo(json_encode($data)); 
    }
?>