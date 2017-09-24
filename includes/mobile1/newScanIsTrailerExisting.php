<?php
	include 'config.php';

        $trailerID=$_POST['trailerID'];

	$query = "SELECT * FROM trailer WHERE T_ID='$trailerID'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

	if(mysql_num_rows($result) > 0){
	     $data = array('trailerStatus'=>'Existing'); 
             echo(json_encode($data));
	} else {
	     $data = array('trailerStatus'=>'NotExisting'); 
             echo(json_encode($data));
	}
?>