<?php

	session_start();

?>

<!doctype html>
<html lang="en">

	<head>
  
		<title>SignUp</title>
		
		<?php include 'link/links.php'; ?>
		
		<?php include 'css/style.php'; ?>

		<link rel="stylesheet" type="text/css" href="bootstrap.css">
		
	</head>
	
	<body>
	
		<?php
		
			include 'dbcon.php';
		
			if(isset($_POST['submit'])){
				
				$username = mysqli_real_escape_string($con, $_POST['username']);
				$email = mysqli_real_escape_string($con, $_POST['email']);
				$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
				$password = mysqli_real_escape_string($con, $_POST['password']);
				$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
				
				$pass = password_hash($password, PASSWORD_BCRYPT);
				$cpass = password_hash($cpassword, PASSWORD_BCRYPT);
				
				$token = bin2hex(random_bytes(15));
				
				$emailquery = "select * from registration where email='$email'";
				$query = mysqli_query($con, $emailquery);
				
				$emailcount = mysqli_num_rows($query);
				
				if($emailcount > 0){
					?>
						<script>
							alert("Email already exists");
						</script>
					<?php
				}else{
					if($password === $cpassword){
						$insertquery = "INSERT INTO registration(username, email, mobile, password, cpassword, token, status) VALUES ('$username', '$email', '$mobile', '$pass', '$cpass', '$token', 'inactive')";
						
						$iquery = mysqli_query($con, $insertquery);
						
						if($iquery){
							
							$subject = "Email Activation";
							$body = "Hi, $username. Click here to activate your account
							http://localhost:8080/1emailverifregistr/activate.php?token=$token";
							$sender_email = "From: arshh910@gmail.com";
							
							if(mail($email, $subject, $body, $sender_email)){
								$_SESSION['msg'] = "check you mail to activate your account $email";
								header('location: index.php');
							}else{
								echo "Email sending failed...";
							}
						}else{
							?>
								<script>
									alert("Not Inserted");
								</script>
							<?php
						}
					}else{
						?>
							<script>
								alert("Password doesn't matches");
							</script>
						<?php
					}
				}
			}
		
		?>
	
		<div class="card bg-light">
		
		<article class="card-body mx-auto" style="max-width: 400px;">
	
			<h4 class="card-title mt-3 text-center">Create Account</h4>
		
			<p class="text-center">Get started with your free account</p>
			
			<p>
			
				<a href="#" class="btn btn-block btn-gmail bg-danger text-white"><i class="fa fa-google pr-2"></i>Login via Gmail</a>
				
				<a href="#" class="btn btn-block btn-facebook bg-primary text-white"><i class="fa fa-facebook-f pr-2"></i>Login via facebook</a>
			
			</p>
			
			<p class="divider-text">
			
				<span class="bg-light">OR</span>
			
			</p>
			
		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
					
			<div class="form-group input-group">
			
				<div class="input-group-prepend">
				
					<span class="input-group-text"><i class="fa fa-user"></i></span>
				
				</div>
			
				<input type="text" class="form-control" name="username" placeholder="Full Name" required autocomplete="off">
			
			</div>
			
			<div class="form-group input-group">
			
				<div class="input-group-prepend">
				
					<span class="input-group-text"><i class="fa fa-envelope"></i></span>
				
				</div>
				
				<input type="email" class="form-control" name="email" placeholder="Email Address" required autocomplete="off">
			
			</div>
			
			<div class="form-group input-group">
			
				<div class="input-group-prepend">
				
					<span class="input-group-text"><i class="fa fa-phone"></i></span>
				
				</div>
			
				<input type="number" class="form-control" name="mobile" placeholder="Phone number" required autocomplete="off">
			
			</div>
			
			<div class="form-group input-group">
			
				<div class="input-group-prepend">
				
					<span class="input-group-text"><i class="fa fa-lock"></i></span>
				
				</div>
			
				<input type="password" class="form-control" name="password" placeholder="Create password" required autocomplete="off">
			
			</div>
			
			<div class="form-group input-group">
			
				<div class="input-group-prepend">
				
					<span class="input-group-text"><i class="fa fa-lock"></i></span>
				
				</div>
			
				<input type="password" class="form-control" name="cpassword" placeholder="Repeat password" required autocomplete="off">
			
			</div>
			
			<div class="form-group">
			
				<button type="submit" class="btn btn-block btn-primary mb-3" name="submit">Create Account</button>
				
			</div>
				
		</form>
		
		<p class="text-center">Have an account?<a href="index.php" class="p-2">Login</a></p>
		
		</article>
		
		</div>
	
	</body>
	
</html>