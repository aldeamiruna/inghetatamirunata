<?php
$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "inghetatamirunata";

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

		$error = "";
	if(!empty($_POST['comment'])){
		if(empty($_POST['message'])) {
			$error = "Comment cannot be empty";
		} else {

			$recipe_id = $_POST['recipe_id'];
			$client_id = $_SESSION['user_id'];
			$message = $_POST['message'];
			$user_type = $_SESSION['user_type'];

			$sq_insert_Comment = "INSERT INTO comments(`comment_id`, `client_id`, `message`, `date`, `recipe_id`) VALUES (DEFAULT, $client_id,'$message',DEFAULT,$recipe_id);";


			// DON'T DELETE
			 $conn->query($sq_insert_Comment);
		}
	}

		function get_username($client_id, $conn) {

				$sql = "SELECT client_username FROM clients WHERE client_id =" . $client_id . ";";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();
				//echo $sql;
				return $row['client_username'];
			}



?>
