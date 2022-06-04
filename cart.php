<?php
session_start();
include('navbar.php');
include('footer.php');
include('dbconfig.php');

$discount = 0;
if(isset($_POST['apply_voucher'])) {
	if(!empty($_POST['voucher-code'])) {
		$discount_code = $_POST['voucher-code'];
		$sql = "SELECT * FROM discount WHERE discount_code = '" . $discount_code . "'";
		$result = $conn->query($sql);
		if(mysqli_num_rows($result) > 0) {
			$row = $result -> fetch_assoc();
			$discount = $row['discount_amount'];
			$_SESSION['discount_code'] = $discount_code;
		}
	}
}

if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION['shopping_cart'])) {
	foreach($_SESSION['shopping_cart'] as $key => $value) {
		if($_POST["product_code"] == $key){
		unset($_SESSION['shopping_cart'][$key]);
		$status = "<div class='box' style='color:white;'>
		Product is removed from your cart!</div>";
		}
		if(empty($_SESSION['shopping_cart'])) {
			unset($_SESSION["shopping_cart"]);
		}

		}
	}
}

 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Coș | Cup & Cake</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
	<script src="js/store.js" async></script>
  </head>


  <body>
    <?php print_navbar('');?>
    <!-- END nav -->

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Coș</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Coș</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section ftco-cart">


		<form action="checkout.php" method="post">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Produs</th>
						        <th>Preț</th>
						        <th>Cantitate</th>
						        <th>Total</th>
						      </tr>
						    </thead>

								<tbody>

							<?php
							if (isset($_SESSION["shopping_cart"])) {
								$subtotal = 0;
								$delivery = 12;

								if(!isset($_POST['apply_voucher'])) {
									$discount = 0;
								}

								// print_r($_SESSION["shopping_cart"]);
							foreach($_SESSION["shopping_cart"] as &$product) {
								echo "<form method='post' name='remove'>";
							      echo '<tr class="cart-row">';

							      echo '<td class="product-remove">';
										echo '<button type="button" class="btn btn-danger" type="button" style="background-color:transparent; padding: 20px 20px">';
										echo 'Șterge';
												//echo '<span class="icon-close"></span>';
												//echo '<i class="fa fa-close"></i>';
											echo "</button></td>";

							        echo "<td class=\"image-prod\"><div class=\"img\" style=\"background-image:url('" . $product['product_image'] . "');\"></div></td>";

							        echo '<td>';
							        	echo "<h3 class=\"product-name\">" . $product['product_name'] . "</h3>";
							        	echo "<p>" . $product['product_description'] . "</p>";

							        echo '</td>';

							        echo "<td class=\"price\">" . $product['product_price'] . " RON</td>";

							        echo '<td class="quantity">';
							        	echo '<div class="input-group mb-3">';
						             	echo "<input type=\"number\" id=\"quantity\" class=\"product-quantity form-control input-number\" value=" . $product['product_quantity'] . ">";
										// echo "<input type=\"number\" id=\"quantity\" class=\"product-quantity form-control input-number\" value=" . $product['product_quantity'] . ">";
						          	echo '</div>';
						          echo '</td>';

								  $price = $product['product_price'];
								  $qty = $product['product_quantity'];

							        echo "<td class=\"total\">" . number_format(($price*$qty), 2, '.', ",") . " RON</td>";


							      echo '</tr>';
							  echo '</form>';

							  $subtotal = $subtotal + ($qty*$price);
					  	  }

						  if($subtotal > 50) {
							  $delivery = 0;
						  }
						  $total = $subtotal + $delivery - $discount;

					  } else {
						  echo "<h3> Your cart is empty </h3>";
					  }
					  echo '</tbody>';
						echo '</table>';


						if (isset($_SESSION["shopping_cart"])) {
					  echo '</div>';
					echo '</div>';
				  echo '</div>';
				  echo '<div class="row justify-content-end">';

				// Voucher
				echo '<div class="col col-lg-3 col-md-4 mt-5 cart-wrap ftco-animate">';
						echo '<div class="cart-total mb-3">';
							echo '<h3>Cod voucher</h3>';
							echo '<form action="cart.php" method="post">';
								echo '<div class="input-group mb-3">';
									echo '<input type="text" name="voucher-code" class="form-control">';
								echo '</div>';
								echo '<input type="submit" name="apply_voucher" value="Aplică" class="btn py-3 px-4 btn-primary voucher-button">';
								echo '</form>';
							echo '</div>';
						echo '</div>';

			// Total cos
					echo '<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">';
					  echo '<div class="cart-total mb-3">';
						echo '<h3>Total coș</h3>';
						echo '<p class="d-flex" >';
						  echo '<span>Subtotal</span>';
						  echo "<span id=\"subtotal-price\">" . number_format($subtotal, 2, '.', ",") . " RON</span>";
						echo '</p>';
						echo '<p class="d-flex" >';
						  echo '<span>Livrare</span>';
						  echo "<span id=\"delivery-price\">". number_format($delivery, 2, '.', ",") . " RON</span>";
						echo '</p>';
						echo '<p class="d-flex" >';
						  echo '<span>Discount</span>';
						  echo "<span id=\"discout-price\">". number_format($discount, 2, '.', ",") . " RON</span>";
						echo '</p>';
						echo '<hr>';
						echo '<p class="d-flex total-price">';
						  echo '<span>Total</span>';
						  echo "<span id=\"total-price\">" . number_format($total, 2, '.', ",") . " RON</span>";
						echo '</p>';
					  echo '</div>';
					  echo '  <input type="submit" name="" value="Către Checkout" class="btn py-3 px-4 btn-primary checkout-button">';
					  }

						  ?>



    			</div>
    		</div>
			</div>
		</form>

		</section>



<!-- Footer -->
<?php print_footer() ?>




  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="js/main.js"></script>


  </body>
</html>
