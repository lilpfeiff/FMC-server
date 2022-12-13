<?php
  /*
  Filename: vendor-products.php
  Description: page for vendors to view their products. From links on this page, vendors can add a new product or edit an existing product.
  Author: Loren Pfeiffer
  */
?>

<?php
  date_default_timezone_set('America/New_York');
  session_start();
  $vID = $_SESSION['id'];
//  $_SESSION['id'] = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width. initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Farmers Market Connect</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/stylesHome.css">
<link rel="stylesheet" type="text/css" href="css/stylesVendor.css">

<!--<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">-->
<!--<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
<link href="https://fonts.googleapis.com/css2?family=Handlee&family=Quicksand:wght@300&display=swap" rel="stylesheet">

</head>
<body>
<div class="heading">
  <?php include 'includes/headV.inc.php';  ?>
</div>

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

  //$sql = "SELECT * FROM Product WHERE VendorID = $vID ORDER BY ProductName ASC";

  $result = mysqli_query($conn, "SELECT * FROM Product WHERE VendorID = $vID ORDER BY ProductName ASC");

  $row_count = mysqli_num_rows($result);
?>

<div class="container">
  <h1 class="pageTitle">Your Products</h1>
  <br>
<table class="prod-tbl">
  <tr>
      <th colspan="14" style="padding-bottom: 15px;">
        <?php echo  "<a href='vendor-add-product.php?id=" . $vID . "'><button type='button' name='button'>Add Product</button></a>"; ?>
      </th>
  </tr>
<!-- populated by DB -->
<?php
if ($row_count > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td class='product-img'><img src='images/productImgs/" . $row['ProductImage'] . ".jpg' width='200px' ></td>";
    echo "<td clas='empty-cell'></td>";
    echo "<td class='product-name'>" . $row['ProductName'] . "</td>";
    echo "<td class='price-cell'>$" . $row['ProductPrice'] . "</td>";
    echo "<td class='padding-cell'></td>";
    echo "<td class='quantity-cell'>" . $row['ProductQuantity'] . "</td>";
    echo "<td class='padding-cell'></td>";
    echo "<td class='btn-cell'><a href='vendor-edit-product.php?pID=" . $row['ProductID'] . "&id=" . $vID . "'><button type='button' name='editProdBtn'>Edit Product</button></a></td>";
    echo "</tr>";
  }
}
else {
  echo "<tr><td>Add your Products using the button above.</td></tr>";
}
?>
</table>
<br><br><br>
</div> <!-- closing div for container -->
<?php include "includes/footer.inc.php"; ?>

</body>
</html>
