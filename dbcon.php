<?php

	$server = 'localhost:3307';
	$user = 'root';
	$password = '';
	$db = 'emailphp';
	
	$con = mysqli_connect($server, $user, $password, $db);
	
	if($con){
		echo "Connection Established";
	}else{
		echo "Connection not Established";
	}

?>