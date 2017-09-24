<?php
	include 'config.php';

	$driver_id= $_POST['driver_id'];

	$query = "SELECT gate_log.V_ID, GL_Status, V_Number,V_Type, V_Plate, T_ID FROM gate_log INNER JOIN vehicle ON vehicle.V_ID = gate_log.V_ID where U_ID = '$driver_id' ORDER BY GL_Date DESC";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

        if(mysql_num_rows($result) > 0){
             $logstatus = mysql_fetch_array($result);
             $data[] = array('GL_Status'=>$logstatus['GL_Status'], 'V_ID' => $logstatus['V_ID'], 'V_Number' => $logstatus['V_Number'], 'V_Type' => $logstatus['V_Type'], 'V_Plate' => $logstatus['V_Plate'] ,'T_ID' => $logstatus['T_ID']);
             echo json_encode($data);
	} else { 
             echo 0;
    }
?>