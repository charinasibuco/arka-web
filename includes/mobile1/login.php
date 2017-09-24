<?php
	include 'config.php';

	$email = $_POST['email'];
	$password = md5($_POST['password']);


	$query = "SELECT * FROM users WHERE U_Email = '$email'";
	$result = mysql_query($query) or die("Unable to verify user because : " . mysql_error());

    if(mysql_num_rows($result) > 0){
		
		$userInformation = mysql_fetch_array($result);
		
		if( $password == $userInformation['U_Password']){ 
			$data = array('userID'=>$userInformation['U_ID'], 'userType'=>$userInformation['U_Type'], 'userStatus'=>'Available'); 
		        echo(json_encode($data));
		} else { 
                      $data = array('userID'=>'0', 'userType'=>'0', 'userStatus'=>'WrongPassword'); 
		      echo(json_encode($data));
               }
        
	} else { 
                 $data = array('userID'=>'0', 'userType'=>'0', 'userStatus'=>'WrongEmail'); 
                 echo(json_encode($data));
    }
?>