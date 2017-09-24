<?php
	include 'config.php';

        $vehicleID=$_POST['vehicleID'];

	$query = "SELECT * FROM vehicle WHERE V_ID='$vehicleID' AND  V_Flag!=''";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
	$row = mysql_fetch_array($result);
  $data = array('flagPrimaryInfo'=>$row['V_Number']."-Truck-".$row['V_Plate'], 'flagSecondaryInfo' =>"", 'flagColor'=>$row['V_Flag'], 'flagRemarks'=>$row['V_Remarks'],'flagStatus'=>'Available'); 
		echo(json_encode($data));
	} else {
		$data = array('flagStatus'=>'NotAvailable');
                echo(json_encode($data));
	}
?>