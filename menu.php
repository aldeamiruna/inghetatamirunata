<?php
include('navbar.php');
include('footer.php');

session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Meniu | Inghetata Mirunata</title>
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
<!-- NAV     -->
    <?php print_navbar('MENIU');?>
    <!-- END nav -->



<!-- Image slide -->
    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(images/wall.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Descoperă meniul nostru</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Meniu</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

<!-- Contact info -->
    <section class="ftco-intro">
    	<div class="container-wrap">
    		<div class="wrap d-md-flex align-items-xl-end">
	    		<div class="info">
	    			<div class="row no-gutters">

	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-phone"></span></div>
	    					<div class="text">
                  <h3>+40713092124</h3>
                  <p>Contactează-ne cu încredere!</p>
	    					</div>
	    				</div>

	    				<div class="col-md-4 d-flex ftco-animate">
	    					<div class="icon"><span class="icon-my_location"></span></div>
	    					<div class="text">
                  <h3>Camil Petrescu 14, Brașov</h3>
                  <p>	Zona Coresi Business Park</p>
	    					</div>
	    				</div>

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




    <section class="ftco-section">
    	<div class="container">
        <div class="row">

<!-- Proaspete și cu fructe -->
        	<div class="col-md-6 mb-5 pb-3">

        		<h3 class="mb-5 heading-pricing ftco-animate">Inghetata</h3>
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/cupzmeura.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Zmeura cu fistic</span></h3>
	        				<span class="price">13.5 RON</span>
	        			</div>
	        			<div class="d-block">
	        				<p>Delicioasa zmeura, de culoare rosu-roz stralucitor, este una dintre cele mai populare fructe de padure pe care vrei sa le savurezi!</p>
	        			</div>
        			</div>
        		</div>

        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/cupcapsuni.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Capsuni</span></h3>
	        				<span class="price">11 RON</span>
	        			</div>
	        			<div class="d-block">
	        				<p>Combinatia perfecta pentru iubitorii fructului rosu cu multe proprietati nutritive </p>
	        			</div>
	        		</div>
        		</div>

        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/blackberry.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Afine</span></h3>
	        				<span class="price">12 RON</span>
	        			</div>
	        			<div class="d-block">
	        				<p>Ideal pentru o zi cu idei fresh. </p>
	        			</div>
	        		</div>
        		</div>

        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/peach.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Piersica</span></h3>
	        				<span class="price">12.5 RON</span>
	        			</div>
	        			<div class="d-block">
	        				<p>Un gust ametitor de bun pentru fanii acestui fruct</p>
	        			</div>
	        		</div>
        		</div>

            <div class="pricing-entry d-flex ftco-animate">
              <div class="img" style="background-image: url(images/cupmangoo.jpg);"></div>
              <div class="desc pl-3">
                <div class="d-flex text align-items-center">
                  <h3><span>Mango</span></h3>
                  <span class="price">13 RON</span>
                </div>
                <div class="d-block">
                  <p>Inghetata cu fructul exotic, ideal pentru zilele căludroase de vara, alaturi de prieteni</p>
                </div>
              </div>
            </div>

            <div class="pricing-entry d-flex ftco-animate">
              <div class="img" style="background-image: url(images/banane.jpg);"></div>
              <div class="desc pl-3">
                <div class="d-flex text align-items-center">
                  <h3><span>Banane cu ciocolata</span></h3>
                  <span class="price">13 RON</span>
                </div>
                <div class="d-block">
                  <p>Combinatia perfecta de fruct si iubita ciocolata</p>
                </div>
              </div>
            </div>

            <div class="pricing-entry d-flex ftco-animate">
              <div class="img" style="background-image: url(images/cupkiwi.jpg);"></div>
              <div class="desc pl-3">
                <div class="d-flex text align-items-center">
                  <h3><span>Kiwi</span></h3>
                  <span class="price">13 RON</span>
                </div>
                <div class="d-block">
                  <p>Inghetata cu fructul exotic, ideal pentru zilele căludroase</p>
                </div>
              </div>
            </div>

            <div class="pricing-entry d-flex ftco-animate">
              <div class="img" style="background-image: url(images/water.jpg);"></div>
              <div class="desc pl-3">
                <div class="d-flex text align-items-center">
                  <h3><span>Pepene rosu</span></h3>
                  <span class="price">13 RON</span>
                </div>
                <div class="d-block">
                  <p>Combinatie fresh si roz, ideala pentru zilele căludroase</p>
                </div>
              </div>
            </div>


        	</div>


<!-- Îmbătătoare-->
        	<div class="col-md-6 mb-5 pb-3">
        		<h3 class="mb-5 heading-pricing ftco-animate">Îmbătătoare</h3>
        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/imb_1.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Stil Piña Colada</span></h3>
	        				<span class="price">14.5 RON</span>
	        			</div>
	        			<div class="d-block">
	        				<p>Inghetata în stil exotic, perfecta pentru a da startul sezonului estival</p>
	        			</div>
	        		</div>
        		</div>

        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/mar.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Mar cu scortisoara</span></h3>
	        				<span class="price">16 RON</span>
	        			</div>
	        			<div class="d-block">
	        				<p>Combinatie inedita in care gustul acrisor de mar se imbina perfect cu scortisoara</p>
	        			</div>
	        		</div>
        		</div>

            <div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/lavanderice.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Lavanda</span></h3>
	        				<span class="price">16 RON</span>
	        			</div>
	        			<div class="d-block">
	        				<p>Inghetata cu un strop de relaxare pentru acele zile cand ai nevoie de o pauza</p>
	        			</div>
	        		</div>
        		</div>

            <div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/fistic.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Fistic</span></h3>
	        				<span class="price">16 RON</span>
	        			</div>
	        			<div class="d-block">
	        				<p>Răsfățul tandru al fisticului acompaniate de un strop de euforie</p>
	        			</div>
	        		</div>
        		</div>

            <div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/orez.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Orez cu lapte</span></h3>
	        				<span class="price">16 RON</span>
	        			</div>
	        			<div class="d-block">
	        				<p>Răsfățul tandru al copilariei acompaniat de un strop de euforie</p>
	        			</div>
	        		</div>
        		</div>

        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/Proseccoo.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Cu Prosecco și cremă de fructe</span></h3>
	        				<span class="price">16 RON</span>
	        			</div>
	        			<div class="d-block">
	        				<p>Combinatia perfecta pentru o zi de vineri </p>
	        			</div>
	        		</div>
        		</div>

        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/Baileys-Irish.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Baileys</span></h3>
	        				<span class="price">13 RON</span>
	        			</div>
	        			<div class="d-block">
	        				<p>Clasica combinație adorată de domnisoare</p>
	        			</div>
	        		</div>
        		</div>

            <div class="pricing-entry d-flex ftco-animate">
              <div class="img" style="background-image: url(images/cheesecake.jpg);"></div>
              <div class="desc pl-3">
                <div class="d-flex text align-items-center">
                  <h3><span>Cheesecake</span></h3>
                  <span class="price">15.5 RON</span>
                </div>
                <div class="d-block">
                  <p>Inghetata cu stil și gust amețitor de bun</p>
                </div>
              </div>
            </div>



        </div>


<!-- Pancakes -->
        <div class="col-md-6 mb-5 pb-3">
        		<h3 class="mb-5 heading-pricing ftco-animate">Clătite cu înghețată</h3>

        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/pink.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Pinktastic</span></h3>
	        				<span class="price">19.5 RON</span>
	        			</div>
	        			<div class="d-block">
	        				<p>Inghetata cu stil și gust amețitor de bun pentru iubitorii de inghetata si clatite</p>
	        			</div>
        			</div>
        		</div>

        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/caramel.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Caramel sărat</span></h3>
	        				<span class="price">15.5 RON</span>
	        			</div>
	        			<div class="d-block">
	        				<p>Gustul clatitelor pufoase se imbina perfect cu inghetata de vanilie si toppingul de caramel sarat</p>
	        			</div>
	        		</div>
        		</div>

        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/mango.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Banane&Mango</span></h3>
	        				<span class="price">18 RON</span>
	        			</div>
	        			<div class="d-block">
	        				<p>Gustul exotic este perfect pentru o zi calduroasa de vara</p>
	        			</div>
	        		</div>
        		</div>

        		<div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/cherry.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Cherry</span></h3>
	        				<span class="price">18.5 RON</span>
	        			</div>
	        			<div class="d-block">
	        				<p>Special pentru iubitorii de cirese cu un strop de savoare a ciocolatei</p>
	        			</div>
	        		</div>
        		</div>

            <div class="pricing-entry d-flex ftco-animate">
        			<div class="img" style="background-image: url(images/bezea.jpg);"></div>
        			<div class="desc pl-3">
	        			<div class="d-flex text align-items-center">
	        				<h3><span>Marshmellow</span></h3>
	        				<span class="price">18.5 RON</span>
	        			</div>
	        			<div class="d-block">
	        				<p>Combinatia perfecta de dulce pentru iubitorii de bezele</p>
	        			</div>
	        		</div>
        		</div>

            <div class="pricing-entry d-flex ftco-animate">
              <div class="img" style="background-image: url(images/lemon.jpg);"></div>
              <div class="desc pl-3">
                <div class="d-flex text align-items-center">
                  <h3><span>Lemon fresh</span></h3>
                  <span class="price">16 RON</span>
                </div>
                <div class="d-block">
                  <p>Gustul fresh al fructului se imbina perfect cu inghetata de vanilie cu mac</p>
                </div>
              </div>
            </div>
        	</div>



<!-- Icecream cupcakes -->
          <div class="col-md-6">
                  		<h3 class="mb-5 heading-pricing ftco-animate">Brioșe cu înghețată</h3>

                  		<div class="pricing-entry d-flex ftco-animate">
                  			<div class="img" style="background-image: url(images/unicorn.jpg);"></div>
                  			<div class="desc pl-3">
          	        			<div class="d-flex text align-items-center">
          	        				<h3><span>Unicorn</span></h3>
          	        				<span class="price">12.5 RON</span>
          	        			</div>
          	        			<div class="d-block">
          	        				<p>Pentru cei ce iubesc explozia de culoare, vor adora aceasta combinatie de savoare</p>
          	        			</div>
          	        		</div>
                  		</div>

                  		<div class="pricing-entry d-flex ftco-animate">
                  			<div class="img" style="background-image: url(images/mint.jpg);"></div>
                  			<div class="desc pl-3">
          	        			<div class="d-flex text align-items-center">
          	        				<h3><span>Mint</span></h3>
          	        				<span class="price">19 RON</span>
          	        			</div>
          	        			<div class="d-block">
          	        				<p>Daca esti unul dintre cei care adora menta, aceasta briosa sigur e pe gustul tau</p>
          	        			</div>
          	        		</div>
                  		</div>

                  		<div class="pricing-entry d-flex ftco-animate">
                  			<div class="img" style="background-image: url(images/pepene.jpg);"></div>
                  			<div class="desc pl-3">
          	        			<div class="d-flex text align-items-center">
          	        				<h3><span>Watermelon madness</span></h3>
          	        				<span class="price">20.5 RON</span>
          	        			</div>
          	        			<div class="d-block">
          	        				<p>Pentru toti fanii watermelon sugar hiiiigh</p>
          	        			</div>
          	        		</div>
                  		</div>

                  		<div class="pricing-entry d-flex ftco-animate">
                  			<div class="img" style="background-image: url(images/candy.jpg);"></div>
                  			<div class="desc pl-3">
          	        			<div class="d-flex text align-items-center">
          	        				<h3><span>Candy</span></h3>
          	        				<span class="price">14 RON</span>
          	        			</div>
          	        			<div class="d-block">
          	        				<p>Cine iubeste dulciurile, poate savura combinatia acestora cu inghetata</p>
          	        			</div>
          	        	</div>
                	</div>

                  <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url(images/bananacake.jpg);"></div>
                    <div class="desc pl-3">
                      <div class="d-flex text align-items-center">
                        <h3><span>Banana</span></h3>
                        <span class="price">14 RON</span>
                      </div>
                      <div class="d-block">
                        <p>Toti Minionii aleg banana na na</p>
                      </div>
                  </div>
              </div>

                  <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url(images/cioco.jpg);"></div>
                    <div class="desc pl-3">
                      <div class="d-flex text align-items-center">
                        <h3><span>Choco madness</span></h3>
                        <span class="price">22.5 RON</span>
                      </div>
                      <div class="d-block">
                        <p>Pentru cei ce indragesc ciocolata, aceasta combinatie este ideala</p>
                      </div>
                  </div>
              </div>

            </div>


<!-- Milkshake cu inghetata -->
          <div class="col-md-6">
                  <h3 class="mb-5 heading-pricing ftco-animate">Milkshake cu inghetata</h3>

                    <div class="pricing-entry d-flex ftco-animate">
                      <div class="img" style="background-image: url(images/Kitkat-Choco-Pie-milkshake.jpg);"></div>
                      <div class="desc pl-3">
                        <div class="d-flex text align-items-center">
                          <h3><span>Milkshake cu ciocolata</span></h3>
                          <span class="price">16 RON</span>
                        </div>
                        <div class="d-block">
                          <p></p>
                        </div>
                      </div>
                    </div>

                    <div class="pricing-entry d-flex ftco-animate">
                      <div class="img" style="background-image: url(images/arbys-mint-chocolate-swirl-shake.jpg);"></div>
                      <div class="desc pl-3">
                        <div class="d-flex text align-items-center">
                          <h3><span>Milkshake cu ciocolata si menta</span></h3>
                          <span class="price">15 RON</span>
                        </div>
                        <div class="d-block">
                          <p></p>
                        </div>
                      </div>
                    </div>

                    <div class="pricing-entry d-flex ftco-animate">
                      <div class="img" style="background-image: url(images/Vanilla.jpg);"></div>
                      <div class="desc pl-3">
                        <div class="d-flex text align-items-center">
                          <h3><span>Milkshake vanilie</span></h3>
                          <span class="price">14.5 RON</span>
                        </div>
                        <div class="d-block">
                          <p></p>
                        </div>
                      </div>
                    </div>

                    <div class="pricing-entry d-flex ftco-animate">
                      <div class="img" style="background-image: url(images/best-vegan-strawberry-milkshake.jpg);"></div>
                      <div class="desc pl-3">
                        <div class="d-flex text align-items-center">
                          <h3><span>Milkshake capsuni si banane</span></h3>
                          <span class="price">16.5 RON</span>
                        </div>
                        <div class="d-block">
                          <p></p>
                        </div>
                      </div>
                    </div>

                    <div class="pricing-entry d-flex ftco-animate">
                      <div class="img" style="background-image: url(images/Oreo-Milkshake.jpg);"></div>
                      <div class="desc pl-3">
                        <div class="d-flex text align-items-center">
                          <h3><span>Milkshake Oreo</span></h3>
                          <span class="price">16 RON</span>
                        </div>
                        <div class="d-block">
                          <p></p>
                        </div>
                    </div>
                </div>

                <div class="pricing-entry d-flex ftco-animate">
                  <div class="img" style="background-image: url(images/snickers.jpg);"></div>
                  <div class="desc pl-3">
                    <div class="d-flex text align-items-center">
                      <h3><span>Milkshake Snickers</span></h3>
                      <span class="price">17 RON</span>
                    </div>
                    <div class="d-block">
                      <p></p>
                    </div>
                </div>
            </div>
          </div>

<!-- Cafele -->
          <div class="col-md-6">
                <h3 class="mb-5 heading-pricing ftco-animate">Cafele</h3>

                  <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url(images/caf_espresso.jpg);"></div>
                    <div class="desc pl-3">
                      <div class="d-flex text align-items-center">
                        <h3><span>Espresso</span></h3>
                        <span class="price">6 RON</span>
                      </div>
                      <div class="d-block">
                        <p></p>
                      </div>
                    </div>
                  </div>

                  <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url(images/caf_macchiato.jpg);"></div>
                    <div class="desc pl-3">
                      <div class="d-flex text align-items-center">
                        <h3><span>Espresso Macchiato</span></h3>
                        <span class="price">8 RON</span>
                      </div>
                      <div class="d-block">
                        <p></p>
                      </div>
                    </div>
                  </div>

                  <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url(images/caf_cafelatte.jpg);"></div>
                    <div class="desc pl-3">
                      <div class="d-flex text align-items-center">
                        <h3><span>Caffe Latte</span></h3>
                        <span class="price">10 RON</span>
                      </div>
                      <div class="d-block">
                        <p></p>
                      </div>
                    </div>
                  </div>

                  <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url(images/caf_cappucino.jpg);"></div>
                    <div class="desc pl-3">
                      <div class="d-flex text align-items-center">
                        <h3><span>Cappucino</span></h3>
                        <span class="price">12 RON</span>
                      </div>
                      <div class="d-block">
                        <p></p>
                      </div>
                    </div>
                  </div>

                  <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url(images/caf_americano.jpg);"></div>
                    <div class="desc pl-3">
                      <div class="d-flex text align-items-center">
                        <h3><span>Americano</span></h3>
                        <span class="price">8.5 RON</span>
                      </div>
                      <div class="d-block">
                        <p></p>
                      </div>
                    </div>
                  </div>

                  <div class="pricing-entry d-flex ftco-animate">
                    <div class="img" style="background-image: url(images/caf_frappe.jpg);"></div>
                    <div class="desc pl-3">
                      <div class="d-flex text align-items-center">
                        <h3><span>Caffe Frappe</span></h3>
                        <span class="price">14 RON</span>
                      </div>
                      <div class="d-block">
                        <p></p>
                      </div>
                  </div>
              </div>
        </div>

        <!-- Limonada -->
                  <div class="col-md-6">
                        <h3 class="mb-5 heading-pricing ftco-animate">Limonada</h3>

                          <div class="pricing-entry d-flex ftco-animate">
                            <div class="img" style="background-image: url(images/limoclasic.jpg);"></div>
                            <div class="desc pl-3">
                              <div class="d-flex text align-items-center">
                                <h3><span>Limonada clasica</span></h3>
                                <span class="price">6 RON</span>
                              </div>
                              <div class="d-block">
                                <p></p>
                              </div>
                            </div>
                          </div>

                          <div class="pricing-entry d-flex ftco-animate">
                            <div class="img" style="background-image: url(images/limomint.jpg);"></div>
                            <div class="desc pl-3">
                              <div class="d-flex text align-items-center">
                                <h3><span>Limonada cu menta</span></h3>
                                <span class="price">8 RON</span>
                              </div>
                              <div class="d-block">
                                <p></p>
                              </div>
                            </div>
                          </div>

                          <div class="pricing-entry d-flex ftco-animate">
                            <div class="img" style="background-image: url(images/ghimbir.jpg);"></div>
                            <div class="desc pl-3">
                              <div class="d-flex text align-items-center">
                                <h3><span>Limonada cu ghimbir</span></h3>
                                <span class="price">10 RON</span>
                              </div>
                              <div class="d-block">
                                <p></p>
                              </div>
                            </div>
                          </div>

                          <div class="pricing-entry d-flex ftco-animate">
                            <div class="img" style="background-image: url(images/limozmeura.jpg);"></div>
                            <div class="desc pl-3">
                              <div class="d-flex text align-items-center">
                                <h3><span>Limonada cu zmeura</span></h3>
                                <span class="price">12 RON</span>
                              </div>
                              <div class="d-block">
                                <p></p>
                              </div>
                            </div>
                          </div>

                          <div class="pricing-entry d-flex ftco-animate">
                            <div class="img" style="background-image: url(images/fructulpasiunii.jpg);"></div>
                            <div class="desc pl-3">
                              <div class="d-flex text align-items-center">
                                <h3><span>Limonada cu fructul pasiunii</span></h3>
                                <span class="price">8.5 RON</span>
                              </div>
                              <div class="d-block">
                                <p></p>
                              </div>
                            </div>
                          </div>

                          <div class="pricing-entry d-flex ftco-animate">
                            <div class="img" style="background-image: url(images/limopepene.jpg);"></div>
                            <div class="desc pl-3">
                              <div class="d-flex text align-items-center">
                                <h3><span>Limonada cu pepene rosu</span></h3>
                                <span class="price">14 RON</span>
                              </div>
                              <div class="d-block">
                                <p></p>
                                <p></p>
                              </div>
                          </div>
                      </div>
                </div>


        <!-- Apa & Sucuri -->
                  <div class="col-md-6">
                          <h3 class="mb-5 heading-pricing ftco-animate">Apa&Sucuri</h3>

                          <div class="pricing-entry d-flex ftco-animate">
                            <div class="img" style="background-image: url(images/apa.jpg);"></div>
                            <div class="desc pl-3">
                              <div class="d-flex text align-items-center">
                                <h3><span>Apa (plata/minerala)</span></h3>
                                <span class="price">5 RON</span>
                              </div>
                              <div class="d-block">
                                <p></p>
                              </div>
                          </div>
                      </div>

                            <div class="pricing-entry d-flex ftco-animate">
                              <div class="img" style="background-image: url(images/orange.jpg);"></div>
                              <div class="desc pl-3">
                                <div class="d-flex text align-items-center">
                                  <h3><span>Fresh de portocale</span></h3>
                                  <span class="price">14 RON</span>
                                </div>
                                <div class="d-block">
                                  <p></p>
                                </div>
                              </div>
                            </div>

                            <div class="pricing-entry d-flex ftco-animate">
                              <div class="img" style="background-image: url(images/multi.jpg);"></div>
                              <div class="desc pl-3">
                                <div class="d-flex text align-items-center">
                                  <h3><span>Fresh multifructe</span></h3>
                                  <span class="price">15 RON</span>
                                </div>
                                <div class="d-block">
                                  <p></p>
                                </div>
                              </div>
                            </div>

                            <div class="pricing-entry d-flex ftco-animate">
                              <div class="img" style="background-image: url(images/rodddie.jpg);"></div>
                              <div class="desc pl-3">
                                <div class="d-flex text align-items-center">
                                  <h3><span>Fresh rodie</span></h3>
                                  <span class="price">14 RON</span>
                                </div>
                                <div class="d-block">
                                  <p></p>
                                </div>
                              </div>
                            </div>

                            <div class="pricing-entry d-flex ftco-animate">
                              <div class="img" style="background-image: url(images/cfs.jpg);"></div>
                              <div class="desc pl-3">
                                <div class="d-flex text align-items-center">
                                  <h3><span>Cola/Fanta/Sprite</span></h3>
                                  <span class="price">6.5 RON</span>
                                </div>
                                <div class="d-block">
                                  <p></p>
                                </div>
                              </div>
                            </div>

                            <div class="pricing-entry d-flex ftco-animate">
                              <div class="img" style="background-image: url(images/tea.jpg);"></div>
                              <div class="desc pl-3">
                                <div class="d-flex text align-items-center">
                                  <h3><span>Ice Tea</span></h3>
                                  <span class="price">10 RON</span>
                                </div>
                                <div class="d-block">
                                  <p></p>
                                </div>
                            </div>
                        </div>


                    </div>
                  </div>

              </div>


        	</div>
        </div>
    	</div>


    </section>







<!-- Sortimente aparte -->
    <section class="ftco-menu">
    	<div class="container">

    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Descoperă</span>
            <h2 class="mb-4">Sortimente aparte</h2>
            <p>Sortimente delicioase pentru doritorii de combinatii inedite</p>
          </div>
        </div>

    		<div class="row d-md-flex">
	    		<div class="col-lg-12 ftco-animate p-md-5">
		    		<div class="row">
		          <div class="col-md-12 nav-link-wrap mb-5">
		            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		              <a class="nav-link active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Europa</a>

		              <!-- <a class="nav-link" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">Băuturi</a> -->

		              <a class="nav-link" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="false">Alte continente</a>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex align-items-center">

		            <div class="tab-content ftco-animate" id="v-pills-tabContent">

		              <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-1-tab">
		              	<div class="row">

                    <!-- Europa -->
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(images/caf_frappe.jpg);"></a>
		              				<div class="text">
		              					<h3><a href="#">Affogato (Italia)</a></h3>
		              					<p></p>
		              					<p class="price"><span>12 RON</span></p>
		              				</div>
		              			</div>
		              		</div>

		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(images/eu_einspanner.jpg);"></a>
		              				<div class="text">
		              					<h3><a href="#">Einspänner (Austria)</a></h3>
		              					<p></p>
		              					<p class="price"><span>11.5 RON</span></p>
		              				</div>
		              			</div>
		              		</div>

                      <div class="col-md-4 text-center">
                        <div class="menu-wrap">
                          <a href="#" class="menu-img img mb-4" style="background-image: url(images/eu_kaffeost.jpg);"></a>
                          <div class="text">
                            <h3><a href="#">Kaffeost (Suedia)</a></h3>
                            <p></p>
                            <p class="price"><span>9.5 RON</span></p>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4 text-center">
                        <div class="menu-wrap">
                          <a href="#" class="menu-img img mb-4" style="background-image: url(images/eu_espresso_romano.jpg);"></a>
                          <div class="text">
                            <h3><a href="#">Espresso Romano (Italia)</a></h3>
                            <p></p>
                            <p class="price"><span>7 RON</span></p>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-4 text-center">
                        <div class="menu-wrap">
                          <a href="#" class="menu-img img mb-4" style="background-image: url(images/eu_pharisaer.jpg);"></a>
                          <div class="text">
                            <h3><a href="#">Pharisäer Kaffee (Germania)</a></h3>
                            <p></p>
                            <p class="price"><span>9.5 RON</span></p>
                          </div>
                        </div>
                      </div>

		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(images/eu_mazagran.jpg);"></a>
		              				<div class="text">
		              					<h3><a href="#">Mazagran (Portugalia)</a></h3>
		              					<p></p>
		              					<p class="price"><span>7.5 RON</span></p>
		              				</div>
		              			</div>
		              		</div>

		              	</div>
		              </div>


            <!-- Alte continente -->
		              <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-3-tab">
		                <div class="row">

		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(images/alte_caphetrung.jpg);"></a>
		              				<div class="text">
		              					<h3><a href="#">Ca Phe Trung (Vietnam)</a></h3>
		              					<p></p>
		              					<p class="price"><span>9.5 RON</span></p>
		              				</div>
		              			</div>
		              		</div>

		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(images/alte_kopijoss.jpg);"></a>
		              				<div class="text">
		              					<h3><a href="#">Kopi Joss (Indonesia)</a></h3>
		              					<p></p>
		              					<p class="price"><span>8.50</span></p>
		              				</div>
		              			</div>
		              		</div>

		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(images/alte_qahwa.jpg);"></a>
		              				<div class="text">
		              					<h3><a href="#">Qahwa (Arabia Saudită)</a></h3>
		              					<p></p>
		              					<p class="price"><span>7 RON</span></p>
		              				</div>
		              			</div>
		              		</div>

                      <div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(images/alte_bulletproof.jpg);"></a>
		              				<div class="text">
		              					<h3><a href="#">Bulletproof Coffee (USA)</a></h3>
		              					<p></p>
		              					<p class="price"><span>11 RON</span></p>
		              				</div>
		              			</div>
		              		</div>

                      <div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(images/alte_lagrima.jpg);"></a>
		              				<div class="text">
		              					<h3><a href="#">Cafe Lagrima (Argentina)</a></h3>
		              					<p></p>
		              					<p class="price"><span>9 RON</span></p>
		              				</div>
		              			</div>
		              		</div>

                      <div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="background-image: url(images/alte_cafezinho.jpg);"></a>
		              				<div class="text">
		              					<h3><a href="#">Cafezinho (Brazilia)</a></h3>
		              					<p></p>
		              					<p class="price"><span>9 RON</span></p>
		              				</div>
		              			</div>
		              		</div>
		              	</div>
		              </div>
		            </div>
		          </div>
		        </div>
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
