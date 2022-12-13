<?php
  /*
  Filename: vendor-home.php
  Description: home page for vendors
  Author: Loren Pfeiffer & Sajid Rahman
  */
?>

<?php
  date_default_timezone_set('America/New_York');
  session_start();
	$vID = $_GET['id'];
  $vFN = $_GET['vFN'];
  $_SESSION['vFN'] = $_GET['vFN'];
  $_SESSION['id'] = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width. initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title>Farmers Market Connect</title>

	<link rel="stylesheet" type="text/css" href="css/stylesHome.css">

	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
  <!--<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
 </head>

 <body>
<?php include "includes/headV.inc.php"; ?>

       <section id="hero" style="background-image: url('images/hero.jpg');">
            <div class="herocontainer">
                <div class="info">
                    <h1>Farmers Market Connect</h1>
                    <h2></h2>
										<p style="font-size: 1.2em;">Welcome to your all-in-one solution to Farmers Market Management. Farmers Market Connect is a way for you to connect with your customers outside of the physical market to help foster those important relationships. </p>
									<h3>As a Vendor, you can: </h3>
									<ul>
										<li>Add Products to Your Inventory</li>
										<li>Edit Products in Your Inventory</li>
										<li>Track Your Inventory with Ease</li>
										<li>View Upcoming Events</li>
										<li>View Farmers Market Locations Around the DMV Area</li>
										<li>Access Directions to Your Favorite Markets</li>
										<li>And More...</li>
									</ul>
										<a href="#markets">Explore</a>
                </div>
            </div>
        </section>
        <section class="markets" id="markets">
            <h1>Markets</h1>
            <?php include "includes/markets.inc.php"; ?>
        </section>
        <section class="events" id="events">
            <h1>Events</h1>
            <?php include "includes/events.inc.php"; ?>
        </section>

        <section class="contact-us" id="contact-us">
            <h1>Contact Us</h1>
						<?php include "includes/contact-us.inc.php"; ?>
        </section>

<?php include "includes/footer.inc.php"; ?>

 </body>

 <!-- do we still need this..? -->
 <!--
	 <script src="pointer1.js"></script>
	    <script>
	        init_pointer({

	        })
	  </script>
	-->
