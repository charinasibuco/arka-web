<?php
	include 'config.php';

        $trailerID=$_POST['trailerID'];

	$query = "SELECT * FROM trailer WHERE T_ID='$trailerID' AND  T_Flag!=''";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
		$row = mysql_fetch_array($result);
  $data[] = array('flagPrimaryInfo'=>$row['T_Number']."-Trailer", 'flagSecondaryInfo' =>"", 'flagColor'=>$row['T_Flag'], 'flagRemarks'=>$row['T_Remarks'], 'flagStatus'=>'Available'); 
		echo(json_encode($output));
	} else {
		$data[] = array('flagStatus'=>'NotAvailable'); 
		echo(json_encode($output));
	}
?>