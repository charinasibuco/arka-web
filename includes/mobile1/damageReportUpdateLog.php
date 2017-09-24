<?php
	include 'config.php';

	$gateLogID = $_POST['gateLogID'];
	$truckDamage = $_POST['truckDamage'];
        $containerDamage = $_POST['containerDamage'];
        $trailerDamage = $_POST['trailerDamage'];
        $remarks = $_POST['remarks'];

	$query = "UPDATE gate_log SET GL_TruckDamage='$truckDamage', GL_ContainerDamage='$containerDamage', GL_TrailerDamage='$trailerDamage', GL_Remarks='$remarks' WHERE GL_ID='$gateLogID'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

        if ($result) {
            $data = array('damageStatus'=>'Success'); 
	    echo(json_encode($data));
        } else { 
            $data = array('damageStatus'=>'Failed'); 
	    echo(json_encode($data));
        }
?>