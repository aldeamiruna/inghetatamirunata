<?php

include('navbar.php');

if(!empty($_POST['submitted'])) {
    $dbServerName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "cup_and_cake";

    $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

    $title = $_POST['title'];
    $short_idea = $_POST['short_idea'];
    $image = $_POST['image'];

    $first_header = $_POST['first_header'];
    $first_list = $_POST['first_list'];

    $second_header = $_POST['second_header'];
    $second_list = $_POST['second_list'];

    $third_header = $_POST['third_header'];
    $third_list = $_POST['third_list'];

    $prep_header = $_POST['prep_header'];
    $prep_content = $_POST['prep_content'];

    $prep_time_header = $_POST['prep_time_header'];
    $prep_time_content = $_POST['prep_time_content'];

    $tags = $_POST['tags'];
    $category_id = $_POST['category_id'];

    $sql_insert = "INSERT INTO
    `recipes`(
    `recipe_id`,
    `title`,
    `short_idea`,
    `image`,
    `first_header`,
    `first_list`,
    `second_header`,
    `second_list`,
    `third_header`,
    `third_list`,
    `prep_header`,
    `prep_content`,
    `prep_time_header`,
    `prep_time_content`,
    `tags`,
    `datetime`,
    `category_id`)
    VALUES (NULL,
    '$title',
    '$short_idea',
    '$image',
    '$first_header',
    '$first_list',
    '$second_header',
    '$second_list',
    '$third_header',
    '$third_list',
    '$prep_header',
    '$prep_content',
    '$prep_time_header',
    '$prep_time_content',
    '$tags',
    DEFAULT,
    $category_id);";

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
    <title>Rețetă Nouă | Cup & Cake</title>
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
            	<h1 class="mb-3 mt-5 bread">Adaugă Rețetă</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <form action="add_recipe_script.php" method="post">
        <div class="container">
          <div class="row">
            <div class="col-md-8 ftco-animate">

            <!-- Title -->
            <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" name="title">
            </div>

            <!-- Short name -->
            <div class="form-group">
                      <label for="short_idea">Short idea</label>
                      <input type="text" class="form-control" name="short_idea">
            </div>

            <!-- Image link -->
            <div class="form-group">
                      <label for="image">Image <Link:css></Link:css></label>
                      <input type="text" class="form-control" name="image">
            </div>

            <!-- First section -->
            <div class="form-group">
                      <label for="first_header">First header</label>
                      <input type="text" class="form-control" name="first_header">
            </div>

            <div class="form-group">
                      <label for="first_list">First list (use ";" as a delimiter of items)</label>
                      <textarea name="first_list" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <!-- Second section -->
            <div class="form-group">
                      <label for="second_header">Second header</label>
                      <input type="text" class="form-control" name="second_header">
            </div>

            <div class="form-group">
                      <label for="second_list">Second list (use ";" as a delimiter of items)</label>
                      <textarea name="second_list" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <!-- Third section -->
            <div class="form-group">
                      <label for="third_header">Third header</label>
                      <input type="text" class="form-control" name="third_header">
            </div>

            <div class="form-group">
                      <label for="third_list">Third list (use ";" as a delimiter of items)</label>
                      <textarea name="third_list" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <!-- Preparation section -->
            <div class="form-group">
                      <label for="prep_header">Preparation header</label>
                      <input type="text" class="form-control" name="prep_header">
            </div>

            <div class="form-group">
                      <label for="prep_content">Preparation content (use "< /br>< /br>" for new line) </label>
                      <textarea name="prep_content" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <!-- Preparation time section -->
            <div class="form-group">
                      <label for="prep_time_header">Preparation time header</label>
                      <input type="text" class="form-control" name="prep_time_header">
            </div>

            <div class="form-group">
                      <label for="prep_time_content">Preparation time content</label>
                      <textarea name="prep_time_content" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <!-- Tags -->
            <div class="form-group">
                      <label for="tags">Tags (use ";" as a delimiter of items)</label>
                      <textarea name="tags" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <!-- Category name -->
            <div class="form-group">
                      <label for="category_id">Category ID</label>
                      <input type="text" class="form-control" name="category_id">
            </div>

            <div class="form-group">
                <input type="submit" value="Add Recipe" class="btn py-3 px-4 btn-primary">
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
