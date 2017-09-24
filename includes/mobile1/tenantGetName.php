<?php
	include 'config.php';

        $tenant_id=$_POST['tenant_id'];

	$query = "SELECT * FROM users WHERE U_ID='$tenant_id' AND U_Type ='Tenant'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
		$tenantInfo = mysql_fetch_array($result);
		$data = array('tenantID'=>$tenantInfo['U_ID'], 'tenantLastName'=>$tenantInfo['U_LName'], 'tenantFirstName'=>$tenantInfo['U_FName'], 'tenantStatus'=>'Available'); 
		echo(json_encode($data));
	} else {
		$data = array('tenantID'=>'0', 'tenantLastName'=>'0', 'tenantFirstName'=>'0', 'tenantStatus'=>'NotAvailable'); 
		echo(json_encode($data));
	}

?>