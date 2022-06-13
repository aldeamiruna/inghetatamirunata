<?php
include('navbar.php');
include('footer.php');
include('dbconfig.php');

	session_start();

	if(!empty($_SESSION['user_type'])){
	if($_SESSION['user_type'] == 'client') {
	    $status="";
	    if (isset($_POST['product_code']) && $_POST['product_code']!=""){
	    $code = $_POST['product_code'];
	    $result = mysqli_query(
	    $conn,
	    "SELECT * FROM `products` WHERE `product_code`='$code';"
	    );
	    $row = mysqli_fetch_assoc($result);
	    $name = $row['product_name'];
	    $code = $row['product_code'];
	    $price = $row['product_price'];
	    $image = $row['product_image'];
		$description = $row['product_description'];



		$qty = 1;
		if(!empty($_SESSION['shopping_cart'][$code]['product_quantity'])){
			$qty = $_SESSION['shopping_cart'][$code]['product_quantity'];
		}

		$cartArray = array(
	     $code=>array(
	     'product_name'=>$name,
	     'product_code'=>$code,
	     'product_price'=>$price,
	     'product_quantity'=>$qty,
	     'product_image'=>$image,
	 	 'product_description'=>$description)
	    );

	    if(empty($_SESSION['shopping_cart'])) {
	        $_SESSION['shopping_cart'] = $cartArray;
	        $status = "<div class='box'>Product is added to your cart!</div>";
	    }else{
	        $array_keys = array_keys($_SESSION["shopping_cart"]);
	        if(in_array($code,$array_keys)) {
				$cartArray[$code]['product_quantity'] = $cartArray[$code]['product_quantity'] + 1;
				echo '</br>';
				$_SESSION["shopping_cart"] = array_merge(
		        $_SESSION["shopping_cart"],
		        $cartArray
		        );
	     	$status = "<div class='box' style='color:white;'> Product is already added to your cart!</div>";
	        } else {
	        $_SESSION["shopping_cart"] = array_merge(
	        $_SESSION["shopping_cart"],
	        $cartArray
	        );


	        $status = "<div class='box'>Product is added to your cart!</div>";
	     }

	     }
	    }
	}
}

