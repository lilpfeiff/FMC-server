<?php
  /*
  Filename: customer-vendor.php
  Description: list of vendors for customers to view. they can search for vendors and follow them if desired
  Author: Sajid Rahman & Loren Pfeiffer
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
  <title>Farmers Market Connect</title>

  <link rel="stylesheet" type="text/css" href="css/stylesHome.css">
  <link rel="stylesheet" type="text/css" href="css/stylesCustomer.css">

	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&family=Quicksand:wght@300;500&display=swap" rel="stylesheet">
	<!--<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
</head>

<body id="customer-vendor-body">
  <?php include "includes/headC.inc.php"; ?>
    <div class="background-image-follower">
      <div class="vendorcontainer">
  <!--      <div class= "container">
            <h1>Farmers Market Connect</h1>
        </div> -->
        <div>
            <form id="form-search" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <label for="input-search">Search Vendors:</label>
                <input type="search" id="input-search" name="input-search">
                <button type="submit" name="submit-search" form="form-search" value="submit">Search</button>
            </form>
            <br>
        </div>

        <div class="container">

        <?php

        $connect = mysqli_connect("localhost","root","","fmc");
        if(isset($_POST['submit-search'])){
            $inputSearch = $_POST['input-search'];
            $query = "SELECT * FROM vendor WHERE Username LIKE '%$inputSearch%'";
        }else{
            $query = "SELECT * FROM vendor";
        }
        $result = mysqli_query($connect, $query);
        $query2 = "SELECT * FROM follower WHERE CustomerID ='$cID'";
        $result2 = mysqli_query($connect, $query2);
        if (mysqli_num_rows($result) > 0) {
            foreach($result as $row) {
                if (mysqli_num_rows($result2) > 0) {
                    $followingFlag = false;
                    foreach($result2 as $row2) {
                        if($row['VendorID'] == $row2['VendorID']) {
                            $followingFlag = true;
                        }
                    }
                        if($followingFlag == false) {
                            ?>
                                <div>
                                    <span><?php echo($row['Username']) ?></span>
                                    <form name="VendorID-<?php echo($row['VendorID']) ?>" action="customer-follow-vendor.php" method="post">
                                        <input type="hidden" value="<?php echo($row['VendorID']) ?>" name="vendor_id">
                                        <input type="hidden" value="<?php echo($_SESSION['id']) ?>" name="customer_id">
                                        <button type="submit" name = 'submit' value="submit">Follow</button>
                                        <!-- <button type="submit" name = 'submit' value="submit">Create Account</button> -->
                                    </form>
                                    <br><br>
                                </div>
                            <?php
                        } elseif ($followingFlag == true) {
                            ?>
                                <div>
                                    <span><?php echo($row['Username']) ?></span>
                                    <form name="VendorID-<?php echo($row['VendorID']) ?>" action="customer-follow-vendor.php" method="post">
                                        <input type="hidden" value="<?php echo($row['VendorID']) ?>" name="vendor_id">
                                        <input type="hidden" value="<?php echo($_SESSION['id']) ?>" name="customer_id">
                                        <button type="submit" name = 'submit' value="submit" disabled>Following</button>
                                        <!-- <button type="submit" name = 'submit' value="submit">Create Account</button> -->
                                    </form>
                                    <br><br>
                                </div>
                            <?php
                        }

                } else {
                    ?>
                        <div>
                            <span><?php echo($row['Username']) ?><span>
                            <form name="VendorID-<?php echo($row['VendorID']) ?>" action="customer-follow-vendor.php" method="post">
                                <input type="hidden" value="<?php echo($row['VendorID']) ?>" name="vendor_id">
                                <input type="hidden" value="<?php echo($_SESSION['id']) ?>" name="customer_id">
                                <button type="submit" name = 'submit' value="submit">Follow</button>
                                <!-- <button type="submit" name = 'submit' value="submit">Create Account</button> -->
                            </form>
                            zzz
                            <br><br>
                        </div>
                    <?php
                }
            }
        }


        ?>
        </div>
      </div>
</div>
<?php include "includes/footer.inc.php"; ?>
</body>
</html>
