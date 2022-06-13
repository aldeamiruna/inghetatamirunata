<?php

    $dbServerName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "inghetatamirunata";

    $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
	session_start();

if(!empty($_POST['reserve'])) {
	$reservationSucceed = false;
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $reservation_table = $_POST['reservation_table'];
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $phone = $_POST['phone'];
    $comment = $_POST['comment'];

	$reservation_array = preg_split("/\//", $reservation_date);
	// print_r($reservation_array);
	$reservation_date = $reservation_array[2];
	$reservation_date = $reservation_date . "-" . $reservation_array[0];
	$reservation_date = $reservation_date . "-" . $reservation_array[1];
	//echo $reservation_array[1];
	// $reservation_date = $reservation_array[2];
	// $reservation_date = $reservation_date . "-" . $reservation_array[0] . "-" $reservation_array[1];

	$sql_reservation = "SELECT * FROM reservations
		WHERE res_table = '$reservation_table'
		AND res_date = '$reservation_date'
		AND res_time = '$reservation_time'";

		$tables = array('masa 1', 'masa 2', 'masa 3', 'masa 4');
		$times = array('10:00 - 12:00','13:00 - 15:00','16:00 - 18:00','19:00 - 21:00','22:00 - 00:00');

		$pickedTableIndex = array_search($reservation_table, $tables, true);
		$pickedTimeIndex = array_search($reservation_time, $times, true);

		echo $pickedTableIndex;
		echo $pickedTimeIndex;

		unset($tables[$pickedTableIndex]);
		unset($times[$pickedTimeIndex]);
		//echo $sql_reservation;

		$result_reservation = $conn->query($sql_reservation);
		$tableEmpty = checkTable($conn, $reservation_table, $reservation_date, $reservation_time);
		echo $tableEmpty;
		if(!checkTable($conn, $reservation_table, $reservation_date, $reservation_time)) {
			$foundSuggestion = false;

				while(!$foundSuggestion) {
					$date = $reservation_date;

					foreach($times as $time) {
						foreach($tables as $table) {
							if(checkTable($conn, $table, $time, $date)) {

								$_SESSION['reservation_status'] = "Masa este ocupată, vă sugerăm " . $table . " la intervalul " . $time . " în data de " . date("F d, Y", strtotime($date)) . ". Sau alegeți altă masă.";
								$foundSuggestion = true;
								break 3;
							}
						}
					}
					$date = strtotime('+1 days', strtotime($date));
					$date = date("Y-m-d", $date);
				}
		} else {
		    $sql_insert_reservation = "INSERT INTO
		    `reservations`(
		    `reservation_id`,
		    `res_firstname`,
		    `res_lastname`,
		    `res_table`,
		    `res_date`,
		    `res_time`,
		    `res_phone`,
		    `res_message`)
		    VALUES (
		    NULL,
		    '$lastname',
		    '$firstname',
		    '$reservation_table',
		    '$reservation_date',
		    '$reservation_time',
		    '$phone',
		    '$comment');";


		    if ($conn->query($sql_insert_reservation) === TRUE) {
			  $_SESSION['reservation_status'] = "Rezervare efectuată cu succes!";
		    } else {
		      // echo "Error: " . $sql_insert_reservation . "<br>" . $conn->error;
		    }
		}


  $conn->close();
	header('location: index.php');
  }

  function checkTable($conn, $reservation_table, $reservation_date, $reservation_time) {
	  $sql_reservation = "SELECT * FROM reservations
  		WHERE res_table = '$reservation_table'
  		AND res_date = '$reservation_date'
  		AND res_time = '$reservation_time'";

		$retVal = false;
		// echo $sql_reservation;
  	$result_reservation = $conn->query($sql_reservation);
	//print_r($result_reservation);
  		if(mysqli_num_rows($result_reservation) > 0) {
			return false;
		} else {
			return true;
		}
  }

 ?>
