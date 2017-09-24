<?php
	include 'config.php';

	$email = $_POST['email'];
	$password = md5($_POST['password']);


	$query = "SELECT * FROM users WHERE U_Email = '$email'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

    if(mysql_num_rows($result) > 0){
		
		$userInformation = mysql_fetch_array($result);
		
		if( $password == $userInformation['U_Password']){ 
			$data[] = array('U_ID'=>$userInformation['U_ID'], 'U_Type'=>$userInformation['U_Type']); 
		
		        echo(json_encode($data));
		} else { 
                      echo "0";
               }
        
	} else { 
        echo "-1"; 
    }
?>