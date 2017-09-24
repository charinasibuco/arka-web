<?php
	include 'config.php';

        $trailerID= $_POST['trailerID'];

	$query = "SELECT gate_log.U_ID, gate_log.T_ID, GL_Status FROM gate_log INNER JOIN trailer ON trailer.T_ID = gate_log.T_ID where gate_log.T_ID = '$trailerID' ORDER BY GL_Date DESC";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

        if(mysql_num_rows($result) > 0){
             $logstatus = mysql_fetch_array($result);
             $data = array('trailerLogStatus'=>$logstatus['GL_Status'], 'trailerID' => $logstatus['T_ID'], 'trailerDriver' => $logstatus['U_ID']);
             echo json_encode($data);
	} else { 
             $data = array('trailerLogStatus'=>'NotAvailable', 'trailerID' => '0', 'trailerDriver' =>'0');
             echo json_encode($data);
    }
?>