<?php

	$host = 'localhost'; 	 
	$rootuser = 'ttms_database';
	$password = 'shadab147456!'; 	
	$db = 'ttms_database'; 
	

	$conn = mysql_connect($host, $rootuser, $password) or die("Could not connect to Database");
	mysql_select_db($db, $conn);
	
       date_default_timezone_set('America/New_York');
?>