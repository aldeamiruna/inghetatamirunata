<?php
include('navbar.php');
include('footer.php');
include('dbconfig.php');

session_start();

if(!empty($_POST['sendMessage'])) {

    $sender = $_POST['sender'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $comment = $_POST['comment'];

    $sql_insert = "INSERT INTO
    `messages`(
      `message_id`,
      `sender`,
      `sender_email`,
      `subject`,
      `comment`)
    VALUES (
      NULL,
      '$sender',
      '$email',
      '$subject',
      '$comment');";

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
    <title>Contact | Inghetata Mirunata</title>
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
	  <?php print_navbar('CONTACT'); ?>
    <!-- END nav -->

    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url(images/bg_2.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Contactează-ne</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Contact</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container mt-5">
        <div class="row block-9">
					<div class="col-md-4 contact-info ftco-animate">
						<div class="row">
							<div class="col-md-12 mb-4">
	              <h2 class="h4">Informații contact: </h2>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Adresă:</span> Strada Camil Petrescu 14, Brașov, România</p>
	            </div>

	            <div class="col-md-12 mb-3">
	              <p><span>Telefon:</span> <a href="tel://+40713092124">+40713092124</a></p>
	            </div>

              <div class="col-md-12 mb-3">
	              <p><span>Mail:</span> <a href="tel://+40713092124">info@inghetatamirunata.com</a></p>
	            </div>
						</div>
					</div>



          <div class="col-md-1"></div>
            <div class="col-md-6 ftco-animate">
              <form action="contact.php" method="post" class="contact-form">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" name="sender" class="form-control" placeholder="Nume și Prenume *" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" name="email" class="form-control" placeholder="Email *" required>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                  <input type="text" name="subject" class="form-control" placeholder="Subiect">
                </div>
                <div class="form-group">
                  <textarea name="comment" id="" cols="30" rows="7" class="form-control" placeholder="Adăugă un comentariu *" required></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" name="sendMessage" value="sendMessage" class="btn btn-primary py-3 px-5"> Trimite mesaj </button>
                </div>
              </form>
          </div>
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
