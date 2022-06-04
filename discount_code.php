<?php

echo createCode('20');

function createCode($discount) {
	$dbServerName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "cup_and_cake";

    $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);
	$discount_code = '';
	$permitted_chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$succeed = false;

	while(!$succeed) {
		$discount_code = substr(str_shuffle($permitted_chars), 0, 10).$discount;
		$sql = "SELECT discount_code from discount WHERE discount_code = '" . $discount_code . "'";

		if(!mysqli_fetch_assoc($conn->query($sql))) {
			$succeed = true;
		}
	}

	$sql = "INSERT INTO `discount`(`discount_code`, `discount_amount`)
	VALUES ('$discount_code',$discount)";
	$conn->query($sql);

	 return $discount_code;
}
 ?>
