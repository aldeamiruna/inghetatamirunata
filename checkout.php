<?php
include('navbar.php');
include('footer.php');
include('dbconfig.php');
include('store_handler.php');
include('categories.php');

if($_SESSION['user_type'] != 'admin' ) {
	if(!empty($_SESSION['shopping_cart'])) {

		$subTotal = 0;
		$delivery = 0;
		$discount = 0;

		foreach($_SESSION['shopping_cart'] as $key => $value) {
			// $product_id = getProductId($key);
			$product_quantity = $value['product_quantity'];
			$product_price = $value['product_price'];

			$subTotal = $subTotal + $product_quantity * $product_price;
		}

		if(!empty($_SESSION['cart_prices']['discount'])) {
			$discount = $_SESSION['cart_prices']['discount'];
		}
		if($subTotal < 50) {
			$delivery = 12;
		} else {
			$delivery = 0;
		}

		$cartTotal = $subTotal + $delivery - $discount;

		$_SESSION['cart_prices']['delivery'] = $delivery;
		$_SESSION['cart_prices']['discount'] = $discount;
		$_SESSION['cart_prices']['subTotal'] = $subTotal;
		$_SESSION['cart_prices']['cartTotal'] = $cartTotal;

	}
}

if(!empty($_POST['createOrder'])) {
	$county = $_POST['county'];
	$city = $_POST['city'];
	$street = $_POST['street'];
	$house_number = $_POST['house_number'];
	$zipcode = $_POST['zipcode'];

	$sql_insert = "INSERT INTO `address`(`address_id`, `county`, `city`, `street`, `house_number`, `zipcode`)
	VALUES (DEFAULT,'$county','$city','$street','$house_number','$zipcode')";
	mysqli_query($conn, $sql_insert);
	$sqlMaxAddress = "SELECT MAX(address_id) as addr FROM address";
	$result = mysqli_query($conn, $sqlMaxAddress);
	$row = $result -> fetch_assoc();
	$address = $row['addr'];
	// echo $row['addr'];

	$user_id = $_SESSION['user_id'];
	$discount = $_SESSION['cart_prices']['discount'];
	$delivery = $_SESSION['cart_prices']['delivery'];
	$subtotal = $_SESSION['cart_prices']['subTotal'];
	$total = $_SESSION['cart_prices']['cartTotal'];

	$sqlInsertOrder = "INSERT INTO `orders`(`order_id`, `client_id`, `date`, `order_discount`, `order_delivery`, `order_subtotal`, `order_total`, `address_id`) VALUES
	(DEFAULT,
	$user_id,
	DEFAULT,
	$discount ,
	$delivery ,
	$subtotal ,
	$total ,
	$address)";

	if(isset($_SESSION['discount_code'])) {
		$discount_code = $_SESSION['discount_code'];
		$sql_delete = "DELETE FROM `discount` WHERE discount_code = '" . $discount_code . "'";
		mysqli_query($conn, $sql_delete);
	}

	// echo $sqlInsertOrder;
	// echo $sql;

	mysqli_query($conn, $sqlInsertOrder);

	$sqlMaxOrder = "SELECT MAX(order_id) as order_id FROM orders";
	$result = mysqli_query($conn, $sqlMaxOrder);
	$rowOrder = $result -> fetch_assoc();
	$order_id = $rowOrder['order_id'];
	if(!empty($_SESSION['shopping_cart'])) {
		foreach($_SESSION['shopping_cart'] as $key => $value) {
			// $product_id = getProductId($key);
			$product_id = getProductId($value['product_code']);
			$product_quantity = $value['product_quantity'];

			$sql = "INSERT INTO `orders_products`(`order_id`, `product_id`, `quantity`)
			VALUES ($order_id,$product_id,$product_quantity)";
			mysqli_query($conn, $sql);
			unset($_SESSION['shopping_cart']);
			unset($_SESSION['cart_prices']);
			unset($_SESSION['discount_code']);
		}
	}

}