$active = '';
	if(!empty($_GET['active_header'])) {

		switch ($_GET['active_header']) {
	    case 'XTRA':
			$active = 'XTRA';
	        break;
	    case 'RACOR':
			$active = 'RACOR';
	        break;
	    case 'CUP':
			$active = 'CUP';
	        break;
		default:
			$active = '';
			break;
	}
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shop | Inghetata Mirunata</title>
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
    <?php print_navbar('SHOP'); ?>
    <!-- END nav -->

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(images/wall3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Comandă online</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Shop</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>


    <section class="ftco-menu mb-5 pb-5">
    	<div class="container">
    		<div class="row d-md-flex">
	    		<div class="col-lg-12 ftco-animate p-md-5">
		    		<div class="row">
		          <div class="col-md-12 nav-link-wrap mb-5">
		            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">

						<?php

						if($active == 'XTRA') {
							echo '<a class="nav-link active" id="v-pills-0-tab" data-toggle="pill" href="#v-pills-0" role="tab" aria-controls="v-pills-0" aria-selected="true">Inghetata</a>';
						} else {
							echo '<a class="nav-link" id="v-pills-0-tab" data-toggle="pill" href="#v-pills-0" role="tab" aria-controls="v-pills-0" aria-selected="true">Inghetata</a>';
						}

			              if($active =='RACOR') {
							  echo '<a class="nav-link active" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Răcoritoare</a>';
						  } else {
							 echo '<a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Răcoritoare</a>';
						  }

			              if($active =='CUP') {
							  echo '<a class="nav-link active" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Cupcake&Pancakes</a>';
						  } else {
							 echo '<a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Cupcake&Pancake</a>';
						  }
					 	?>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex align-items-center">

		            <div class="tab-content ftco-animate" id="v-pills-tabContent">

						<?php
							if($active=='XTRA') {
								echo '<div class="tab-pane fade show active" id="v-pills-0" role="tabpanel" aria-labelledby="v-pills-0-tab">';
							} else {
								echo '<div class="tab-pane fade" id="v-pills-0" role="tabpanel" aria-labelledby="v-pills-0-tab">';
							}
						?>

		              	<div class="row">

											<?php
												$result = mysqli_query($conn,"SELECT * FROM products WHERE product_code LIKE 'XTRA%';");
												while($row = mysqli_fetch_assoc($result)){
														echo '<div class="col-md-4 d-flex-fill text-center">';
														echo '<div class="menu-wrap">';
														echo "<a href=\"product-single.php?product_id=" . $row['product_id'] . "\" class=\"menu-img img mb-4\" style=\"background-image: url('" . $row['product_image'] . "');\"></a>";
														echo '<div class="text">';
														echo "<h3><a href=\"product-single.php?product_id=" . $row['product_id'] . "\">" . $row['product_name'] . " </a></h3>";
														echo "<p> " . $row['product_description'] . " </p>";
														echo "<p class=\"price\"><span>" . $row['product_price'] . " RON </span></p>";


														if(!empty($_SESSION['user_type'])){
														if($_SESSION['user_type'] != 'admin'){
														echo "<form method='post' action='shop.php?active_header=XTRA'>";
														echo "<input type='hidden' name='product_code' value=".$row['product_code']." />";
														echo '<p><button class="btn btn-primary btn-outline-primary">Adaugă în coș</p>';
														echo "</button></form>";
																}
															}
														echo '</div>';
														echo '</div>';
														echo '</div>';
													}


											?>

		              	</div>
		              </div>


					  <?php
						  if($active=='RACOR') {
							  echo '<div class="tab-pane fade show active" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">';
						  } else {
							  echo '<div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">';
						  }
					  ?>
		                <div class="row">

											<?php
												$result = mysqli_query($conn,"SELECT * FROM products WHERE product_code LIKE 'RACOR%';");
												while($row = mysqli_fetch_assoc($result)){
														echo '<div class="col-md-4 d-flex-fill text-center">';
														echo '<div class="menu-wrap">';
														echo "<a href=\"product-single.php?product_id=" . $row['product_id'] . "\" class=\"menu-img img mb-4\" style=\"background-image: url('" . $row['product_image'] . "');\"></a>";
														echo '<div class="text">';
														echo "<h3><a href=\"product-single.php?product_id=" . $row['product_id'] . "\">" . $row['product_name'] . " </a></h3>";
														echo "<p> " . $row['product_description'] . " </p>";
														echo "<p class=\"price\"><span>" . $row['product_price'] . " RON </span></p>";

														if(!empty($_SESSION['user_type'])){
														if($_SESSION['user_type'] != 'admin'){
														echo "<form method='post' action='shop.php?active_header=RACOR'>";
														echo "<input type='hidden' name='product_code' value=".$row['product_code']." />";
														echo '<p><button class="btn btn-primary btn-outline-primary">Adaugă în coș</p>';
														echo "</button></form>";
																}
															}
														echo '</div>';
														echo '</div>';
														echo '</div>';
													}

											?>

									</div>
							 </div>


							 <?php
								 if($active=='CUP') {
									 echo '<div class="tab-pane fade show active" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">';
								 } else {
									 echo '<div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">';
								 }
							 ?>
		                <div class="row">

                            <?php
                              $result = mysqli_query($conn,"SELECT * FROM products WHERE product_code LIKE 'CUP%';");
                              while($row = mysqli_fetch_assoc($result)){
                              	  echo '<div class="col-md-4 d-flex-fill text-center">';
                                  echo '<div class="menu-wrap">';
																	echo "<a href=\"product-single.php?product_id=" . $row['product_id'] . "\" class=\"menu-img img mb-4\" style=\"background-image: url('" . $row['product_image'] . "');\"></a>";                                  echo '<div class="text">';
                                  echo "<h3><a href=\"product-single.php?product_id=" . $row['product_id'] . "\">" . $row['product_name'] . " </a></h3>";
                                  echo "<p> " . $row['product_description'] . " </p>";
                                  echo "<p class=\"price\"><span>" . $row['product_price'] . " RON </span></p>";

																	if(!empty($_SESSION['user_type'])){
																	if($_SESSION['user_type'] != 'admin'){
																	echo "<form method='post' action='shop.php?active_header=CUP'>";
																	echo "<input type='hidden' name='product_code' value=".$row['product_code']." />";
																	echo '<p><button class="btn btn-primary btn-outline-primary">Adaugă în coș</p>';
																	echo "</button></form>";
																			}
																		}
																	echo '</div>';
																	echo '</div>';
																	echo '</div>';
																}

                            mysqli_close($conn);
                            ?>


                          </div>
		              			</div>
		              		</div>



		              	</div>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
    	</div>
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
