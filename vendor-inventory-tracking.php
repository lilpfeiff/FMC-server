<?php
  /*
  Filename: vendor-inventory-tracking.php
  Description: page for vendors to track their inventory. Vendors can click "Low Stock" when their stock is low and "No Stock" when their product is out of stock.
  Author: Loren Pfeiffer
  */
?>

<?php
  date_default_timezone_set('America/New_York');
  session_start();
  $vID = $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Farmers Market Connect</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/stylesHome.css">
  <link rel="stylesheet" type="text/css" href="css/stylesVendor.css">

	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&family=Quicksand:wght@300;500&display=swap" rel="stylesheet">
	<!--<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">

</head>
<body>
<div class="heading">
  <?php include 'includes/headV.inc.php';  ?>
</div>

<?php

  // code to send to database
  $servername = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "fmc";
  $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

  if (!$conn) {
  die("<br>Connection failed: " . mysqli_connect_error());
  }

  $sql = "SELECT * FROM Product WHERE VendorID = $vID ORDER BY ProductName ASC";

  $query = mysqli_query($conn, $sql);

?>

<div class="container">
  <h1 class="pageTitle" style="text-align:center; font-family: 'Quicksand', sans-serif; font-weight:bold;">Your Products</h1>
  <br>
<table class="prod-tbl">

<!-- populated by DB -->
<?php
$inventory = array();
if (mysqli_num_rows($query) > 0) {
  while($row = mysqli_fetch_assoc($query)) {
    $inventory[] = $row;
  }
}
else {
  echo "Add Products to Track Inventory.";
}

  for($i = 0; $i < count($inventory); $i++) {
    $pID = $inventory[$i]["ProductID"];
    echo "<form id='inventoryTrack' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method = 'post'><tr>";
    echo "<td class='product-img'><img src='images/productImgs/" . $inventory[$i]['ProductImage'] . ".jpg' width='200px' ></td>";
    echo "<td class='product-name'>" . $inventory[$i]['ProductName'] . "</td>";
    echo "<td class='price-cell'>$" . $inventory[$i]["ProductPrice"] . "</td>";
    echo "<td class='empty-cell'></td>";
    echo "<td  id='quantity' width='150px' contenteditable='true'>" . $inventory[$i]['ProductQuantity'] . "</td>";
    echo "<td class='empty-cell'></td>";
    echo "<td class='stock-btn-cell' width='350px'>";
    echo "<button type='submit' name='low-stock-btn' id='low-stock-btn' class='stock-button' value='Low Stock'>Low Stock</button>";
  //  echo "<input type='submit' name='low-stock-btn' id='low-stock-btn' class='stock-button' value='Low Stock'>";
    echo "&nbsp;";
    echo "<button type='submit' name='no-stock-btn' id='no-stock-btn' class='stock-button' onclick='noStock()'>No Stock</button>";
    echo "</td></tr></form>";
  }

  echo "<script type='text/javascript'>";
  echo "document.querySelector('#low-stock-btn').addEventListener('click', function(){" . $sqlInsert = "UPDATE Product SET ProductQuantity = 'Low Stock' WHERE ProductID = $inventory[$i]['ProductID']";
    $con = mysqli_connect("localhost", "root", "", "fmc");
    if (mysqli_query($con, $sqlInsert)) {  }
    else {     echo "<br> Error: " . $sqlInsert . "<br>" . mysqli_error($con);  }
  echo "}); </script>"  ;

  echo "<script type='text/javascript'>";
  echo "document.querySelector('#no-stock-btn').addEventListener('click', function(){" . $sqlInsert = "UPDATE Product SET ProductQuantity = 'No Stock' WHERE ProductID = $inventory[$i]['ProductID']";
    $con = mysqli_connect("localhost", "root", "", "fmc");
    if (mysqli_query($con, $sqlInsert)) {  }
    else {     echo "<br> Error: " . $sqlInsert . "<br>" . mysqli_error($con);  }
  echo "}); </script>"  ;

/*  if(isset($_POST['low-stock-btn'])) {
    $sqlInsert = "UPDATE Product SET ProductQuantity = 'Low Stock' WHERE ProductID = $pID";

    $con = mysqli_connect("localhost", "root", "", "fmc");

    if (mysqli_query($con, $sqlInsert)) {
      //echo "<br><br><h3>New Product added successfully</h3>";
    }
    else {
      echo "<br> Error: " . $sqlInsert . "<br>" . mysqli_error($con);
    }
  } */


?>

</table>

<br><br><br>
</div> <!-- closing div for container -->
<?php include "includes/footer.inc.php"; ?>

</body>
</html>
