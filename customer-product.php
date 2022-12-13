<?php
  /*
  Filename: customer-product.php
  Description: customer view of vendor product in a specific category
  Author: Loren Pfeiffer
  */
?>

<?php
  date_default_timezone_set('America/New_York');
  session_start();
  $category = $_GET['category'];
?>

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
</head>
<body>
  <?php include 'includes/headC.inc.php'; ?>

  <?php
    // code to send to database
    // $servername = "localhost";
    // $dbusername = "root";
    // $dbpassword = "";
    // $dbname = "fmc";
    $conn = mysqli_connect("localhost", "root", "", "fmc");

    if (!$conn) {
      die("<br>Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT Product.ProductImage, Product.ProductName, Product.ProductPrice, Product.ProductQuantity, Vendor.Username FROM Product JOIN Vendor ON Product.VendorID = Vendor.VendorID WHERE Product.CategoryID = '$category' ORDER BY ProductName ASC";

    $result = mysqli_query($conn, $sql);

    $row_count = mysqli_num_rows($result);

    $sql2 = "SELECT CategoryName FROM Category WHERE CategoryID = '$category'";

    $res = mysqli_query($conn, $sql2);
    while($row2 = mysqli_fetch_assoc($res)) {$name = $row2['CategoryName'];}

?>

  <br>
  <h1 class="pageTitle"><?php $category ?> Products </h1>
  <br>

  <div class="customer-product-categories" id="customer-product-categories">
        <table class="prod-tbl">
          <?php
          if ($row_count > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td class='product-img' rowspan='2'><img src='images/productImgs/" . $row['ProductImage'] . ".jpg' width='200px' ></td>";
              echo "<td clas='empty-cell'></td>";
              echo "<td class='product-name'>" . $row['ProductName'] . "</td>";
              echo "<td class='padding-cell'></td>";
              echo "<td class='price-cell'>$" . $row['ProductPrice'] . "</td>";
              echo "</tr><tr>";
              echo "<td clas='empty-cell'></td>";
              echo "<td class='product-vendor'>" . $row['Username'] . "</td>";
              echo "<td class='padding-cell'></td>";
              echo "<td class='product-quantity'>" . $row['ProductQuantity'] . "</td></tr>";
            }
          }
          else {
            echo "<tr><td>There are currently no products for sale in the " . $name . " category.</td></tr>";
          }
          ?>
        </table>
        <br><br>
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
