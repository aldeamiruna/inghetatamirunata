<?php
include('navbar.php');
include('footer.php');
include('dbconfig.php');

session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Blog | Inghetata Mirunata</title>
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

<!-- Main Image -->
    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(images/blog.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Blog</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Blog</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row d-flex">


        <?php

        $result = mysqli_query($conn,"SELECT * FROM blog ORDER BY article_id DESC;");

        while($row = mysqli_fetch_assoc($result)){

          echo '<div class="col-md-4 d-flex ftco-animate">';
          echo '<div class="blog-entry align-self-stretch">';
          echo "<a href=\" " . $row['article_link'] ."\" class=\"block-20\" style=\"background-image: url('" . $row['article_image'] ."');\"></a>";
          echo '<div class="text py-4 d-block">';
          echo '<div class="meta">';
          echo '<div><a href="#">' . date("F d\\t\h, Y", strtotime($row['date'])) . '</a></div>';
          echo '<div><a href="#" class="meta-chat"></a></div>';
          echo '</div>';
          echo "<h3 class=\"heading mt-2\"><a href=\" " . $row['article_link'] ."\">" . $row['article_title'] . "</a></h3>";
          echo '<p> ' . $row['article_description'] . '</p>';
          echo '</div>';
          echo '</div>';
          echo '</div>';

        }
          ?>



        </div>
      </div>
    </section>

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

  </body>
</html>
