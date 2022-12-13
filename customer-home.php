<?php
/*
Filename: customer-home.php
Description: Home page for Customers
Author: Loren Pfeiffer & Sajid Rahman
*/
?>

<?php
date_default_timezone_set('America/New_York');
session_start();
$_SESSION['id'] = $_GET['id'];
$cID = $_SESSION['id'];
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
  <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&family=Quicksand:wght@300;500&display=swap" rel="stylesheet">
	<!--<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">

 </head>

 <body>
	 <?php include "includes/headC.inc.php"; ?>

       <section id="hero" style="background-image: url('images/hero.jpg');">
            <div class="herocontainer">
                <div class="info">
                    <h1>Farmers Market Connect</h1>
                    <h2>Welcome to Farmers Market Connect!</h2>
										<p>Here you can connect with your local Farmers and Vendors outside of the physical Farmers Market setting, so you know where to go to get your desired products. </p>
										<h3>As a Customer, you can: </h3>
										<ul>
											<li>View Upcoming Events</li>
											<li>View Farmers Market Locations Around the DMV Area</li>
											<li>Follow Your Favorite Vendors</li>
											<li>Search for Your Favorite Products</li>
											<li>View Available Stock for Each Product </li>
											<li>Access Directions to Your Favorite Markets</li>
											<li>And More...</li>
										</ul>
											<!--  You can also see the stock left for these Products so you know what to expect when going to the market. -->
                  <!--  <p>Farmers Market Connect is a Farmers Market Management System created to help bridge the gap between Vendors and Customers to help foster relationships. As a Vendor, you can add your Products to your Products page, edit previously added Products, and track your inventory. </p> -->
                    <a href="">Explore</a>
                </div>
            </div>
        </section>

        <section id="market" class="markets">
            <h1>Markets</h1>
						<?php include "includes/markets.inc.php"; ?>
        </section>

        <section id="events" class="events">
            <h1>Events</h1>
						<?php include "includes/events.inc.php"; ?>

        </section>

				<section class="contact-us" id="contact-us">
						<h1>Contact Us</h1>
						<?php  include  "includes/contact-us.inc.php"; ?>
				</section>
<?php include "includes/footer.inc.php"; ?>

 </body>
