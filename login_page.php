<?php
include("header.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<title>Sign in</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="style2.css">
</head>
<body>
	<div class="main">
		<div class="container">
			<div class="login_div">
				<h4>SIGN IN</h4>
				<form action="auth.php" method="post" class="login_form">

				  <div class="mb-3">
				  	<label class="form-label">Email address</label>
		            <input type="email" name="login" class="form-control" id="exampleInputEmail1">
				  </div>

				  <div class="mb-3">
				    <label class="form-label">Password</label>
				    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
				  </div>

				  <button type="submit" class="btn btn-warning">Sign in</button>

				</form>
				<div class="wrong">
					<?php
						if(isset($_GET['empty'])){
							echo "Please full all fields!"."<br>";
						}
						else if(isset($_GET['noUser'])){
							echo "Your login or password is wrong, try again"."<br>";
						}
					?>
				</div>
			</div>
			<div class="reg_div">
				<h4>REGISTRATION</h4>
				<form action="success_reg.php" method="post" class="reg_form">
					<div class="mb-3">
					  	<label class="form-label">Fullname</label>
			            <input type="text" name="rg_fullname" class="form-control" id="exampleInputEmail1">
					</div>

					<div class="mb-3">
					  	<label class="form-label">Login</label>
			            <input type="email" name="rg_login" class="form-control" id="exampleInputEmail1">
					</div>

					<div class="mb-3">
					  	<label class="form-label">Password</label>
			            <input type="password" name="rg_pass" class="form-control" id="exampleInputEmail1">
					</div>

					<div class="mb-3">
					  	<label class="form-label">Confirm Password</label>
			            <input type="password" name="confirm_password" class="form-control" id="exampleInputEmail1">
					</div>

		            <button type="submit" class="btn btn-warning">Register</button>
			    </form>
			    <div class="wrong">
					<?php
						if(isset($_GET['fillAll'])){
							echo "Please full all fields!"."<br>";
						}
						else if(isset($_GET['password'])){
							echo "Confirm your password properly!"."<br>";
						}
					?>
				</div>
			</div>
		</div>
	</div>]
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>