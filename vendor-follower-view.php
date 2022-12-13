<?php
  /*
  Filename: vendor-follower-view.php
  Description: page for vendors to view their followers
  Author: Sajid Rahman & Loren Pfeiffer
  */

  date_default_timezone_set('America/New_York');
  session_start();
	$vID = $_GET['id'];
  $vFN = $_GET['vFN'];
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <title>Farmers Market Connect</title>

  <link rel="stylesheet" type="text/css" href="css/stylesHome.css">
  <link rel="stylesheet" type="text/css" href="css/stylesVendor.css">

	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&family=Quicksand:wght@300;500&display=swap" rel="stylesheet">
	<!--<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">

</head>

<body>
  <?php include "includes/headV.inc.php"; ?>
    <div class="background-image-follower">
  <!--  <h1>Farmers Market Connect</h1>-->
    <h3>My Followers:</h3>

        <div class="followercontainer">

        <?php
      //  session_start();

        $connect = mysqli_connect("localhost","root","","fmc");

        $query = "SELECT * FROM customer";
        $result = mysqli_query($connect, $query);
        $query2 = "SELECT * FROM follower WHERE VendorID ='$vID'";
        $result2 = mysqli_query($connect, $query2);
        if (mysqli_num_rows($result) > 0) {
            foreach($result as $row) {
                if (mysqli_num_rows($result2) > 0) {
                    $followingFlag = false;
                    foreach($result2 as $row2) {
                        if($row['CustomerID'] == $row2['CustomerID']) {
                            $followingFlag = true;
                        }
                    }
                        if ($followingFlag == true) {
                            ?>
                                <div class="followercard">
                                    <span>Username: <?php echo($row['Username']) ?></span><br>
                                    <span>Email: <?php echo($row['Email']) ?></span><br>
                                    <span>Name: <?php echo($row['FirstName'] . " " . $row['LastName']) ?></span><br>
                                    <br>
                                </div>
                            <?php
                        }

                        } else {
                            ?>

                            <?php
                        }
            }
        }
        ?>


        </div>
</div>

<?php include "includes/footer.inc.php"; ?>

</body>
</html>
