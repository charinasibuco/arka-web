<?php
	include 'config.php';

        $vehicleID= $_POST['vehicleID'];

	$query = "SELECT gate_log.U_ID, gate_log.V_ID, GL_Status FROM gate_log INNER JOIN vehicle ON vehicle.V_ID = gate_log.V_ID where gate_log.V_ID = '$vehicleID' ORDER BY GL_Date DESC";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

        if(mysql_num_rows($result) > 0){
             $logstatus = mysql_fetch_array($result);
             $data[] = array('GL_Status'=>$logstatus['GL_Status'], 'V_ID' => $logstatus['V_ID'], 'U_ID' => $logstatus['U_ID']);
             echo json_encode($data);
	} else { 
             echo 0;
    }
?>