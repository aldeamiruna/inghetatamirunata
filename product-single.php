<?php
session_start();
include('navbar.php');
include('footer.php');
require_once('dbconfig.php');


  $product_id = $_GET['product_id'];

  $sql = "SELECT * FROM products WHERE product_id = " . $product_id . ";";
  $result = $conn->query($sql);
  // echo $sql;
  $row = $result->fetch_assoc();

  $product_name = $row["product_name"];
  $product_code = $row["product_code"];
  $product_price = $row["product_price"];
  $product_image = $row["product_image"];
  $product_description = $row["product_description"];

if(!empty($_SESSION['user_type'])) {
  if($_SESSION['user_type'] == 'client') {
	    $status="";
	    if (isset($_POST['product_code']) && $_POST['product_code']!=""){
	    $code = $_POST['product_code'];
		$quantity = $_POST['quantity'];
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
			$qty = $quantity;
		} else {
			$_SESSION['shopping_cart'][$code]['product_quantity'] = $quantity;
			$qty = $quantity - 1;
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


 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Product | Cup & Cake</title>
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

    <?php print_navbar('')?>

    <!-- END nav -->

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Descriere Produs</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row">


    			<div class="col-lg-6 mb-5 ftco-animate">


          <?php
        echo "<a href=\"" . $product_image ."\" class=\"image-popup\"><img src=\"" . $product_image . "\" class=\"img-fluid\"></a>";
          echo '</div>';
            echo '<div class="col-lg-6 product-details pl-md-5 ftco-animate">';
              echo '<h3>' . $product_name . '</h3>';
              echo '<p class="price"><span>' . $product_price . '</span></p>';
              echo '<p>' . $product_description .'</p>';
              echo '<div class="row mt-4">';
              echo '<div class="w-100"></div>';



          //echo '<p><a href="cart.php" class="btn btn-primary py-3 px-5">Adaugă în Coș</a></p>';
          echo "<form method='post' action=''>";

          echo '<div class="input-group col-md-6 d-flex mb-3">';
          echo '<span class="input-group-btn mr-2">';
          echo '<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">';
          echo '<i class="icon-minus"></i>';
          echo '</button>';
          echo '</span>';
          echo '<input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">';
          echo '<span class="input-group-btn ml-2">';
            echo '<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">';
              echo '<i class="icon-plus"></i>';
            echo '</button>';
          echo '</span>';
        echo '</div>';
      echo '</div>';


                 echo "<input type='hidden' name='product_code' value=" . $product_code . " />";
                 echo '<input type="submit" value="Adaugă în coș" class="btn btn-primary">';
          echo "</input></form>";

            ?>
    			</div>
    		</div>
    	</div>
    </section>


    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Descoperă</span>
            <h2 class="mb-4">Produse Similare</h2>
            <p>Descrieredescrieredescrieredescriere desc drescd descriere desccds descriere desxcd esdesc desdc</p>
          </div>
        </div>
        <div class="row">


          <?php

            $like = '';
            if(strpos($product_code, 'CUP') !== false ) {
                  $like = 'CUP%';
            } else if(strpos($product_code, 'RACOR') !== false ) {
                  $like = 'RACOR%';
            } else if(strpos($product_code, 'XTRA') !== false ) {
                  $like = 'XTRA%';
            }

            $sql = "SELECT * FROM products WHERE product_code LIKE '" . $like . "' AND NOT product_id = " . $product_id . " LIMIT 4;";
            $relatedResult = $conn->query($sql);

            while($row = $relatedResult->fetch_assoc()) {

            echo '<div class="col-md-3">';
                echo '<div class="menu-entry">';
                        echo "<a href=\"product-single.php?product_id=" . $row['product_id'] . "\" class=\"img\" style=\"background-image: url(" . $row['product_image'] . ");\"></a>";
                        echo '<div class="text text-center pt-4">';
                            echo "<h3><a href=\"product-single.php?product_id=" . $row['product_id'] .  "\">" . $row['product_name'] ."</a></h3>";
                            echo '<p> ' . $row['product_description']. ' </p>';
                            echo '<p class="price"><span>'. $row['product_price'] . '</span></p>';
                            echo "<form method='post' action=''>";
                            echo "<input type='hidden' name='product_code' value=".$row['product_code']." />";
                            echo '<p><button class="btn btn-primary btn-outline-primary">Adaugă în coș</p>';
                            echo "</button></form>";
                    echo '</div>';
                echo '</div>';
            echo '</div>';

          }

        ?>




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
