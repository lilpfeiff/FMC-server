<?php
  /*
  Filename: customer-products.php
  Description: customer view of vendor products in categories (customer sees the categories offered by vendors and can select a category to view those products)
  Author: Loren Pfeiffer
  */
?>

<?php   date_default_timezone_set('America/New_York'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Farmers Market Connect</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/stylesHome.css">
  <link rel="stylesheet" type="text/css" href="css/stylesCustomer.css">

	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&family=Quicksand:wght@300;500&display=swap" rel="stylesheet">
	<!--<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">


  <script src="javascript.js"></script>
</head>
<body>
  <?php include 'includes/headC.inc.php'; ?>
  <br>
  <h1 class="pageTitle">Product Categories </h1>
  <br>
  <div class="customer-product-categories" id="customer-product-categories">
        <table class="prod-tbl">
          <tr>
            <td class="customer-product-category-img"><a href="customer-product.php?category=3001"><img src="images/categoryImgs/alcohol.jpg" width="200px"></a></td>
            <td class="customer-product-category-img"><a href="customer-product.php?category=3002"><img src="images/categoryImgs/bakery.jpg" width="200px"></a></td>
            <td class="customer-product-category-img"><a href="customer-product.php?category=3003"><img src="images/categoryImgs/coffee.jpg" width="200px"></a></td>
            <td class="customer-product-category-img"><a href="customer-product.php?category=3004"><img src="images/categoryImgs/dairy.jpg" width="200px"></a></td>
          </tr>
          <tr>
            <td class="product-name-customer"><a href="customer-product.php?category=3001">Alcohol</a></td>
            <td class="product-name-customer"><a href="customer-product.php?category=3002">Bakery</a></td>
            <td class="product-name-customer"><a href="customer-product.php?category=3003">Coffee</a></td>
            <td class="product-name-customer"><a href="customer-product.php?category=3004">Dairy</a></td>
          </tr>
          <tr height="15px"><tr>
          <tr>
            <td class="customer-product-category-img"><a href="customer-product.php?category=3005"><img src="images/categoryImgs/florist.jpg" width="200px"></a></td>
            <td class="customer-product-category-img"><a href="customer-product.php?category=3006"><img src="images/categoryImgs/meat.jpg" width="200px"></a></td>
            <td class="customer-product-category-img"><a href="customer-product.php?category=3007"><img src="images/categoryImgs/pasta.jpg" width="200px"></a></td>
            <td class="customer-product-category-img"><a href="customer-product.php?category=3008"><img src="images/categoryImgs/produce.jpg" width="200px"></a></td>
          </tr>
          <tr>
            <td class="product-name-customer"><a href="customer-product.php?category=3005">Florist</a></td>
            <td class="product-name-customer"><a href="customer-product.php?category=3006">Meat</a></td>
            <td class="product-name-customer"><a href="customer-product.php?category=3007">Pasta</a></td>
            <td class="product-name-customer"><a href="customer-product.php?category=3008">Produce</a></td>
          </tr>
        </table><br><br>
  </div>
  <?php include "includes/footer.inc.php"; ?>
  </body>

  <style media="screen">
    .pageTitle {
      text-align: center;
    }

    .prod-tbl {
      margin-left: 25%;
      margin-right: 25%;
      width: 50%;
    }

    .product-name-customer a {
      color: black;
    }

    .customer-product-category-img {
      width: 225px;
      padding-left: 10px;
      padding-right: 10px;
      margin-left: auto;
      margin-right: auto;
    }

  </style>

</html>
