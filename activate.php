<?php

	session_start();
	
	include 'dbcon.php';
	
	if(isset($_GET['token'])){
		
		$token = $_GET['token'];
		
		$updatequery = "update registration set status= 'active' where token= '$token'";
		
		$query = mysqli_query($con, $updatequery);
		
		if($query){
			if(isset($_SESSION['msg'])){
				$_SESSION['msg'] = "Account updated successfully";
				header('location: index.php');
			}else{
				$_SESSION['msg'] = "You are logged out";
				header('location: index.php');
			}
		}else{
			$_SESSION['msg'] = "Account not updated";
			header('location: regis.php');
		}
		
	}

?>