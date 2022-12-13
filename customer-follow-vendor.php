<?php
  /*
  Filename: customer-follow-vendor.php
  Description: funtionality behind customers following vendors
  Author: Sajid Rahman & Loren Pfeiffer
  */
?>

<?php
  date_default_timezone_set('America/New_York');
  session_start();
//  $_SESSION['id'] = $_GET['id'];
  $cID = $_SESSION['id'];

    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "fmc";
    $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

    if (!$conn) {
        die("<br>Connection failed: " . mysqli_connect_error());
    }
    $customer_id = $_SESSION['id'];
    $vendor_id = $_POST['vendor_id'];
    $sql = "INSERT INTO follower (CustomerID, VendorID)
        VALUES ('$customer_id', '$vendor_id')";

    if (mysqli_query($conn, $sql)) {
        echo "<br><br><h3>New record created successfully</h3>";
    } else {
        echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

    header("Location: customer-vendor.php?id=" . $cID);
    exit();
?>
