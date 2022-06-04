<?php

function print_footer() {

	$dbServerName = "localhost";
	$dbUserName = "root";
	$dbPassword = "";
	$dbName = "cup_and_cake";

	$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);


	echo '<footer class="ftco-footer ftco-section img">';
	  echo '<div class="overlay"></div>';
	  echo '<div class="container">';
	    echo '<div class="row mb-5">';
	      echo '<div class="col-lg-3 col-md-6 mb-5 mb-md-5">';
	        echo '<div class="ftco-footer-widget mb-4">';
	          echo '<h2 class="ftco-heading-2">Despre noi</h2>';
	          echo '<p>Imaginația nu are limite - nici în lumea inghetatei. </p>';
	          echo '<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">';
	            // echo '<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>';
	            // echo '<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>';
	            // echo '<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>';
	          echo '</ul>';
	        echo '</div>';
	      echo '</div>';


	      echo '<div class="col-lg-4 col-md-6 mb-5 mb-md-5">';
	        echo '<div class="ftco-footer-widget mb-4">';
	          echo '<h2 class="ftco-heading-2">Articole recente</h2>';


						$result = mysqli_query($conn,"SELECT date, article_image, article_title, article_link FROM blog ORDER BY article_id DESC LIMIT 2;");
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


	        echo '</div>';
	      echo '</div>';


	      echo '<div class="col-lg-2 col-md-6 mb-5 mb-md-5">';
	         echo '<div class="ftco-footer-widget mb-4 ml-md-4">';
	          echo '<h2 class="ftco-heading-2">Servicii</h2>';
	          echo '<ul class="list-unstyled">';
	            echo '<li><a href="shop.php" class="py-2 d-block">Cupcake</a></li>';
	            echo '<li><a href="shop.php" class="py-2 d-block">Brioșe</a></li>';
	            echo '<li><a href="shop.php" class="py-2 d-block">Cafea</a></li>';
	            echo '<li><a href="shop.php" class="py-2 d-block">Răcoritoare</a></li>';
	          echo '</ul>';
	        echo '</div>';
	      echo '</div>';


	      echo '<div class="col-lg-3 col-md-6 mb-5 mb-md-5">';
	        echo '<div class="ftco-footer-widget mb-4">';
	          echo '<h2 class="ftco-heading-2">Întreabă-ne: </h2>';
	          echo '<div class="block-23 mb-3">';
	            echo '<ul>';
	              echo '<li><span class="icon icon-map-marker"></span><span class="text">Strada Camil Petrescu 14, Brașov, România</span></li>';
	              echo '<li><a href="#"><span class="icon icon-phone"></span><span class="text">+40713092124</span></a></li>';
	              echo '<li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@inghetatamirunata.com</span></a></li>';
	            echo '</ul>';
	          echo '</div>';
	        echo '</div>';
	      echo '</div>';
	    echo '</div>';

				echo '<div class="row">';
		       echo '<div class="col-md-12 text-center">';
		          echo '<p> ©mirunata 2022</p>';
		       echo '</div>';
		   	echo '</div>';

	  echo '</div>';
	echo '</footer>';
}

?>
