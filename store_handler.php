<?php
session_start();
$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "inghetatamirunata";

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);


	// from store.js a POST request is sent with "remove=true" to delete a product from the cart
	if(!empty($_POST['remove'])) {
		$product_name = $_POST['product_name'];
		$product_code = getProductCode($product_name);

		unset($_SESSION['shopping_cart'][$product_code]);

	}

	// from store.js a POST request is sent with "change=true" to change the quantity of a product from the cart
	if(!empty($_POST['change'])) {
		$product_name = $_POST['product_name'];
		$product_quantity = $_POST['product_quantity'];
		$product_code = getProductCode($product_name);

		$_SESSION['shopping_cart'][$product_code]['product_quantity'] = $product_quantity;

		print_r($_SESSION['shopping_cart']);

	}

	// from store.js a POST request is sent with "checkout=true" to go to checkout, it sends the modified prices from cart.php
	if(!empty($_POST['checkout'])) {
		if($_POST['checkout']) {
			$delivery = $_POST['delivery'];
			$discount = $_POST['discount'];
			$subTotal = $_POST['subTotal'];
			$cartTotal = $_POST['cartTotal'];


			$user_id = $_SESSION['user_id'];
			$_SESSION['cart_prices'] =
			$arrayName = array('delivery' => $delivery,
								'discount' => $discount,
								'subTotal' => $subTotal,
								'cartTotal' => $cartTotal);
		}

	}



	function getProductId($product_code) {
		$dbServerName = "localhost";
		$dbUserName = "root";
		$dbPassword = "";
		$dbName = "inghetatamirunata";

		$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

		$sql = "SELECT `product_id` FROM `products` WHERE `product_code`='" . $product_code .  "'";

		$result = mysqli_query($conn, $sql);
		$row=$result->fetch_assoc();

		return $row['product_id'];
	}

	function getProductCode($product_name) {
		$dbServerName = "localhost";
		$dbUserName = "root";
		$dbPassword = "";
		$dbName = "inghetatamirunata";

		$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

		$sql = "SELECT `product_code` FROM `products` WHERE `product_name`='" . $product_name .  "'";

		$result = mysqli_query($conn, $sql);
		$row=$result->fetch_assoc();

 		return $row['product_code'];
	}
 ?>
