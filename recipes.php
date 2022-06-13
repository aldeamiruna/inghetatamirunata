<?php
session_start();
include('navbar.php');
include('footer.php');
include('dbconfig.php');

$currentPage = 1;

if(empty($_GET['page'])){
	$currentPage = 1;
} else {
	$currentPage = $_GET['page'];
}

if(!empty($_GET['category_id'])){

	$currentPage = 1;

	$sqlRecipes = "SELECT recipe_id, title, image, datetime, short_idea FROM recipes
	WHERE category_id =" . $_GET['category_id'] . " ORDER BY recipe_id";

	$recipesResult = $conn->query($sqlRecipes);
	echo $sqlRecipes;

} else {


	// Max recipe id
	$sqlMaxRecipe = "SELECT MAX(recipe_id) as recipe_max FROM recipes;";
	$recipeMaxResult = ($conn->query($sqlMaxRecipe))->fetch_assoc();
	$recipeMax = $recipeMaxResult["recipe_max"];

	if($currentPage == 1){
		$startingRecipeId = $recipeMax;
	} else{
		$startingRecipeId = $recipeMax - ($currentPage - 1) * 9;
	}


	$lastRecipeId = ($startingRecipeId - 8);


	$sqlRecipes = "SELECT recipe_id, title, image, datetime, short_idea FROM recipes WHERE recipe_id >=". $lastRecipeId ."  AND recipe_id <= " . $startingRecipeId . " ORDER BY recipe_id DESC LIMIT 9";

	$recipesResult = $conn->query($sqlRecipes);

}

function get_comment_number($recipe_id, $conn) {
	$sql = "SELECT COUNT(comment_id) as recipe_count FROM comments WHERE recipe_id=" . $recipe_id .  ";";
	$result = $conn->query($sql)->fetch_assoc();
	return $result['recipe_count'];
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Rețete | Inghetata Mirunata</title>
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


<!-- Main Image -->
    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(images/blog.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Rețete</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Rețete</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row d-flex">


        <?php

        // Based on the html below
        // Iterate through recipes and add each one


            while($row=$recipesResult->fetch_assoc())
            {
                echo '<div class="col-md-4 d-flex-fill ftco-animate">';
                echo '<div class="blog-entry align-self-stretch">';
                echo "<a href=\"recipe-single.php?recipe_id=" . $row['recipe_id'] . "\" class=\"block-20\" style=\"background-image:url('" . $row['image'] . "');\">";
                echo '</a>';
                echo '<div class="text py-4 d-block">';
                echo '<div class="meta">';
                echo '<div><a href="#">' . date("F d\\t\h, Y", strtotime($row['datetime'])) . '</a></div>';
                echo "<div><a href=\"#\" class=\"meta-chat\"><span class=\"icon-chat\"></span> " . get_comment_number($row['recipe_id'], $conn) . " </a></div>";
                echo '</div>';
                echo "<h3 class=\"heading mt-2\"><a href=\"recipe-single.php?recipe_id=" . $row['recipe_id'] . "\">" . $row['title'] . "</a></h3>";
                echo '<p>' . $row['short_idea'] . '.</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        ?>


        </div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <?php
			  if(empty($_GET['category_id'])) {

			  //
			  $previousPage = $currentPage - 1;
			  $nextPage = $currentPage + 1;

			  // We have 9 recipes per pages
			  // Total pages = round_up(recipe max / 9)
			  $totalPages = ceil(($recipeMax/9));

			  // create the pages
			    echo '<ul>';

				if($currentPage > 1) {
					// if we aren't on page 1, show the "previous" button
                	echo "<li><a href=\"recipes.php?page=" . $previousPage  . "\">&lt;</a></li>";
				}
					// iterate through each pages and check if and how to draw them
					for($i = 1; $i <= $totalPages; $i++ ) {
						if($currentPage == $i) {
							// if this is the current page, set it as active
							echo "<li class=\"active\"><span>" . $currentPage . "</span></li>";
						} else {
							// as we iterate through each page
							// draw other pages
							echo "<li><a href=\"recipes.php?page=" . $i . "\">" . $i . "</a></li>";
						}
					}

				// if there are more recipes than $currentPage * 9
				// if this is not the last page
				// draw "next" button

				if($startingRecipeId >= 10) {
					echo "<li><a href=\"recipes.php?page=" . $nextPage  . "\">&gt;</a></li>";
				}


              		echo '</ul>';
				}
              ?>
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
