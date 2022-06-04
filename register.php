<?php include('server.php');

if(!empty($_SESSION['isloggedin'])) {
	header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
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
				<form action="register.php" method="post" class="login100-form validate-form flex-sb flex-w">
					<span class="login100-form-title p-b-32">
						Register
					</span>

					<span class="txt1 p-b-11">
						Nume
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Last name is required">
						<input class="input100" type="text" name="lastname" value="<?php echo $lastname; ?>" required>
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Prenume
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "First name is required">
						<input class="input100" type="text" name="firstname" value="<?php echo $firstname; ?>" required>
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Username
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="username" value="<?php echo $username; ?>" required>
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Parolă
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password_1" required>
						<span class="focus-input100"></span>
					</div>


					<span class="txt1 p-b-11">
						Confirmă Parolă
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password_2" required>
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Email
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Email is required">
						<input class="input100" type="text" name="email" value="<?php echo $email; ?>" required>
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Data nașterii
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Birth date is required">
						<input class="input100" type="text" name="birthdate" value="<?php echo $birthdate; ?>" required>
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						<div>
						<label for="gender">Sex</label>
						<select name="gender">
							<option value="M">M</option>
							<option value="F">F</option>
						</select>
	 					</span>
					</div>

					<span class="txt1 p-b-11">
						Telefon
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Phone number is required">
						<input class="input100" type="text" name="phone" value="<?php echo $phone; ?>" required>
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-b-48">

						<div>
							<a href="contact.php" class="txt3">
								Ai uitat parola?
							</a>
						</div>
						<?php include('errors.php') ?>
					</div>

					<div style="color: #c49b63" class="container-login100-form-btn">
						<input type="hidden" value="true" name="reg_user" />
						<button class="login100-form-btn" type="submit" name="submit">
							Înregistrare
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>

	<script src="js/main.js"></script>

</body>
</html>
