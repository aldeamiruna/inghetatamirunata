<?php
    session_start();
	include('comment.php');
	include('categories.php');
	include('navbar.php');
  include('footer.php');
	include('dbconfig.php');

    $recipe_id = $_GET['recipe_id'];
    $sqlRecipes = "SELECT * FROM RECIPES WHERE RECIPE_ID = " . $recipe_id . ";";

    $categoriesRecipes = "SELECT category_name FROM categories;";

    $recipe = $conn->query($sqlRecipes);
    $row = $recipe->fetch_assoc();

		$title = $row["title"];
    $short_idea = $row["short_idea"];
    $image = $row["image"];

		$first_header = $row["first_header"];
		$first_list = $row["first_list"];
    $first_list = explode(";",$first_list);

		$second_header = $row["second_header"];
		$second_list = $row["second_list"];
    $second_list = explode(";",$second_list);

    $third_header = $row["third_header"];
		$third_list = $row["third_list"];
        if(!$third_list == NULL) {
           $third_list = explode(";",$third_list);
		}

		$prep_header = $row["prep_header"];
    $prep_content = $row["prep_content"];

		$prep_time_header = $row["prep_time_header"];
    $prep_time_content = $row["prep_time_content"];

    $tags = $row["tags"];
    $tags = explode(";",$tags);
		$datetime = $row["datetime"];
		$category_id = $row["category_id"];


		$sqlCountComments = "SELECT COUNT(comment_id) AS comment_count FROM comments WHERE recipe_id = " . $recipe_id . ";";

		$sql_comments = "SELECT * FROM comments WHERE recipe_id = ".$recipe_id." ORDER BY comment_id DESC";

		$commentsResult = $conn->query($sql_comments);

		// Store values from each column in arrays
		$commentIdArray = array();
		$userIdArray = array();
		$messageArray = array();
		$dateArray = array();

		// Fetching the results
		while($row = $commentsResult->fetch_assoc()){
		   array_push($commentIdArray, $row['comment_id']);
		   array_push($userIdArray, $row['client_id']);
		   array_push($messageArray, $row['message']);
		   array_push($dateArray, $row['date']);
		}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Rețete | Cup & Cake</title>
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
    <?php print_navbar(''); ?>
    <!-- END nav -->

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Rețete</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span class="mr-2"><a href="blog.php">Blog</a></span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">

            <?php
                echo '<h2 class="mb-3">' . $title . '</h2>';
                echo '<p>' . $short_idea . '</p>' ;

            echo '<p>';
                  echo '<img src="' . $image . '"alt="recipe-1" border="0" class="img-fluid">';
            echo '</p>';

            // First header
            echo '<h5 class="mb-3">' . $first_header . '</h5>';

            // First list
            echo '<ul>';

            foreach($first_list as $line) {
                echo '<li>' . $line . '</li>';
			}

            echo '</ul>';

            // Second header
            echo '<h5 class="mb-3">' . $second_header . '</h5>';

            // Second list
            echo '<ul>';

            foreach($second_list as $line) {
               echo '<li>' . $line . '</li>';
			}

            echo '</ul>';



            if(!$third_header == NULL) {

                // Third header
                echo '<h5 class="mb-3">' . $third_header . '</h5>';

                // Third list
                echo '<ul>';

               foreach($third_list as $line) {
                    echo '<li>' . $line . '</li>';
			   }

                echo '</ul>';
			}

            // Preparation section
            echo '<h2 class="mb-3 mt-5">' . $prep_header . '</h2>';
            echo '<p>' . $prep_content . '</p>';


            // Tags

            echo '<div class="tag-widget post-tag-container mb-5 mt-5">';
            echo '<div class="tagcloud">';
            foreach($tags as $line) {
              echo '<a href="#" class="tag-cloud-link">' . $line . '</a>';
            }
            echo '</div>';
            echo '</div>';

            ?>


			<!-- Comment section -->

			<?php

			if(!sizeof($commentIdArray) == 0) {
				echo "<h3 class=\"mb-5\">" . sizeof($commentIdArray) . " Comments</h3>";
			} else {
				echo "<h3 class=\"mb-5\">There are no comments</h3>";
			}
				for($i = 0; $i < sizeof($commentIdArray); $i++) {
					$username = get_username($userIdArray[$i], $conn);

					echo '<ul class="comment-list">';
					  echo '<li class="comment">';
						echo '<div class="vcard bio">';
						  echo '<img src="images/avatar.gif" alt="Image placeholder">';
						echo '</div>';
						echo '<div class="comment-body">';
						  echo "<h3>" . $username . "</h3>";
						  echo "<div class=\"meta\">" . date("F d, Y", strtotime($dateArray[$i])) . "</div>";
						  echo "<p>" . $messageArray[$i] . "</p>";
						echo '</div>';
					  echo '</li>';
					  echo '</ul>';
				}


				?>

			 <?php
				if(!empty($_SESSION['isloggedin'])){
					if($_SESSION['user_type'] == 'client'){
	              echo '<div class="comment-form-wrap pt-5">';
	                echo '<h3 class="mb-5">Leave a comment</h3>';

	                echo "<form action=\"recipe-single.php?recipe_id=" . $recipe_id . "\"method=\"post\">";

	                  echo '<div class="form-group">';
	                    echo '<label for="message">Message</label>';
	                    echo '<textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>';
	                  echo '</div>';
	                  echo '<div class="form-group">';
					  	echo "<input type=\"hidden\" value=\"".$recipe_id."\" name=\"recipe_id\">";


						// if you are a client and are banned, you won't see the comment button

				    $sql = "SELECT ban_expiry_date FROM clients WHERE client_id = " . $_SESSION['user_id'] . ";";
					  $result = mysqli_query($conn, $sql);

              $row = mysqli_fetch_assoc($result);

                if(!($row['ban_expiry_date'] > date("Y-m-d"))) {
                	echo '<input type="submit" value="Post Comment" name="comment" class="btn py-3 px-4 btn-primary">';
                }
				echo '</div>';
		   echo '</form>';
		   echo '</div>';
              }

				 }


			 ?>

          </div> <!-- .col-md-8 -->
          <div class="col-md-4 sidebar ftco-animate">
            <div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3>Categorii</h3>
                <?php
						print_categories();
				?>
              </div>
            </div>

            <div class="sidebar-box ftco-animate">
              <h3>Recent Blog</h3>

              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/article_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="https://food52.com/blog/14296-everything-you-need-to-know-to-make-gorgeous-cupcakes">Everything You Need to Know to Make Gorgeous Cupcakes</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span>May 19, 2020</a></div>

                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>

              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/article_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="https://www.tastemade.com/articles/the-rise-and-fall-of-the-cupcake">The Rise & Fall Of The Cupcake</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span>May 15, 2020</a></div>

                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>

              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/article_3.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="https://www.tasteofhome.com/collection/baking-tips-that-take-your-baking-from-good-to-great/">12 Secrets to Take Your Baking from Good to Great</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span>Apr 17, 2020</a></div>

                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>


            <?php
            echo '<div class="sidebar-box ftco-animate">';
              echo '<h3>' . $prep_time_header . '</h3>';
              echo '<p>' . $prep_time_content . '</p>';
            echo '</div>';
            ?>

          </div>

        </div>
      </div>
    </section> <!-- .section -->

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
