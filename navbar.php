<?php

function print_navbar($item) {


	$dbServerName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "cup_and_cake";

    $conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);


	echo '<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">';
		echo '<div class="container">';
		  echo '<a class="navbar-brand" href="index.php"> Inghetata Mirunata </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">';
			echo '<span class="oi oi-menu"></span> Menu';
		  echo '</button>';
		  echo '<div class="collapse navbar-collapse" id="ftco-nav">';
			echo '<ul class="navbar-nav ml-auto">';

			if($item == 'HOME') {
				echo '<li class="nav-item active">';
			} else {
				echo '<li class="nav-item">';
			}
			echo '<a href="index.php" class="nav-link">Home</a></li>';

			if($item == 'MENIU') {
				echo '<li class="nav-item active">';
			} else {
				echo '<li class="nav-item">';
			}
			  echo '<a href="menu.php" class="nav-link">Meniu</a></li>';


			  if($item == 'SERVICII') {
				  echo '<li class="nav-item active">';
			  } else {
				  echo '<li class="nav-item">';
			  }

			  echo '<a class="nav-link" href="services.php"  aria-haspopup="true" aria-expanded="false">Servicii</a>';

			echo '</li>';


			echo '<li class="nav-item dropdown">';
				echo '<a class="nav-link dropdown-toggle" href="room.php" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Descoperă</a>';
			  echo '<div class="dropdown-menu" aria-labelledby="dropdown04">';
				echo '<a class="dropdown-item" href="blog.php">Blog</a>';
				echo '<a class="dropdown-item" href="recipes.php">Rețete</a>';
				// <!-- <a class="dropdown-item" href="shop.php">Evenimente</a> -->
			  echo '</div>';
			echo '</li>';


				if(!empty($_SESSION['isloggedin'])){
						if($_SESSION['user_type'] == 'client') {
						echo '<li class="nav-item dropdown">';
						echo '<a class="nav-link dropdown-toggle" href="" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>';
						echo '<div class="dropdown-menu" aria-labelledby="dropdown04">';
						echo '<a class="dropdown-item" href="shop.php?active_header=XTRA">Shop</a>';
						echo '<a class="dropdown-item" href="cart.php">Coș</a>';
						echo '<a class="dropdown-item" href="checkout.php">Checkout</a>';
						echo '</div>';

					} else {
						if($item == 'SHOP'){
						 echo '<li class="nav-item active">';
						 echo '<a class="nav-link" href="shop.php"  aria-haspopup="true" aria-expanded="false">Shop</a>';
						 } else {
							 echo '<li class="nav-item">';
							 echo '<a class="nav-link" href="shop.php"  aria-haspopup="true" aria-expanded="false">Shop</a>';
						 }
					}
				}


			echo '</li>';

			if($item == 'CONTACT') {
				echo '<li class="nav-item active">';
			} else {
				echo '<li class="nav-item">';
			}
			  echo '<a href="contact.php" class="nav-link">Contact</a></li>';

				if(!empty($_SESSION['isloggedin'])){
				  $qty_cart = 0;
				  if(!empty($_SESSION["shopping_cart"])) {
					  foreach($_SESSION['shopping_cart'] as $key => $value) {
						  $qty_cart = $qty_cart + $value['product_quantity'];
					  }
				  }
				  if(!empty($_SESSION["shopping_cart"])) {
					  echo "<li class=\"nav-item cart\"><a href=\"cart.php\" class=\"nav-link\"><span class=\"icon icon-shopping_cart\"></span><span id=\"cart_items_number\" class=\"bag d-flex justify-content-center align-items-center\"><small>" . $qty_cart . "</small></span></a></li>";
				  } else {
					  echo "<li class=\"nav-item cart\"><a href=\"cart.php\" class=\"nav-link\"><span class=\"icon icon-shopping_cart\"></span></a></li>";
				  }
				}

			  if(!empty($_SESSION['isloggedin'])){
				   echo '<li class="nav-item cart"><a class="nav-link"><span class="icon icon-user"></span></a></li>';
			  } else {
				  echo '<li class="nav-item cart"><a href="login.php" class="nav-link"><span class="icon icon-user"></span></a></li>';
			  }
			 print_user_in_navbar();
		  echo '</ul>';
		  echo '</div>';
		  echo '</div>';
	  echo '</nav>';
}

function print_user_in_navbar() {
	if(!empty($_SESSION['isloggedin'])){
	 echo '<li class="nav-item dropdown">';
	   echo "<a class=\"nav-link dropdown-toggle\" href=\"\" id=\"dropdown04\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">" . $_SESSION['username'] . "</a>";
	   echo '<div class="dropdown-menu" aria-labelledby="dropdown04">';

		if($_SESSION['user_type'] == 'client'){
				echo '<a class="dropdown-item" href="orders-client.php">Comenzile mele</a>';
		}


	   	if($_SESSION['user_type'] == 'admin') {
		 	echo '<a class="dropdown-item" href="admin-view.php">Utilizatori</a>';
			echo '<a class="dropdown-item" href="add_recipe_script.php">Adaugă rețetă</a>';
			echo '<a class="dropdown-item" href="add_product_script.php">Adaugă produs</a>';
			echo '<a class="dropdown-item" href="bookings.php">Vezi rezervări</a>';
			echo '<a class="dropdown-item" href="orders-admin.php">Vezi comenzi</a>';
			echo '<a class="dropdown-item" href="messages.php">Mesaje</a>';
	 	}

		 echo '<form action="server.php" method="post">';
		 echo '<input type="submit" class="dropdown-item" value="Logout" name="logout">';
		 // <button type="button" class="btn btn-danger" type="button" style="background-color:transparent; padding: 20px 20px">';
		 echo '</form>';
	  echo '</div>';
	 echo '</li>';
	}
}

function print_user_view() {

}
?>
