<?php
	include 'config.php';

	$driver_id= $_POST['driver_id'];
	$guard_id= $_POST['guard_id'];
        $vehicle_id = $_POST['vehicle_id'];
        $serial= $_POST['serial'];
        $status= $_POST['status'];
        $trailer=$_POST['trailer'];
        $time_stamp = date("y/m/d : H:i:s", time());

	$query = "INSERT INTO gate_log(U_ID, V_ID, GL_UID, GL_Serial, GL_Date, GL_Status, T_ID) VALUES ('$driver_id', '$vehicle_id ', '$guard_id','$serial','$time_stamp ', '$status', '$trailer')";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

    if($result){
        	$query1 = "SELECT * from gate_log where GL_Date='$time_stamp'";
	        $result1 = mysql_query($query1) or die("Unable to insert : " . mysql_error());

	        $gatelog= mysql_fetch_array($result1);
	        $latest_id= $gatelog['GL_ID'];
                $latest_status= $gatelog['GL_Status'];
                
                $status2;
                if(!empty($serial)){
                   $status2 = "Loaded";
                } else {
                   $status2 = "Empty";  
                }
                
                $query1 = "UPDATE vehicle SET V_Status1='$latest_status',V_Status2 ='$status2' , V_Date='$time_stamp' WHERE V_ID='$vehicle_id'";
	        $result1 = mysql_query($query1);

                echo $latest_id.",".$latest_status;
	} else { 
        echo 0; 
    }
?>