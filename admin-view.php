<?php
session_start();
include('navbar.php');
include('footer.php');
require_once('dbconfig.php');


// USER BAN
if(!empty($_POST['ban'])) {
	// date now
	$date = date("Y-m-d");
	$banDate = strtotime('+30 days', strtotime($date));
	$banDate = date("Y-m-d", $banDate);

	$sql = "UPDATE `clients` SET `ban_expiry_date`='" . $banDate . "' WHERE client_id = " . $_POST['client_id'] . ";";
  mysqli_query($conn,$sql);

	if(empty($_SESSION['ban_email'])) {
		mail($_POST['client_email'] ,'You have been banned','We are sorry! Your activity has been found inappropriate on our webpage. You will be able to leave comments again in 30 days!','From: Cup & Cake <roli_szekely@yahoo.com>');
		$_SESSION['ban_email'] = true;

		if(!empty($_SESSION['unban_email'])) {
			unset($_SESSION['unban_email']);
		}
	}

}

// USER UNBAN
if(!empty($_POST['unban'])) {

	$date = date("Y-m-d");

	$sql = "UPDATE `clients` SET `ban_expiry_date`='" . $date . "' WHERE client_id = " . $_POST['client_id'] . ";";
  mysqli_query($conn,$sql);

	if(empty($_SESSION['unban_email'])){
		mail($_POST['client_email'],'You have been unbanned','Hooray! You can now leave comments below your favourite recipes!','From: Cup & Cake <roli_szekely@yahoo.com>');
		$_SESSION['unban_email'] = true;

		if(!empty($_SESSION['ban_email'])) {
			unset($_SESSION['ban_email']);
		}
	}
}


// REMOVE USER
if(!empty($_POST['remove'])) {
	$sqlDeleteClient = "DELETE FROM `clients` WHERE client_id= " . $_POST['client_id'] . ";";
	$sqlDeleteComments = "DELETE FROM `comments` WHERE user_id= " . $_POST['client_id'] . " AND user_type = 'client' ;";
  	mysqli_query($conn,$sqlDeleteClient);
	mysqli_query($conn,$sqlDeleteComments);
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Utilizatori | Cup & Cake</title>
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
            	<h1 class="mb-3 mt-5 bread">Utilizatori</h1>
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
						        <th>Username</th>
										<th>Email</th>
										<th>Telefon</th>
						        <th>Status</th>
										<th>Dată UNBAN</th>
										<th>&nbsp;</th>
						      </tr>
						    </thead>

								<tbody class="userList">


              <?php

              $result = mysqli_query($conn,"SELECT client_id, client_username, client_lastname, client_email, client_phone, ban_expiry_date FROM clients ORDER BY client_id DESC;");

              while($row = mysqli_fetch_assoc($result)){
				  echo '<tr class="text-center">';
                  echo '<td class="">' . $row['client_username'] . ' </td>';

									echo '<td class="">' . $row['client_email']  . '</td>';

									echo '<td class="">' . $row['client_phone']  . '</td>';

                  echo '<td class="quantity">';

                  	if($row['ban_expiry_date'] > date("Y-m-d")) {
                      echo 'banned';
                    } else {
                      echo 'not banned';
                    }

                  echo '</td>';


                  echo '<td class="">' . $row['ban_expiry_date'] . '</td>';

										echo '<td class="">';
					       echo '<form action="admin-view.php" method="post">';
                     echo '<input type="hidden" name="client_id" value= ' . $row['client_id'] . '>';
					 				 	 echo '<input type="hidden" name="client_email" value= ' . $row['client_email'] . '>';

            			   echo '<input type="submit" name="ban" value="BAN" class="btn btn-danger" style="background-color:transparent; padding: 20px 20px">';
      			         echo '<input type="submit" name="unban" value="UNBAN" class="btn btn-danger" style="background-color:transparent; padding: 20px 20px">';

                            	echo '</br> </br>';

                      				echo '<input type="submit" name="remove" value="REMOVE" class="btn btn-danger" style="background-color:transparent; padding: 20px 20px">';

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
