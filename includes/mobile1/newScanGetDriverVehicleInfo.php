<?php
	include 'config.php';

	$driver_id= $_POST['driverID'];


	$query = "SELECT U_FName, U_LName, users.V_ID, V_Number, V_Type, V_Plate FROM users INNER JOIN vehicle on users.V_ID = vehicle.V_ID WHERE U_ID ='$driver_id'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
             $row = mysql_fetch_array($result);
             $data = array('driverLName'=>$row['U_LName'], 'driverFName' => $row['U_FName'], 'vehicleNumber' => $row['V_Number'], 'vehiclePlate'=>$row['V_Plate'], 'vehicleType'=>$row['V_Type'], 'driverStatus'=>'Existing');
             echo json_encode($data);
	} else {
             $data = array('driverStatus'=>'NotExisting');
             echo json_encode($data);
	}
?>