<?php

	session_start();
	
	ob_start();

?>

<!doctype html>
<html lang="en">

	<head>
  
		<title>Login</title>
		
		<?php include 'link/links.php'; ?>
		
		<?php include 'css/style.php'; ?>
		
	</head>
	
	<body>
	
		<?php
		
			include 'dbcon.php';
		
			if(isset($_POST['submit'])){
				
				$email = mysqli_real_escape_string($con, $_POST['email']);
				$password = mysqli_real_escape_string($con, $_POST['password']);
				
				$email_search = "select * from registration where email='$email' and status='active' ";
				$query = mysqli_query($con, $email_search);
				
				$email_count = mysqli_num_rows($query);
				
				if($email_count){
					$email_pass = mysqli_fetch_assoc($query);
					
					$db_pass = $email_pass['password'];
					
					$pass_decode = password_verify($password, $db_pass);
					
					if($pass_decode){
						if(isset($_POST['rememberme'])){
							setcookie('emailcookie', $email, time()+86400);
							setcookie('passwordcookie', $password, time()+86400);
							?>
								<script>
									alert("Login Successfully");
									location.replace("home.php");
								</script>
							<?php
						}else{
							?>
								<script>
									alert("Login Successfully");
									location.replace("home.php");
								</script>
							<?php
						}
					}else{
						?>
							<script>
								alert("Password Incorrect");
							</script>
						<?php
					}
				}else{
					?>
						<script>
							alert("Invalid Email");
						</script>
					<?php
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
			
			<div>
			
				<p class="bg-success text-white px-4">
				
					<?php 
					
						if(isset($_SESSION['msg'])){
							echo $_SESSION['msg'];
						}else{
							echo $_SESSION['msg'] = "You are logged out. Please login again.";
						}
					
					?>
				
				</p>
			
			</div>
			
		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
			
			<div class="form-group input-group">
			
				<div class="input-group-prepend">
				
					<span class="input-group-text"><i class="fa fa-envelope"></i></span>
				
				</div>
				
				<input type="email" class="form-control" name="email" placeholder="Email Address" 
				
				value="<?php 

							if(isset($_COOKIE['emailcookie'])){
								echo $_COOKIE['emailcookie'];	
							}
				
						?>" required autocomplete="off">
			
			</div>
			
			<div class="form-group input-group">
			
				<div class="input-group-prepend">
				
					<span class="input-group-text"><i class="fa fa-lock"></i></span>
				
				</div>
			
				<input type="password" class="form-control" name="password" placeholder="password" 
				
				value="<?php 

							if(isset($_COOKIE['passwordcookie'])){
								echo $_COOKIE['passwordcookie'];	
							}
				
						?>" required autocomplete="off">
			
			</div>
			
			<div class="form-group">
			
				<input type="checkbox"  name="rememberme"> Remember Me
			
			</div>
			
			<div class="form-group">
			
				<button type="submit" class="btn btn-block btn-primary mb-3" name="submit">Login Now</button>
				
			</div>
			
			<p class="text-center">Forgot Your password No Worry?<a href="recover_email.php" class="p-2">Click Here</a></p>
			<p class="text-center">Don't Have an account?<a href="regis.php" class="p-2">SignUp Here</a></p>
				
		</form>
		
		</article>
		
		</div>
	
	</body>
	
</html>