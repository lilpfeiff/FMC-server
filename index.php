<?php
  /*
  Filename: index.php
  Description: landing page for the site. Users select their role - vendor or customer - to be able to login or create an account within the site
  Author: Sajid Rahman
  */
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Farmers Market Connect</title>
    <link rel="stylesheet" href="css/stylesLogin.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1985698531.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="index-btns">
      <h1>Welcome to Farmers Market Connect</h1>
      <br>
      <h3>Please Select Your Role to Enter Farmers Market Connect:</h3>
      <a href="vendor-login.php"><button type="button" name="user-vendor">Vendor</button></a>
      <a href="customer-login.php"><button type="button" name="user-customer">Customer</button></a>
    </div>
  </body>
</html>
