<?php
	include 'config.php';

        $tenant_id=$_POST['tenant_id'];

	$query = "SELECT * FROM users WHERE U_ID='$tenant_id' AND U_Type ='Tenant'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_assoc($result)) {
			$output[]=$row;
		}
		echo(json_encode($output));
	} else {
		echo 0;
	}
?>