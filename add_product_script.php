<?php

include('navbar.php');

if(!empty($_POST['submitted'])) {
    $dbServerName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "cup_and_cake";

    $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

    $product_name = $_POST['product_name'];
    $product_code = $_POST['product_code'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_description = $_POST['product_description'];


    $sql_insert = "INSERT INTO
    `products`(
      `product_id`,
      `product_name`,
      `product_code`,
      `product_price`,
      `product_image`,
      `product_description`)
    VALUES (
    NULL,
    '$product_name',
    '$product_code',
    '$product_price',
    '$product_image',
    '$product_description');";

if ($conn->query($sql_insert) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $sql_insert . "<br>" . $conn->error;
}

$conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Produs Nou | Cup & Cake</title>
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
            	<h1 class="mb-3 mt-5 bread">Adaugă Produs</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <form action="add_product_script.php" method="post">
        <div class="container">
          <div class="row">
            <div class="col-md-8 ftco-animate">

            <!-- Title -->
            <div class="form-group">
                      <label for="title">Product Name</label>
                      <input type="text" class="form-control" name="product_name">
            </div>

            <!-- Product Code -->
            <div class="form-group">
                      <label for="short_idea">Product Code</label>
                      <input type="text" class="form-control" name="product_code">
            </div>

            <!-- Price -->
            <div class="form-group">
                      <label for="image">Product Price</label>
                      <input type="text" class="form-control" name="product_price">
            </div>

            <!-- Image link -->
            <div class="form-group">
                      <label for="image">Product Image<Link:css></Link:css></label>
                      <input type="text" class="form-control" name="product_image">
            </div>


            <!-- Product description-->
            <div class="form-group">
                      <label for="prep_content">Product Description</label>
                      <textarea name="product_description" cols="30" rows="10" class="form-control"></textarea>
            </div>



            <div class="form-group">
                <input type="submit" value="Add Product" class="btn py-3 px-4 btn-primary">
                <input type="hidden" value="true" name="submitted" />
            </div>
          </div>
        </div>
      </form>

    </section>
    <!-- .section -->

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
