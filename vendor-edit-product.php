<?php
  /*
  Filename: vendor-edit-product.php
  Description: form for vendors to edit their product
  Author: Loren Pfeiffer
  */
?>

<?php
date_default_timezone_set('America/New_York');
  session_start();
  $vID = $_GET["id"];
  $pID = $_GET["pID"];
  $_SESSION["pID"] = $pID;
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Farmers Market Connect</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/stylesHome.css">
  <link rel="stylesheet" type="text/css" href="css/stylesVendor.css">

  <!--<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">-->
	<!--<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
  <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Quicksand:wght@300&display=swap" rel="stylesheet">

</head>
<body>
<?php include 'includes/headV.inc.php';  ?>

<?php

function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data, ENT_QUOTES);
  return $data;
}

  $ProductName=$ProductCategory=$ProductDescription=$ProductQuantity=$ProductPrice=$ProductImage="";
  $ProductNameErr=$ProductCategoryErr=$ProductDescriptionErr=$ProductQuantityErr=$ProductPriceErr=$ProductImageError="";

  $servername = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "fmc";
  $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

$sqlEdit = "SELECT * FROM Product JOIN Category ON Product.CategoryID = Category.CategoryID WHERE ProductID = $pID ";

$query = (mysqli_query($conn, $sqlEdit));

$numrows = mysqli_num_rows($query);

while($row = mysqli_fetch_assoc($query)) {
  $ProductName = $row["ProductName"];
  $ProductCategory = $row["CategoryName"];
  $ProductCategoryID = $row["CategoryID"];
  $ProductDescription = $row["ProductDescription"];
  $ProductImage = $row['ProductImage'];
  $ProductQuantity = $row["ProductQuantity"];
  $ProductPrice = $row["ProductPrice"];
}


if(isset($_POST['editProduct'])) {
  if (empty($_POST['ProductName'])) {
    $ProductNameErr = "<br>*Please type in the Product's Name";
    $output_form = true;
  }
  else {
    $ProductName=test_input($_POST['ProductName']);
    $ProductNameErr="";
  }

  if (empty($_POST['ProductCategory'])) {
    $ProductCategoryErr = "<br>*Please select the Product's Category";
    $output_form = true;
  }
  else {
    $ProductCategory=test_input($_POST['ProductCategory']);
    $ProductCategoryErr="";
  }

  if (empty($_POST['ProductDescription'])) {
    $ProductDescriptionErr = "<br>*Please type in the Product's Description";
    $output_form = true;
  }
  else {
    $ProductDescription=test_input($_POST['ProductDescription']);
    $ProductDescriptionErr="";
  }

  if (empty($_POST['ProductImage'])) {
    $ProductImageErr = "<br>*Please upload an Image for your Product";
    $output_form = true;
    }
    else {
    $ProductImage=test_input($_POST['ProductImage']);
    $ProductImageErr="";
    }

  if (empty($_POST['ProductQuantity'])) {
    $ProductQuantityErr = "<br>*Please type in the Product's Quantity";
    $output_form = true;
  }
  else {
    $ProductQuantity=test_input($_POST['ProductQuantity']);
    $ProductQuantityErr="";
  }

  if (empty($_POST['ProductPrice'])) {
    $ProductPriceErr = "<br>*Please type in the Product's Price";
    $output_form = true;
  }
  else {
    $ProductPrice=test_input($_POST['ProductPrice']);
    $ProductPriceErr="";
  }

  if ((!empty($ProductName)) && (!empty($ProductCategory)) && (!empty($ProductDescription)) && (!empty($ProductImage)) && (!empty($ProductQuantity)) && (!empty($ProductPrice))) {
    // code to send to database
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "fmc";
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);  }

    if (!$conn) {
      die("<br>Connection failed: " . mysqli_connect_error());
    }

    $sqlInsert = "UPDATE Product SET ProductName = '$ProductName', CategoryID = '$ProductCategoryID', ProductDescription = '$ProductDescription', ProductImage = '$ProductImage', ProductQuantity = '$ProductQuantity', ProductPrice = '$ProductPrice' WHERE ProductID = $pID";

    if (mysqli_query($conn, $sqlInsert)) {
      echo "<br><br><h3>New Product added successfully</h3>";
    }
    else {
      echo "<br> Error: " . $sqlInsert . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

    $output_form = false;

}
else {
  $output_form = true;
}

if ($output_form) {

?>
<div class="container-edit-product">
  <div class="edit-product-form">
  <h2  class="pageTitle">Edit Product</h2>
    <form id="editProductForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" style="font-weight: bold; width: 80%; align: center;">
      <label for="ProductName">Product Name: </label>
      <input type="text" name="ProductName" id="ProductName" value="<?php echo $ProductName; ?>">
      <?php echo $ProductNameErr; ?><br>
      <label for="ProductCategory">Product Category: </label>
      <select class="productCat" name="ProductCategory" id="ProductCategory">
        <option value="<?php echo $ProductCategoryID; ?>"><?php echo $ProductCategory; ?></option>
        <option value="3001">Alcohol</option>
        <option value="3002">Bakery</option>
        <option value="3003">Coffee</option>
        <option value="3004">Dairy</option>
        <option value="3005">Florist</option>
        <option value="3006">Meat</option>
        <option value="3007">Pasta</option>
        <option value="3008">Produce</option>
      </select>
      <?php echo $ProductCategoryErr; ?><br>
      <label for="ProductDescription">Product Description: </label>
      <textarea rows="3" cols="50" name="ProductDescription" id="ProductDescription"><?php echo $ProductDescription; ?></textarea>
      <?php echo $ProductDescriptionErr; ?><br>
      <label for="ProductImage" >Product Image: </label>
      <input type="text" name="ProductImage" value="<?php echo $ProductImage; ?>">
      <?php  echo $ProductImageError; ?><br>
      <label for="ProductQuantity" >Product Quantity: </label>
      <input type="text" name="ProductQuantity" id="ProductQuantity" value="<?php echo $ProductQuantity; ?>">
      <?php echo $ProductQuantityErr; ?><br>
      <label for="ProductPrice" >Product Price: $</label>
      <input type="number" min="0.00" max="2500" step="0.01" name="ProductPrice" id="ProductPrice" value="<?php echo $ProductPrice; ?>">
      <?php echo $ProductPriceErr; ?><br>
      <input type="submit" name="editProduct" value="Update Product">
    </form>
    <br><br>
    <br><br>
    <?php
  }
  else {
   // $_SESSION['username'] = test_input($_POST['username']);
  // $vID = $_SESSION['id'];
    header("Location: vendor-products.php?id=$vID");
    exit();
  }
    ?>
</div>
</div> <!-- closing div for container -->
<?php include "includes/footer.inc.php"; ?>

</body>
</html>
