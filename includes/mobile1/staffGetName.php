<?php
	include 'config.php';

    $staff_id=$_POST['staff_id'];

	$query = "SELECT * FROM users WHERE U_ID='$staff_id' AND U_Type ='Staff'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
		$staffInfo = mysql_fetch_array($result);
		$data = array('staffID'=>$staffInfo['U_ID'], 'staffLastName'=>$staffInfo['U_LName'], 'staffFirstName'=>$staffInfo['U_FName'], 'staffStatus'=>'Available'); 
		echo(json_encode($data));
	} else {
		$data = array('staffID'=>'0', 'staffLastName'=>'0', 'staffFirstName'=>'0', 'staffStatus'=>'NotAvailable'); 
		echo(json_encode($data));
	}
?>