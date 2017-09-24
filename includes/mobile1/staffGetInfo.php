<?php
	include 'config.php';

    $staff_id= $_POST['staff_id'];


	$query = "SELECT SL_ID, S_ID, U_ID, U_FName, U_LName FROM staff_log INNER JOIN users ON U_ID = S_ID WHERE S_ID = '$staff_id' AND SL_OUT='0000-00-000 00:00:00'";
	$result = mysql_query($query);

	if(mysql_num_rows($result) > 0){
            $staffInfo = mysql_fetch_array($result);
            $data = array('staffLogID'=>$staffInfo['SL_ID'], 'staffID'=>$staffInfo['U_ID'], 'staffLastName'=>$staffInfo['U_LName'], 'staffFirstName'=>$staffInfo['U_FName'], 'staffStatus'=>'Available'); 
		echo(json_encode($data));
	} else {

        $query1 = "SELECT U_ID, U_FName, U_LName FROM users WHERE U_ID = '$staff_id' AND U_Type='Staff'";
	$result1 = mysql_query($query1);

		if(mysql_num_rows($result1) > 0) {
		$data = array('staffLogID'=>'0', 'staffID'=>'0', 'staffLastName'=>'0', 'staffFirstName'=>'0', 'staffStatus'=>'Existing'); 
		echo(json_encode($data));
	        } else {
                $data = array('staffLogID'=>'0', 'staffID'=>'0', 'staffLastName'=>'0', 'staffFirstName'=>'0', 'staffStatus'=>'NotExisting'); 
		echo(json_encode($data));
	        }
        }
?>