$fill = false;
if(!empty('checkout')) {
	$user_id = $_SESSION['user_id'];
	$sql = "SELECT * FROM clients WHERE client_id=" . $user_id . ";";
	// echo $sql;
	$reuslt = mysqli_query($conn, $sql);
	$row = $reuslt->fetch_assoc();
	$fill = true;
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Checkout | Cup & Cake</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

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
  </head>


  <body>
	  <?php print_navbar('');?>
    <!-- END nav -->

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(images/bg_7.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Checkout</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Checkout</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-xl-8 ftco-animate">
						<form action="checkout.php" method="post" class="billing-form ftco-bg-dark p-3 p-md-5">
							<h3 class="mb-4 billing-heading">Detalii Comandă</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-6">
	                <div class="form-group">
	                	<label for="firstname">Nume</label>

						<input type="text" id="client_lastname" class="form-control"
						<?php
						if($fill) {
							echo "placeholder=\"" . $row['client_lastname']. "\"";
						}

					  ?>
					 	readonly>
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="lastname">Prenume</label>

						<input type="text" id="" class="form-control"
						<?php
						if($fill) {
							echo "placeholder=\"" . $row['client_firstname']. "\"";
						}
					  ?>
					 readonly>
					</div>
                </div>


                <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
		            		<label for="country">Oraș *</label>
		            		<div class="select-wrap">
		                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
		                  <select name="city" id="" class="form-control">
		                  	<option value="Brașov">Brașov</option>
		                    <option value="Săcele">Săcele</option>
		                    <option value="Râșnov">Râșnov</option>
		                    <option value="Rupea">Rupea</option>
		                    <option value="Prejmer">Prejmer</option>
		                    <option value="Codlea">Codlea</option>
		                  </select>
		                </div>
		            	</div>
		            </div>


		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="streetaddress">Adresă *</label>
	                  <input type="text" name="street" class="form-control" placeholder="Numele străzii" required>
	                </div>
		            </div>

		            <div class="col-md-6">
		            	<div class="form-group">
	                  <input type="text" name="house_number" class="form-control" placeholder="Numar" required>
	                </div>
		            </div>



		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Județ *</label>
	                  <input type="text" name="county" class="form-control" placeholder="" required>
	                </div>
		            </div>

		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">Cod poștal *</label>
	                  <input type="text" name="zipcode" class="form-control" placeholder="" required>
	                </div>
		            </div>


		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Nr de telefon</label>
						<input type="text" id="client_phone"class="form-control"
						<?php
						if($fill) {
							echo "placeholder=\"" . $row['client_phone']. "\"";
						}
					  ?>
					  readonly>
	                </div>
	              </div>


	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Adresă mail</label>
						<input type="text" id="client_email" class="form-control"
						<?php
						if($fill) {
							echo "placeholder=\"" . $row['client_email'] . "\"";
						}

					  ?>
					  readonly>
				  </div>
                </div>


                <div class="w-100"></div>
                <div class="col-md-12">
                	<div class="form-group mt-4">
										<div class="radio">
										  <!-- <label class="mr-3"><input type="radio" name="optradio"> Create an Account? </label>
										  <label><input type="radio" name="optradio"> Ship to different address</label> -->
										</div>
									</div>
                </div>
	            </div>



	          <div class="row mt-5 pt-3 d-flex">
	          	<div class="col-md-6 d-flex">
	          		<div class="cart-detail cart-total ftco-bg-dark p-3 p-md-4">
	          			<h3 class="billing-heading mb-4">Total Coș</h3>
	          			<p class="d-flex">
							<?php
							if(!empty($_SESSION['cart_prices'])) {
		    						echo '<span>Subtotal</span>';
		    						echo "<span>" . number_format($_SESSION['cart_prices']['subTotal'],2) . " RON</span>";
			    					echo '</p>';
			    					echo '<p class="d-flex">';
		    						echo '<span>Livrare</span>';
		    						echo "<span>" . number_format($_SESSION['cart_prices']['delivery'],2) . " RON</span>";
			    					echo '</p>';
			    					echo '<p class="d-flex">';
		    						echo '<span>Discount</span>';
		    						echo "<span>" . number_format($_SESSION['cart_prices']['discount'],2) . " RON</span>";
			    					echo '</p>';
			    					echo '<hr>';
			    					echo '<p class="d-flex total-price">';
		    						echo '<span>Total</span>';
		    						echo "<span>" . number_format($_SESSION['cart_prices']['cartTotal'],2) . " RON</span>";
			    					echo '</p>';
									echo '</div>';
								} else {
									echo '<span>Subtotal</span>';
									echo "<span>" . number_format(0,2) . " RON</span>";
									echo '</p>';
									echo '<p class="d-flex">';
									echo '<span>Livrare</span>';
									echo "<span>" . number_format(12,2) . " RON</span>";
									echo '</p>';
									echo '<p class="d-flex">';
									echo '<span>Discount</span>';
									echo "<span>" . number_format(0,2) . " RON</span>";
									echo '</p>';
									echo '<hr>';
									echo '<p class="d-flex total-price">';
									echo '<span>Total</span>';
									echo "<span>" . number_format(12,2) . " RON</span>";
									echo '</p>';
									echo '</div>';
								}


							?>
	          	</div>
	          	<div class="col-md-6">
	          		<div class="cart-detail ftco-bg-dark p-3 p-md-4">

									<div class="form-group form-check">
										<div class="col-md-12">

											<a href="terms.html">Termeni și condiții</a>

											<div class="checkbox">
											   <label class="form-check-label"><input type="checkbox" value="" name="remember" class="form-check-input" required> Sunt de acord cu termenii și condițiile stabilite</label>
											</div>
										</div>
									</div>
									<?php
									if(!empty($_SESSION['isloggedin'])) {
										if($_SESSION['user_type'] != 'admin') {
											echo '<input type="submit" name="createOrder" value="Plasează comanda" class="btn btn-primary py-3 px-4">';
										}
									}

									?>
									<!-- <p><a href="#"class="btn btn-primary py-3 px-4">Plasează comanda</a></p> -->
								</div>
							</form>
	          	</div>
	          </div>
          </div> <!-- .col-md-8 -->




          <div class="col-xl-4 sidebar ftco-animate">
            <div class="sidebar-box">

                <!-- <div class="form-group">
                	<div class="icon">
	                  <span class="icon-search"></span>
                  </div>
                  <input type="text" class="form-control" placeholder="Search...">
                </div> -->

            </div>
            <div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3>Categorii</h3>

								<?php  print_categories();  ?>

              </div>
            </div>

					<div class="sidebar-box ftco-animate">
						<h3>Recente din Blog</h3>

						<?php

						$result = mysqli_query($conn,"SELECT date, article_image, article_title, article_link  FROM blog ORDER BY article_id DESC LIMIT 3;");

		        while($row = mysqli_fetch_assoc($result)){


				      			echo '<div class="block-21 mb-4 d-flex">';
				      					echo "<a class=\"blog-img mr-4\" style=\"background-image: url('" . $row['article_image'] . "');\"></a>";
				      					echo '<div class="text">';
				      							echo "<h3 class=\"heading\"><a href=\" " . $row['article_link'] . "\">" . $row['article_title'] . "</a></h3>";
				      									echo '<div class="meta">';
				      											echo '<div><a href="#"><span class="icon-calendar"></span>' . date("F d\\t\h, Y", strtotime($row['date'])) . '</a></div>';
				      											echo '<div><a href="#"></a></div>';
				      								echo '</div>';
				      					echo '</div>';
				      		echo '</div>';

						}
						?>

 					</div>

            <div class="sidebar-box ftco-animate">
              <h3>Livrare</h3>
              <p>Comenzile peste 50 de lei beneficiază de livrare gratuită în Brașov și împrejurimile acestuia.</p>
            </div>
          </div>

        </div>
      </div>
    </section> <!-- .section -->


<!-- Footer -->
<?php print_footer(); ?>




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

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){

		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());

		        // If is not undefined

		            $('#quantity').val(quantity + 1);


		            // Increment

		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());

		        // If is not undefined

		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });

		});
	</script>


  </body>
</html>
