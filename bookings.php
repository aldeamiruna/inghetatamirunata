<?php
session_start();
include('navbar.php');
include('footer.php');
require_once('dbconfig.php');


if(!empty($_POST['cancel'])) {

  $sql = "UPDATE `reservations` SET `res_status` = 'anulată' WHERE reservation_id = " . $_POST['reservation_id'] . ";";
  mysqli_query($conn,$sql);
}

 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Rezervări | Cup & Cake</title>
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
    <?php print_navbar('');?>
    <!-- END nav -->

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Rezervări</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

		<section class="ftco-section ftco-cart">

			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
										<th>Nr</th>
						        <th>Nume</th>
						        <th>Prenume</th>
										<th>Masa</th>
										<th>Data</th>
										<th>Ora</th>
										<th>Nr de telefon</th>
										<th>Comentariu</th>
										<th>Status</th>

						      </tr>
						    </thead>

								<tbody class="">

									<?php


									$result = mysqli_query($conn,"SELECT reservation_id, res_lastname, res_firstname, res_table, res_date, res_time, res_phone, res_message, res_status FROM reservations ORDER BY reservation_id DESC;");

									while($row = mysqli_fetch_assoc($result)){

										echo '<tr class="text-center">';
												echo '<td class="">' . $row['reservation_id'] . '</td>';
												echo '<td class="">' . $row['res_lastname'] . '</td>';
												echo '<td class="">' . $row['res_firstname'] . '</td>';
												echo '<td class="">' . $row['res_table'] . '</td>';
												echo '<td class="">' . $row['res_date'] . '</td>';
												echo '<td class="">' . $row['res_time'] . '</td>';
												echo '<td class="">' . $row['res_phone'] . '</td>';
												echo '<td class="">' . $row['res_message'] . '</td>';

                        if($row['res_status'] != 'anulată' ){
                          echo '<td class="">valabilă</td>';
                        } else {
                          echo '<td class="">' . $row['res_status'] . '</td>';
                        }

												echo '<td class="">';
                        echo '<form action="bookings.php" method="post">';
                            echo '<input type="hidden" name="reservation_id" value= ' . $row['reservation_id'] . '>';
													           echo '<button type="submit" name="cancel" value="CANCEL" class="btn btn-danger" type="button" style="background-color:transparent; padding: 20px 20px"> Anulează </button>';
                            echo '</form>';
                      	echo '</td>';

											echo '</tr>';


											}

									  ?>


						    </tbody>

						  </table>
					  </div>
    			</div>
    		</div>

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
