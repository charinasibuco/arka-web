<?php
	include 'config.php';

	$query = "SELECT * FROM vehicle WHERE V_Flag!=''";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_assoc($result)) {
                   $data[] = array('flagPrimaryInfo'=>$row['V_Number']."-Truck-".$row['V_Plate'], 'flagSecondaryInfo' =>"", 'flagColor'=>$row['V_Flag'], 'flagRemarks'=>$row['V_Remarks']); 
                       }
		echo(json_encode($data));
	} else {
		echo -1;
	}
?>