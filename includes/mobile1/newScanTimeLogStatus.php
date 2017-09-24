<?php
	include 'config.php';

	$driver_id= $_POST['driverID'];
        
	$query = "SELECT gate_log.V_ID, GL_Status, V_Number,V_Type, V_Plate, gate_log.T_ID, T_Number FROM gate_log INNER JOIN vehicle ON vehicle.V_ID = gate_log.V_ID LEFT JOIN trailer ON gate_log.T_ID = trailer.T_ID where U_ID = '$driver_id' ORDER BY GL_Date DESC";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

        if(mysql_num_rows($result) > 0){
             $logstatus = mysql_fetch_array($result);

                   if (is_null($logstatus['T_Number'])) {
                      $logstatus['T_Number'] = "0";
                   }

             $data = array('logStatus'=>$logstatus['GL_Status'], 'vehicleID' => $logstatus['V_ID'], 'vehicleNumber' => $logstatus['V_Number'], 'vehicleType' => $logstatus['V_Type'], 'vehiclePlate' => $logstatus['V_Plate'] ,'trailerID' => $logstatus['T_ID'], 'trailerNumber'=> $logstatus['T_Number'], 'truckLogStatus'=>'Available');
             echo json_encode($data);
	} else { 
            $data = array('truckLogStatus'=>'NotAvailable');
            echo json_encode($data);
        }
?>