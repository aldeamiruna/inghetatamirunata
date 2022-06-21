<?php
session_start();
include('navbar.php');
include('footer.php');
include('dbconfig.php');


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
	        	$cartArray);


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
    <title>Inghetata Mirunata | A cup of joy</title>
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
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

  </head>


  <body>
	  <?php print_navbar('HOME')?>
    <!-- END nav -->


<!--Image slider -->
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url(images/blog.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            	<span class="subheading">Bine ai venit</span>
              <h1 class="mb-4">Artă în miniatură</h1>
              <p class="mb-4 mb-md-5">Cele mai îndrăgite mini deserturi, aproape de tine!</p>
              <p>
				  <?php
				  	if(!empty($_SESSION['isloggedin'])) {
						if($_SESSION['user_type'] == 'client') {
							echo '<a href="shop.php" class="btn btn-primary p-3 px-xl-4 py-xl-3">Comandă</a>';
						}
					}
				  ?>

				  <a href="menu.php" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Vezi Meniul</a></p>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url(images/bg5.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            	<span class="subheading">Bine ai venit</span>
              <h1 class="mb-4">Gust inedit, savoare aparte &amp; loc splendid</h1>
              <p class="mb-4 mb-md-5">Lasă-te învăluit de gustul unic al unor cafele unice!</p>
              <p>

				  <?php
					if(!empty($_SESSION['isloggedin'])) {
						if($_SESSION['user_type'] == 'client') {
							echo '<a href="shop.php" class="btn btn-primary p-3 px-xl-4 py-xl-3">Comandă</a>';
						}
					}
				  ?>

				   <a href="menu.php" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Vezi Meniul</a></p>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url(images/bg10.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            	<span class="subheading">Bine ai venit</span>
              <h1 class="mb-4">Gata de servit oricând</h1>
              <p class="mb-4 mb-md-5">Bunătățurile tale preferate, servite într-o clipită!</p>
              <p>

				  <?php
					if(!empty($_SESSION['isloggedin'])) {
						if($_SESSION['user_type'] == 'client') {
							echo '<a href="shop.php" class="btn btn-primary p-3 px-xl-4 py-xl-3">Comandă</a>';
						}
					}
				  ?>

				   <a href="menu.php" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Vezi Meniul</a></p>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url(images/bg8.jpg);">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
              <span class="subheading">Bine ai venit</span>
              <h1 class="mb-4">Gata de servit oricând</h1>
              <p class="mb-4 mb-md-5">Bunătățurile tale preferate, servite într-o clipită!</p>
              <p>

				  <?php
					if(!empty($_SESSION['isloggedin'])) {
						if($_SESSION['user_type'] == 'client') {
							echo '<a href="shop.php" class="btn btn-primary p-3 px-xl-4 py-xl-3">Comandă</a>';
						}
					}
				  ?>

				   <a href="menu.php" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Vezi Meniul</a></p>
            </div>

          </div>
        </div>
      </div>

      <div class="slider-item" style="background-image: url(images/bg2.jpg);">
        <div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
              <span class="subheading">Bine ai venit</span>
              <h1 class="mb-4">Gata de servit oricând</h1>
              <p class="mb-4 mb-md-5">Indiferent de sezon, îndulcirea e o necesitate!</p>
              <p>

				  <?php
					if(!empty($_SESSION['isloggedin'])) {
						if($_SESSION['user_type'] == 'client') {
							echo '<a href="shop.php" class="btn btn-primary p-3 px-xl-4 py-xl-3">Comandă</a>';
						}
					}
				  ?>

				   <a href="menu.php" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Vezi Meniul</a></p>
            </div>

          </div>
        </div>
      </div>

			<div class="slider-item" style="background-image: url(images/bg9.jpg);">
				<div class="overlay"></div>
				<div class="container">
					<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

						<div class="col-md-8 col-sm-12 text-center ftco-animate">
							<span class="subheading">Bine ai venit</span>
							<h1 class="mb-4">Gust inedit, savoare aparte &amp; loc splendid</h1>
							<p class="mb-4 mb-md-5">Lasă-te învăluit de gustul unic al unor cafele unice!</p>
							<p>

					<?php
					if(!empty($_SESSION['isloggedin'])) {
						if($_SESSION['user_type'] == 'client') {
							echo '<a href="shop.php" class="btn btn-primary p-3 px-xl-4 py-xl-3">Comandă</a>';
						}
					}
					?>

					 <a href="menu.php" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Vezi Meniul</a></p>
						</div>

					</div>
				</div>
			</div>

			<div class="slider-item" style="background-image: url(images/bg11.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            	<span class="subheading">Bine ai venit</span>
              <h1 class="mb-4">Gust inedit, savoare aparte &amp; loc splendid</h1>
              <p class="mb-4 mb-md-5">Lasă-te învăluit de gustul unic al unor cafele unice!</p>
              <p>

				  <?php
					if(!empty($_SESSION['isloggedin'])) {
						if($_SESSION['user_type'] == 'client') {
							echo '<a href="shop.php" class="btn btn-primary p-3 px-xl-4 py-xl-3">Comandă</a>';
						}
					}
				  ?>

				   <a href="menu.php" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">Vezi Meniul</a></p>
            </div>

          </div>
        </div>
      </div>

    </section>
<!-- END Image Slider -->



    <section class="ftco-intro">
    	<div class="container-wrap">
    		<div class="">
	    		<div class="info">
	    			<div class="row no-gutters">
              <!-- Phone number -->
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-phone"></span></div>
	    					<div class="text">
	    						<h3>+40713092124</h3>
	    						<p>Contactează-ne cu încredere!</p>
	    					</div>
	    				</div>

              <!-- Address -->
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-my_location"></span></div>
	    					<div class="text">
	    						<h3>Strada Camil Petrescu 14, Brașov</h3>
	    						<p>	Zona Coresi Business Park</p>
	    					</div>
	    				</div>

              <!-- Schedule -->
	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-clock-o"></span></div>
	    					<div class="text">
	    						<h3>Program: Luni-Duminică</h3>
	    						<p>Între orele 10:00 - 22:00</p>
	    					</div>
	    				</div>
	    			</div>
	    		</div>

    		</div>
    	</div>
    </section>


  <!-- Our Story -->
    <section class="ftco-about d-md-flex">
    	<div class="one-half img" style="background-image: url(images/logoMI.png);"></div>
    	<div class="one-half ftco-animate">
    		<div class="overlap">
	        <div class="heading-section ftco-animate ">
	        	<span class="subheading">Povestea</span>
	          <h2 class="mb-4">Inghetata Mirunata</h2>
	        </div>
	        <div>
	  				<p>Inghetata Mirunata este locul unde vei imbina savoarea, gustul si aromele cu buna dispozitie.Vei putea alege din varietatrea de sortimente pe care le avem si daca nu poti veni tu la noi, venim noi la tine. Suntem doar la click distanta.</p>
	  			</div>
  			</div>
    	</div>
    </section>


<!-- Attributes -->
<section class="ftco-section ftco-services">
  <div class="container">
    <div class="row">
      <div class="col-md-4 ftco-animate">
        <div class="media d-block text-center block-6 services">
          <div class="icon d-flex justify-content-center align-items-center mb-5">
            <span class="flaticon-choices"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Comandă ușor</h3>
            <p>Dacă nu ne poți vizita când ți-e poftă de ceva dulce, nici o grijă - venim noi la tine!</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 ftco-animate">
        <div class="media d-block text-center block-6 services">
          <div class="icon d-flex justify-content-center align-items-center mb-5">
            <span class="flaticon-delivery-truck"></span>
          </div>
          <div class="media-body">
            <h3 class="heading">Livrare rapidă</h3>
            <p>1, 2, 3 - Icecream! Oriunde ai fi, comenzile ajung la tine cât ai clipi. (Brașov și împrejurimi)</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 ftco-animate">
        <div class="media d-block text-center block-6 services">
          <div class="icon d-flex justify-content-center align-items-center mb-5">
            <span class="flaticon-coffee-bean"></span></div>
          <div class="media-body">
            <h3 class="heading">Calitate</h3>
            <p>Credem că detaliile fac diferența, așadar produsele noastre sunt preparate cu cea mai mare atenție și dragoste.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Menu -->
    <section class="ftco-section">
    	<div class="container">
    		<div class="row align-items-center">
    			<div class="col-md-6 pr-md-5">
    				<div class="heading-section text-md-right ftco-animate">
	          	<span class="subheading">Descoperă</span>
	            <h2 class="mb-4">Meniul nostru</h2>
	            <p class="mb-4">Înghetata cu stare de bine! Cam așa se rezumă sentimentul pe care îl ai atunci când savurezi înghețata Mirunata! Varietatea aromelor vor sta startul unei zile de vara indiferent de sezon!
              </p>
	            <p><a href="menu.php" class="btn btn-primary btn-outline-primary px-4 py-3">Vezi Meniul</a></p>
	          </div>
    			</div>
    			<div class="col-md-6">
    				<div class="row">
    					<div class="col-md-6">
    						<div class="menu-entry">
		    					<a href="#" class="img" style="background-image: url(images/pink.jpg);"></a>
		    				</div>
    					</div>
    					<div class="col-md-6">
    						<div class="menu-entry mt-lg-4">
		    					<a href="#" class="img" style="background-image: url(images/afine.jpg);"></a>
		    				</div>
    					</div>
    					<div class="col-md-6">
    						<div class="menu-entry">
		    					<a href="#" class="img" style="background-image: url(images/unicorn.jpg);"></a>
		    				</div>
    					</div>
    					<div class="col-md-6">
    						<div class="menu-entry mt-lg-4">
		    					<a href="#" class="img" style="background-image: url(images/Oreo-Milkshake.jpg);"></a>
		    				</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>


<!-- Statistics -->
    <section class="ftco-counter ftco-bg-dark img" id="section-counter" style="background-image: url(images/wall3.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
      <div class="container">
        <div class="row justify-content-center">
        	<div class="col-md-10">
        		<div class="row">
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="70">0</strong>
		              	<span>Sortimente</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="180">0</strong>
		              	<span>Inghetata mirunata vânduta</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="250">0</strong>
		              	<span>Clienți fericiți</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		              	<div class="icon"><span class="flaticon-coffee-cup"></span></div>
		              	<strong class="number" data-number="10">0</strong>
		              	<span>Oameni dedicați</span>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
        </div>
      </div>
    </section>


<!-- Best Ones-->
    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
          	<span class="subheading">Descoperă</span>
            <h2 class="mb-4">Vedetele Inghetata Mirunata</h2>
            <p>Varietatea mirunata pe care o avem ii va convinge si pe cei mai mari critici. Aici gasesti orice aroma pe gustul tau, fie ceva mai fresh, fie ceva mai dulce. Te asteptam sa le incerci!</p>
          </div>
        </div>
        <div class="row">


            <!-- Super cupcakes -->
            <?php
			// First super cupcake
              $result = mysqli_query($conn,"SELECT * FROM products WHERE product_code LIKE 'CUPBESTCPB100';");
              $row = mysqli_fetch_assoc($result);
                  echo '<div class="col-md-3">';
                  echo '<div class="menu-entry">';
                  echo "<a href=\"product-single.php?product_id=" . $row['product_id'] . "\" class=\"menu-img img mb-4\" style=\"background-image: url('" . $row['product_image'] . "');\"></a>";
                  echo '<div class="text text-center pt-4">';
                  echo "<h3><a href=\"product-single.php?product_id=" . $row['product_id'] . "\">" . $row['product_name'] . " </a></h3>";
                  echo "<p> " . $row['product_description'] . " </p>";
                  echo "<p class=\"price\"><span>" . $row['product_price'] . " </span></p>";

                  if(!empty($_SESSION['user_type'])){
	                  if($_SESSION['user_type'] != 'admin'){
		                  echo "<form method='post' action=''>";
		                  echo "<input type='hidden' name='product_code' value=".$row['product_code']." />";
		                  echo '<p><button class="btn btn-primary btn-outline-primary">Adaugă în coș</p>';
		                  echo "</button></form>";
	                  }
                  }


                  echo '</div>';
                  echo '</div>';
                  echo '</div>';

            // Second super cupcake
              $result = mysqli_query($conn,"SELECT * FROM products WHERE product_code LIKE 'CUPBESTLM200';");
              $row = mysqli_fetch_assoc($result);
                  echo '<div class="col-md-3">';
                  echo '<div class="menu-entry">';
                  echo "<a href=\"product-single.php?product_id=" . $row['product_id'] . "\" class=\"menu-img img mb-4\" style=\"background-image: url('" . $row['product_image'] . "');\"></a>";
                  echo '<div class="text text-center pt-4">';
                  echo "<h3><a href=\"product-single.php?product_id=" . $row['product_id'] . "\">" . $row['product_name'] . " </a></h3>";
                  echo "<p> " . $row['product_description'] . " </p>";
                  echo "<p class=\"price\"><span>" . $row['product_price'] . " </span></p>";

				  if(!empty($_SESSION['user_type'])){
	                  if($_SESSION['user_type'] != 'admin'){
		                  echo "<form method='post' action=''>";
		                  echo "<input type='hidden' name='product_code' value=".$row['product_code']." />";
		                  echo '<p><button class="btn btn-primary btn-outline-primary">Adaugă în coș</p>';
		                  echo "</button></form>";
	                  }
                  }

                  echo '</div>';
                  echo '</div>';
                  echo '</div>';

            // Third super cupcake
              $result = mysqli_query($conn,"SELECT * FROM products WHERE product_code LIKE 'CUPBESTVBPC200';");
              $row = mysqli_fetch_assoc($result);
                  echo '<div class="col-md-3">';
                  echo '<div class="menu-entry">';
                  echo "<a href=\"product-single.php?product_id=" . $row['product_id'] . "\" class=\"menu-img img mb-4\" style=\"background-image: url('" . $row['product_image'] . "');\"></a>";
                  echo '<div class="text text-center pt-4">';
                  echo "<h3><a href=\"product-single.php?product_id=" . $row['product_id'] . "\">" . $row['product_name'] . " </a></h3>";
                  echo "<p> " . $row['product_description'] . " </p>";
                  echo "<p class=\"price\"><span>" . $row['product_price'] . " </span></p>";

				  if(!empty($_SESSION['user_type'])){
	                  if($_SESSION['user_type'] != 'admin'){
		                  echo "<form method='post' action=''>";
		                  echo "<input type='hidden' name='product_code' value=".$row['product_code']." />";
		                  echo '<p><button class="btn btn-primary btn-outline-primary">Adaugă în coș</p>';
		                  echo "</button></form>";
	                  }
                  }

                  echo '</div>';
                  echo '</div>';
                  echo '</div>';


        	// Fourth super cupcake
              $result = mysqli_query($conn,"SELECT * FROM products WHERE product_code LIKE 'CUPBESTFERD200';");
              $row = mysqli_fetch_assoc($result);
                  echo '<div class="col-md-3">';
                  echo '<div class="menu-entry">';
                  echo "<a href=\"product-single.php?product_id=" . $row['product_id'] . "\" class=\"menu-img img mb-4\" style=\"background-image: url('" . $row['product_image'] . "');\"></a>";
                  echo '<div class="text text-center pt-4">';
                  echo "<h3><a href=\"product-single.php?product_id=" . $row['product_id'] . "\">" . $row['product_name'] . " </a></h3>";
                  echo "<p> " . $row['product_description'] . " </p>";
                  echo "<p class=\"price\"><span>" . $row['product_price'] . " </span></p>";

				  if(!empty($_SESSION['user_type'])){
	                  if($_SESSION['user_type'] != 'admin'){
		                  echo "<form method='post' action=''>";
		                  echo "<input type='hidden' name='product_code' value=".$row['product_code']." />";
		                  echo '<p><button class="btn btn-primary btn-outline-primary">Adaugă în coș</p>';
		                  echo "</button></form>";
	                  }
                  }

                  echo '</div>';
                  echo '</div>';
                  echo '</div>';

                ?>


        </div>
    	</div>
    </section>


<!-- Customer reviews -->
    <section class="ftco-section img" id="ftco-testimony" style="background-image: url(images/check.jpg);"  data-stellar-background-ratio="0.5">
    	<div class="overlay"></div>
	    <div class="container">
	      <div class="row justify-content-center mb-5">
	        <div class="col-md-7 heading-section text-center ftco-animate">
	        	<span class="subheading">Gratitudine</span>
	          <h2 class="mb-4">De la clienți</h2>
	          <p>Parerea ta conteaza! Lasa un feedback! Vrem sa ne imbunatatim calitatea si suntem curiosi de noi sugestii!</p>
	        </div>
	      </div>
	    </div>
	    <div class="container-wrap">
	      <div class="row d-flex no-gutters">
	        <div class="col-lg align-self-sm-end ftco-animate">
	          <div class="testimony">
	             <blockquote>
	                <p>&ldquo;Honestly, I couldn't imagine my days without a great coffee and a small sweet treat. These are amazing! I strongly recommend each one of them.&rdquo;</p>
	              </blockquote>
	              <div class="author d-flex mt-4">
	                <div class="image mr-3 align-self-center">
	                  <img src="images/feedbackLaura.jpg" alt="">
	                </div>
	                <div class="name align-self-center">Andreea Laura <span class="position">Bachelor Student</span></div>
	              </div>
	          </div>
	        </div>
	        <div class="col-lg align-self-sm-end">
	          <div class="testimony overlay">
	             <blockquote>
	                <p>&ldquo;I tried your biscoff flavour and I’m absolutely blown away, it’s amazing! Thank you for creating this product, it’s perfection. My only note would be to make a mint cookie flavour please! !&rdquo;</p>
	              </blockquote>
	              <div class="author d-flex mt-4">
	                <div class="image mr-3 align-self-center">
	                  <img src="images/feedbackOtto.jpg" alt="">
	                </div>
	                <div class="name align-self-center">Otto Jacob <span class="position">Med Student</span></div>
	              </div>
	          </div>
	        </div>
	        <div class="col-lg align-self-sm-end ftco-animate">
	          <div class="testimony">
	             <blockquote>
	                <p>&ldquo;I tried the biscoff gelato and was i so impressed by how delicious and creamy it was! The fact it is also vegan is incredible. I highly recommend trying it! &rdquo;</p>
	              </blockquote>
	              <div class="author d-flex mt-4">
	                <div class="image mr-3 align-self-center">
	                  <img src="images/Anna.jpg" alt="">
	                </div>
	                <div class="name align-self-center">Anna Ridley <span class="position">Bachelor Student</span></div>
	              </div>
	          </div>
	        </div>
	        <div class="col-lg align-self-sm-end">
	          <div class="testimony overlay">
	             <blockquote>
	                <p>&ldquo;It's freshly made ice cream. The best place to have ice cream in Brasov. The quality is good and worth its price . Hope the price don't increase!&rdquo;</p>
	              </blockquote>
	              <div class="author d-flex mt-4">
	                <div class="image mr-3 align-self-center">
	                  <img src="images/feedbackSandra.jpg" alt="">
	                </div>
	                <div class="name align-self-center">Sandra Tazlaoanu <span class="position">Bachelor Student</span></div>
	              </div>
	          </div>
	        </div>
	        <div class="col-lg align-self-sm-end ftco-animate">
	          <div class="testimony">
	            <blockquote>
	              <p>&ldquo;Honestly, I couldn't imagine my days without a great coffee and a small sweet treat. These are amazing! I strongly recommend each one of them.&rdquo;</p>
	            </blockquote>
	            <div class="author d-flex mt-4">
	              <div class="image mr-3 align-self-center">
	                <img src="images/feedback.jpg" alt="">
	              </div>
	              <div class="name align-self-center">Karola Szekely <span class="position">Bachelor Student</span></div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </section>


<!-- Appointment -->
		<section class="ftco-appointment">
			<div class="overlay"></div>
    	<div class="container-wrap">
    		<div class="row no-gutters d-md-flex align-items-center">
    			<div class="col-md-6 d-flex align-self-stretch">
						<img src="images/store-mese.jpg" class="img-fluid" >
					</div>


	    		<div class="col-md-6 appointment ftco-animate">
	    			<h3 class="mb-3">Rezervare</h3>

	    			<form action="reservation.php" class="appointment-form" method="post">

	    				<div class="d-md-flex">
		    				<div class="form-group">
		    					<input type="text" name="lastname" class="form-control" placeholder="Nume" required>
		    				</div>

		    				<div class="form-group ml-md-4">
		    					<input type="text" name="firstname" class="form-control" placeholder="Prenume" required>
		    				</div>
	    				</div>



	    				<div class="d-md-flex">
								<div class="form-group">
									<div class="input-wrap">
										<div class="icon"><span class="ion-ios-arrow-down"></span></div>
										<select name="reservation_table" id="" class="form-control">
											<option selected>Alege masa</option>
												<option value="masa 1">masa 1</option>
												<option value="masa 2">masa 2</option>
												<option value="masa 3">masa 3</option>
												<option value="masa 4">masa 4</option>
												<option value="masa 5">masa 5</option>
												<option value="masa 6">masa 6</option>
												<option value="masa 7">masa 7</option>
										</select>
									</div>
								</div>



		    				<div class="form-group ml-md-4">
		    					<div class="input-wrap">
										<div class="icon"><span class="ion-md-calendar"></span></div>
										<input type="text" name="reservation_date" class="form-control appointment_date" placeholder="Data">
	            		</div>
		    				</div>

		    				<div class="form-group ml-md-4">
									<div class="icon"><span class="ion-ios-clock"></span></div>
									<!-- <input type="text" name="reservation_time" class="form-control appointment_time" placeholder="Ora"> -->
									<select name="reservation_time" id="reservation_time" class="form-control">
										<option selected>Alege ora</option>
											<option value="10:00 - 12:00">10:00 - 12:00</option>
											<option value="13:00 - 15:00">13:00 - 15:00</option>
											<option value="16:00 - 18:00">16:00 - 18:00</option>
											<option value="19:00 - 21:00">19:00 - 21:00</option>
											<option value="22:00 - 00:00">22:00 - 00:00</option>
									</select>
		    				</div>
	    				</div>




	    				<div class="d-md-flex">
								<div class="form-group">
									<div class="input-wrap">
									<input type="text" name="phone" class="form-control" placeholder="Nr de telefon" required>
									</div>
								</div>

								<div class="form-group ml-md-4">
									<div class="form-group">
										<textarea name="comment" id="comment" cols="30" rows="2" class="form-control" placeholder="Comentariu"></textarea>
									</div>
								</div>
	    				</div>

							<div class="d-md-flex">
								<div class="form-group ml-md-4">
		              <input type="submit" name="reserve" value="Rezervă" class="btn btn-primary py-3 px-4">
					  <?php
					  if(!empty($_SESSION['reservation_status'])) {
						  if(strlen($_SESSION['reservation_status']) < 40){
 						  	// if reservation is successful
								echo "<h4 style=\"color:#D7EE7F;\"> " . $_SESSION['reservation_status'] . "</h4>";
						  } else {
							  // if $_SESSION['reservation_status'] is a suggestion
							  echo "<h4> " . $_SESSION['reservation_status'] . "</h4>";
						  }

						  unset($_SESSION['reservation_status']);
					  }

					  ?>
		            </div>
							</div>


	    			</form>
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
