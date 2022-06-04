<?php
include('server.php');
if(!empty($_SESSION['isloggedin'])) {
	header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | Cup 'n' Cake</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/login-util.css">
	<link rel="stylesheet" type="text/css" href="css/login-style.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div style="background-color: #131313" class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form action="login.php" method="post" class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-32">
						Account Login
					</span>

					<span class="txt1 p-b-11">
						Username
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="username" >
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password" >
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-48">

						<div>
							<a href="register.php" class="txt3">
								Register
							</a>
						</div>

						<?php include('errors.php') ?>
					</div>

					<div class="container-login100-form-btn">
						<input type="hidden" value="true" name="submitted" />
						<button class="login100-form-btn" type="submit" name="login_user">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>

</body>
</html>
