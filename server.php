<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$lastname = "";
$firstname = "";
$birthdate = "";
$gender = "";
$phone = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'inghetatamirunata');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $birthdate = mysqli_real_escape_string($db, $_POST['birthdate']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);

	// echo "req_user";
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM clients WHERE client_username='$username' OR client_email='$email' LIMIT 1;";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  $admin_check_query = "SELECT * FROM administrators WHERE admin_username='$username' OR admin_email='$email' LIMIT 1;";

  $adminResult = mysqli_query($db, $admin_check_query);
  $adminUser = mysqli_fetch_assoc($adminResult);

  if ($user) { // if user exists
    if ($user['client_username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['client_email'] === $email){
      array_push($errors, "Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO clients(`client_id`, `client_firstname`, `client_lastname`, `client_email`, `client_username`, `client_password`, `client_birthdate`, `client_gender`, `client_phone`, `ban_expiry_date`)
  			  VALUES(NULL, '$firstname', '$lastname', '$email', '$username', '$password', '$birthdate', '$gender', $phone, NULL);";

	mail($email ,'Welcome to our family!',"Hello $username",'From: Cup & Cake <roli_szekely@yahoo.com>');

  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['isloggedin'] = "true";
	$_SESSION['user_type'] = "client";

  }
}

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM clients WHERE client_username='$username' AND client_password='$password';";
	$adminQuery = "SELECT * FROM administrators WHERE admin_username='$username' AND admin_password='$password';";
	//echo $adminQuery;
  	$results = mysqli_query($db, $query);
	$adminResults = mysqli_query($db, $adminQuery);

  	if (mysqli_num_rows($adminResults) == 1) {
	  $_SESSION['username'] = $username;

	  $row = mysqli_fetch_assoc($adminResults);
	  $_SESSION['user_id'] = $row['admin_id'];

	  $_SESSION['isloggedin'] = "true";
	  $_SESSION['user_type'] = "admin";
	  header('location: recipes.php');
  } else if(mysqli_num_rows($results) == 1){
	  $_SESSION['username'] = $username;
	  $row = mysqli_fetch_assoc($results);
	  $_SESSION['user_id'] = $row['client_id'];

	  echo $_SESSION['user_id'];
	  $_SESSION['isloggedin'] = "true";
	  $_SESSION['user_type'] = "client";
	  header('location: index.php');
	  //header('location: index.html');
  } else {
		array_push($errors, "Wrong username/password combination");
	}
  }
}

if (isset($_POST['logout'])) {
	session_destroy();
	header('location: index.php');
}
?>
