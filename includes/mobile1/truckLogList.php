<?php
	include 'config.php';

	$query = "SELECT gate_log.U_ID, U_Fname,U_LName,gate_log.V_ID,V_Type,V_Number, V_Plate,gate_log.T_ID, T_Number,GL_Serial, MAX(GL_Date) as GL_Date FROM gate_log INNER JOIN users ON users.U_ID = gate_log.U_ID INNER JOIN vehicle ON vehicle.V_ID=gate_log.V_ID LEFT JOIN trailer ON trailer.T_ID=gate_log.T_ID WHERE GL_Status='OUT' GROUP BY U_ID ORDER BY GL_Date DESC";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_assoc($result)) {
                  if (is_null($row['T_Number'])) {
                      $row['T_Number'] = "0";
                   }
			$data[] = array('driverID'=>$row['U_ID'], 'driverName'=>$row['U_LName'].", ".$row['U_Fname'], 'vehicleID'=>$row['V_Number'], 'vehicleType'=>$row['V_Type'], 'vehiclePlate'=>$row['V_Plate'], 'trailerID'=>$row['T_Number'], 'time'=>$row['GL_Date'], 'sealNo'=>$row['GL_Serial']); 


		}
		echo(json_encode($data));
	} else {
		echo -1;
	}
?>