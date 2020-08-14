<?php

	session_start();
	
	ob_start();

?>

<!doctype html>
<html lang="en">

	<head>
  
		<title>Reset Password</title>
		
		<?php include 'link/links.php'; ?>
		
		<?php include 'css/style.php'; ?>

		
		
	</head>
	
	<body>
	
		<?php
		
			include 'dbcon.php';
		
			if(isset($_POST['submit'])){
				
				if(isset($_GET['token'])){
					
						$token = $_GET['token'];
					
					$newpassword = mysqli_real_escape_string($con, $_POST['password']);
					$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
					
					$pass = password_hash($newpassword, PASSWORD_BCRYPT);
					$cpass = password_hash($cpassword, PASSWORD_BCRYPT);
					
					if($newpassword === $cpassword){
						
						$updatequery = "update registration set password='$pass' where token='$token' ";
					
						$iquery = mysqli_query($con, $updatequery);
						
						if($iquery){
							$_SESSION['msg'] = "Your password has been updated";
							header('location:index.php');
						}else{
							$_SESSION['passmsg'] = "Your password is not updated";
							header('location:reset_password.php');	
						}
					}else{
						$_SESSION['passmsg'] = "Your password is not matching";	
					}
				}else{
					echo "No token found";
				}
			}
		
		?>
	
		<div class="card bg-light">
		
		<article class="card-body mx-auto" style="max-width: 400px;">
	
			<h4 class="card-title mt-3 text-center">Reset Password</h4>
		
			<p class="text-center">Get started with your free account</p>
			
			<p class="bg-info text-white px-5">
				<?php 
					if(isset($_SESSION['passmsg'])){
						echo $_SESSION['passmsg'];
					}else{
						echo $_SESSION['passmsg'] = "";
					}
				?>
			</p>
			
		<form action="" method="POST">
			
			<div class="form-group input-group">
			
				<div class="input-group-prepend">
				
					<span class="input-group-text"><i class="fa fa-lock"></i></span>
				
				</div>
			
				<input type="password" class="form-control" name="password" placeholder="New password"  value="" required autocomplete="off">
			
			</div>
			
			<div class="form-group input-group">
			
				<div class="input-group-prepend">
				
					<span class="input-group-text"><i class="fa fa-lock"></i></span>
				
				</div>
			
				<input type="password" class="form-control" name="cpassword" placeholder="Confirm password" required autocomplete="off">
			
			</div>
			
			<div class="form-group">
			
				<button type="submit" class="btn btn-block btn-primary mb-3" name="submit">Update Password</button>
				
			</div>
				
		</form>
		
		<p class="text-center">Have an account?<a href="index.php" class="p-2">Login</a></p>
		
		</article>
		
		</div>
	
	</body>
	
</html>