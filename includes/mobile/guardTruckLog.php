<?php
	include 'config.php';

	$query = "SELECT gate_log.U_ID, U_Fname,U_LName,gate_log.V_ID,V_Type,V_Number, V_Plate,gate_log.T_ID, T_Number,GL_Serial, MAX(GL_Date) as GL_Date FROM gate_log INNER JOIN users ON users.U_ID = gate_log.U_ID INNER JOIN vehicle ON vehicle.V_ID=gate_log.V_ID LEFT JOIN trailer ON trailer.T_ID=gate_log.T_ID WHERE GL_Status='OUT' GROUP BY U_ID ORDER BY GL_Date DESC";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_assoc($result)) {
			$output[]=$row;
		}
		echo(json_encode($output));
	} else {
		echo -1;
	}
?>