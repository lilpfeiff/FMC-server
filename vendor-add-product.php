<?php
  /*
  Filename: vendor-add-product.php
  Description: Form for vendors to add products (to the product databases)
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

	<!--<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">-->
	<!--<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
  <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Quicksand:wght@300&display=swap" rel="stylesheet">
</head>
<body width="100%">
<?php include 'includes/headV.inc.php';  ?>

<?php
  $ProductName=$ProductCategory=$ProductDescription=$ProductQuantity=$ProductPrice=$ProductImage="";
  $ProductNameErr=$ProductCategoryErr=$ProductDescriptionErr=$ProductQuantityErr=$ProductPriceErr=$ProductImageError="";

  function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data, ENT_QUOTES);
  return $data;
}

if (isset($_POST['addProduct'])) {
  if (empty($_POST['ProductName'])) {
    $ProductNameErr = "<br>*Please type in the Product's Name";
    $output_form = true;
  } else {
    $ProductName = test_input($_POST['ProductName']);
    $ProductNameErr = "";
  }

  if (empty($_POST['ProductCategory'])) {
    $ProductCategoryErr = "<br>*Please select the Product's Category";
    $output_form = true;
  } else {
    $ProductCategory = test_input($_POST['ProductCategory']);
    $ProductCategoryErr = "";
  }

  if (empty($_POST['ProductDescription'])) {
    $ProductDescriptionErr = "<br>*Please type in the Product's Description";
    $output_form = true;
  } else {
    $ProductDescription = test_input($_POST['ProductDescription']);
    $ProductDescriptionErr = "";
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
  } else {
    $ProductQuantity = test_input($_POST['ProductQuantity']);
    $ProductQuantityErr = "";
  }

  if (empty($_POST['ProductPrice'])) {
    $ProductPriceErr = "<br>*Please type in the Product's Price";
    $output_form = true;
  } else {
    $ProductPrice = test_input($_POST['ProductPrice']);
    $ProductPriceErr = "";
  }

  if ((!empty($ProductName)) && (!empty($ProductCategory)) && (!empty($ProductDescription)) &&(!empty($ProductImage)) && (!empty($ProductQuantity)) && (!empty($ProductPrice))) {
    // code to send to database
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "fmc";
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

    if (!$conn) {
      die("<br>Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO Product (ProductName, ProductDescription, ProductImage, ProductQuantity, ProductPrice, VendorID, CategoryID)
      VALUES ('$ProductName', '$ProductDescription', '$ProductImage', '$ProductQuantity', '$ProductPrice', '$vID', '$ProductCategory')";

    if (mysqli_query($conn, $sql)) {
      echo "<br><br><h3>New Product added successfully</h3>";
    } else {
      echo "<br> Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

    $output_form = false;

  }
}else {
  $output_form = true;
}

if ($output_form) {

?>
<div class="container-add-product">
  <h2 class="pageTitle">Add Product</h2>
  <div class="add-product-form">
    <form id="addProductForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <label for="ProductName" style="font-family: 'Quicksand', sans-serif; font-weight:bold;">Product Name: </label>
      <input type="text" name="ProductName" id="ProductName" value="<?php echo $ProductName; ?>">
      <?php echo $ProductNameErr; ?><br>
      <label for="ProductCategory" style="font-family: 'Quicksand', sans-serif; font-weight:bold;">Product Category: </label>
      <select class="productCat" name="ProductCategory" style="font-family: 'Quicksand', sans-serif; font-weight:bold;" id="ProductCategory" value="<?php echo $ProductCategory; ?>">
        <option>Please select a category.</option>
        <?php
        // code to send to database
        $connect = mysqli_connect("localhost", "root", "", "fmc");

        if (!$connect) {
          die("<br>Connection failed: " . mysqli_connect_error());
        }

        $sqlC = "SELECT * FROM Category";

        $result = mysqli_query($connect, $sqlC);

        $row_count = mysqli_num_rows($result);

        if($row_count > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value=" . $row['CategoryID'] . ">" . $row['CategoryName'] . "</option>";
          }
        }
        else { echo "<option>Please select a category for your Product. </option>"; }
        mysqli_close($connect);
        ?>
      </select>
      <?php echo $ProductCategoryErr; ?><br>
      <?php // include "includes/category-form.inc.php"; ?><!--  <br> -->
      <label for="ProductDescription" style="font-family: 'Quicksand', sans-serif; font-weight:bold;">Product Description: </label>
      <input type="textarea" width="200px" height="150px;" name="ProductDescription" id="ProductDescription" value="<?php echo $ProductDescription; ?>">
      <?php echo $ProductDescriptionErr; ?><br>
      <label for="ProductImage" style="font-family: 'Quicksand', sans-serif; font-weight:bold;">Product Image: </label>
      <input type="text" name="ProductImage" value="<?php echo $ProductImage; ?>">
      <?php  echo $ProductImageError; ?><br>
      <label for="ProductQuantity" style="font-family: 'Quicksand', sans-serif; font-weight:bold;">Product Quantity: </label>
      <input type="text" name="ProductQuantity" id="ProductQuantity" value="<?php echo $ProductQuantity; ?>">
      <?php echo $ProductQuantityErr; ?><br>
      <label for="ProductPrice" style="font-family: 'Quicksand', sans-serif; font-weight:bold;">Product Price: $</label>
      <input type="number" min="0.00" max="2500" step="0.01" name="ProductPrice" id="ProductPrice" value="<?php echo $ProductPrice; ?>">
      <?php echo $ProductPriceErr; ?><br>
      <input type="reset" name="resetBtn" style="font-family: 'Quicksand', sans-serif; font-weight:bold;" value="Clear Form">
      <input type="submit" name="addProduct" style="font-family: 'Quicksand', sans-serif; font-weight:bold;" value="Add Product"><br><br><br>
    </form>
    <br><br>
    <br><br>
    <?php
  }
  else {
    //$_SESSION['username'] = test_input($_POST['username']);
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
