<?php
	include 'config.php';

         $tenant_id= $_POST['tenant_id'];


	$query = "SELECT TL_ID, T_ID, U_ID, U_FName, U_LName FROM tenant_log INNER JOIN users ON U_ID = T_ID WHERE T_ID = '$tenant_id' AND TL_OUT='0000-00-000 00:00:00'";
	$result = mysql_query($query);

	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_assoc($result)) {
			$output[]=$row;
		}
		echo(json_encode($output));
	} else {

        $query1 = "SELECT U_ID, U_FName, U_LName FROM users WHERE U_ID = '$tenant_id' AND U_Type='Tenant'";
	$result1 = mysql_query($query1);

		if(mysql_num_rows($result1) > 0){
		echo "TENANTFOUND";
	        } else {
                echo "NOTENANT";
	        }
        }
?>