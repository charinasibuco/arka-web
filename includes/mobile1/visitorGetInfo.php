<?php
	include 'config.php';

        $qr = $_POST['qr'];
        $timeStamp = date("y/m/d : H:i:s", time());

	$query = "SELECT VL_ID, VL_Name, VL_IN, VI_ID FROM visitor_log WHERE VL_OUT='0000-00-000 00:00:00' AND VI_ID='$qr'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
		$userInformation = mysql_fetch_array($result);

                       $data = array('visitorID'=>$userInformation['VL_ID'], 'visitorName'=>$userInformation['VL_Name'], 'visitorStatus'=>'Existing'); 		
	      echo(json_encode($data));
	} else {
		    $data = array('visitorID'=>"", 'visitorName'=>"", 'visitorStatus'=>'NotExisting'); 		
	      echo(json_encode($data));
	}
?>