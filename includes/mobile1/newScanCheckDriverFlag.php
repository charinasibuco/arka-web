<?php
	include 'config.php';

        $driverID=$_POST['driverID'];
        
	$query = "SELECT * FROM users WHERE U_ID=' $driverID' AND  U_Flag!=''";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
		$row = mysql_fetch_array($result);
		$data = array('flagUserID'=> $row['U_ID'], 'flagPrimaryInfo'=>$row['U_LName'], 'flagSecondaryInfo'=>$row['U_FName'], 'flagColor'=>$row['U_Flag'], 'flagRemarks'=>$row['U_Remarks'] ,'flagStatus'=>'Available'); 
		echo(json_encode($data));
	} else {
		$data = array('flagStatus'=>'NotAvailable');
                echo(json_encode($data));
	}
?>