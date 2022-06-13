<?php
session_start();

require_once('dbconfig.php');
 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Comenzi | Inghetata Mirunata</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

    <div>
        <h1 class="text-center" >Detalii comanda</h1>
    </div>



		<section class="ftco-section ftco-cart">

			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>Denumire produs</th>
						        <th>Pret</th>
                    <th>Cantitate</th>
						      </tr>
						    </thead>

								<tbody class="">

                    <?php

          			$order_id = $_GET['order_id'];

                    $result = mysqli_query($conn,"SELECT orders_products.order_id, orders_products.quantity, products.product_name, products.product_price FROM orders_products
                       INNER JOIN products ON orders_products.product_id = products.product_id WHERE order_id = $order_id;");

                    while($row = mysqli_fetch_assoc($result)){

                       echo '<tr class="text-center">';
  	                   echo '<td class="">' . $row['product_name'] . '</td>';
  	                   echo '<td class="">' . $row['product_price'] . '</td>';
                       echo '<td class="">' . $row['quantity'] . '</td>';


                      }
                    ?>

						    </tbody>

						  </table>
					  </div>
    			</div>
    		</div>

			</div>

      <div class="text-center">
          <a href="orders-client.php"><button type="button"  class="btn btn-danger" type="button" style="background-color:transparent; padding: 20px 20px"> Back </button></a>
      </div>






		</section>




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
