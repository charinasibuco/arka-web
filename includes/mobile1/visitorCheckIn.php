<?php
	include 'config.php';

	$guard_id= $_POST['guard_id'];
        $visitor_name= $_POST['visitor_name'];
        $time_stamp = date("y/m/d : H:i:s", time());
        $visitor_qr = $_POST['visitor_qr'];

	$query = "INSERT INTO visitor_log(VL_UID, VL_Name, VL_IN, VI_ID) VALUES ('$guard_id', '$visitor_name', '$time_stamp','$visitor_qr')";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

        if($result){
                $query1 = "SELECT * from visitor_log where VL_IN='$time_stamp'";
	        $result1 = mysql_query($query1) or die("Unable to insert : " . mysql_error());

	        $visitorlog= mysql_fetch_array($result1);
	       
                $data = array('visitorID'=>$visitorlog['VL_ID']); 
		echo(json_encode($data));
	} else { 
            $data = array('visitorID'=>"0"); 
	    echo(json_encode($data));
        }
?>