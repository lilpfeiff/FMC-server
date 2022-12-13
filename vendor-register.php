<?php
  /*
  Filename: vendor-register.php
  Description: page for vendors to submit an application into Farmers Market Connect
  Author: Loren Pfeiffer & Sajid Rahman
  */
?>

<!DOCTYPE html>

<html lang="en">

<head>

  <title>Farmers Market Connect</title>

  <link rel="stylesheet" href="css/stylesRegister.css">

  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
</head>

<body>
  <div class="background-image-register">
    <div class= "container">
      <h1>Farmers Market Connect</h1>
    </div>

    <?php

    date_default_timezone_set('America/New_York');

    $username=$email=$checkemail=$password=$checkpassword=$firstname=$lastname=$address=$workinglocations=$output_form=
    $valid_email=$checkemailvalid=$checkpasswordvalid="";

    $usernameErr=$emailErr=$checkemailErr=$passwordErr=$checkpasswordErr=$firstnameErr=$lastnameErr=$addressErr=$workinglocationsErr="";

    $valid_email=$checkemailvalid=$checkpasswordvalid=false;

    function test_input($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data, ENT_QUOTES);
      return $data;
    }

    session_start();

    /// Only Username will allow special characters. No other fields will accept Spec Chars when registering!! ///

    if(isset($_POST['submit'])){
      if (empty($_POST['username'])) {
        $nameErr = "<br>*Please type in your Username";
        $output_form = true;
      } else {
        $username=test_input($_POST['username']);
        $nameErr = "";
      }

      if (empty($_POST['email'])) {
        $emailErr = "<br>*Please type in your Email";
        $output_form = true;
      } else {
        $email=$_POST['email'];

        $connect = mysqli_connect("localhost","root","","fmc");
        $query = "SELECT * FROM Vendor WHERE Email='$email'";
        $result = mysqli_query($connect, $query);
        if ($row = mysqli_fetch_array($result)) {
          $emailErr = "<br>This Email is already registered";
          $output_form = true;
        } else {
          $emailErr = "";
          $valid_email = true;
        }
        mysqli_query($connect, $query);
      }

      if (empty($_POST['checkemail'])) {
        $checkemailErr = "<br>*Please re-type in your Email";
        $output_form = true;
      } else if  ($_POST['email']==$_POST['checkemail']) {
        $checkemail=$_POST['checkemail'];
        $checkemailErr = "";
        $checkemailvalid = true;
      } else {
        $checkemailErr = "<br>*Emails do not match";
        $output_form = true;
      }

      if (empty($_POST['password'])) {
        $passwordErr = "<br>*Please type in your password";
        $output_form = true;
      } else {
        $password=$_POST['password'];
        $passwordErr = "";
      }

      if (empty($_POST['checkpassword'])) {
        $checkpasswordErr = "<br>*Please re-type in your password";
        $output_form = true;
      } else if  ($_POST['password']==$_POST['checkpassword']) {
        $checkpassword=$_POST['checkpassword'];
        $checkpasswordErr = "";
        $checkpasswordvalid = true;
      } else {
        $checkpasswordErr = "<br>*Passwords do not match";
        $output_form = true;
      }

      if (empty($_POST['firstname'])) {
        $firstnameErr = "<br>*Please type in your first name";
        $output_form = true;
      } else {
        $firstname=$_POST['firstname'];
        $firstnameErr = "";
      }

      if (empty($_POST['lastname'])) {
        $lastnameErr = "<br>*Please type in your last name";
        $output_form = true;
      } else {
        $lastname=$_POST['lastname'];
        $lastnameErr = "";
      }

      if (empty($_POST['address'])) {
        $addressErr = "<br>*Please type in your address";
        $output_form = true;
      } else {
        $address=$_POST['address'];
        $addressErr = "";
      }

      if (empty($_POST['workinglocations'])) {
        $workinglocationsErr = "<br>*Please type in your working location(s)";
        $output_form = true;
      } else {
        $workinglocations=$_POST['workinglocations'];
        $workinglocationsErr = "";
      }


      if ((!empty($username)) && (!empty($email)) && (!empty($checkemail)) && (!empty($password)) && (!empty($checkpassword)) && (!empty($firstname)) && (!empty($lastname)) && (!empty($address)) && (!empty($workinglocations))
          && ($valid_email==true) && ($checkemailvalid==true) && ($checkpasswordvalid==true)) {

        //code to send to database
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "fmc";
        $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

        if (!$conn) {
          die("<br>Connection failed: " . mysqli_connect_error());
        }

        $sql = "INSERT INTO Vendor (Username, Email, PW, FirstName, LastName, Address, WorkingLocations)
          VALUES ('$username', '$email', '$password', '$firstname', '$lastname', '$address', '$workinglocations')";

        if (mysqli_query($conn, $sql)) {
          echo "<br><br><h3>New record created successfully</h3>";
        } else {
          echo "<br>Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);

        $output_form = false;
      }

    } else {
      $output_form = true;
    }

    if ($output_form) {
    ?>


    <div class="register">
      <img src="images/logo4.png" class="avatar">
      <h2>Create Account</h2>
      <form id="registerForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <label for="username">Username: </label><input type="text" name="username" value="<?php echo $username; ?>" id="username">
        <?php echo $usernameErr; ?><br>
        <label for="email">Email: </label><input type="text" name="email" value="<?php echo $email; ?>" id="email">
        <?php echo $emailErr; ?><br>
        <label for="checkemail">Confirm Email: </label><input type="text" name="checkemail" value="<?php echo $checkemail; ?>">
        <?php echo $checkemailErr; ?><br>
        <label for="password">Password: </label><input type="password" name="password" value="<?php echo $password; ?>">
        <?php echo $passwordErr; ?><br>
        <label for="checkpassword">Confirm Password: </label><input type="password" name="checkpassword" value="<?php echo $checkpassword; ?>">
        <?php echo $checkpasswordErr; ?><br>
        <label for="firstname">First Name: </label><input type="text" name="firstname" value="<?php echo $firstname; ?>">
        <?php echo $firstnameErr; ?><br>
        <label for="lastname">Last Name: </label><input type="text" name="lastname" value="<?php echo $lastname; ?>">
        <?php echo $lastnameErr; ?><br>
        <label for="address">Address: </label><input type="text" name="address" value="<?php echo $address; ?>">
        <?php echo $addressErr; ?><br>
        <label for="workinglocations">Working Locations: </label>
        <select class="workinglocations" name="workinglocations" style="text-align: center;" value="<?php echo $workinglocations; ?>">
          <option value="">Please select your Primary Working Location</option>
          <option value="FRESHFARM Dupont Circle Market">FRESHFARM Dupont Circle Market</option>
          <option value="Columbia Heights Farmers Market">Columbia Heights Farmers Market</option>
          <option value="Silver Spring Farmers Markets">Silver Spring Farmers Market</option>
          <option value="FRESHFARM Penn Quarter Market">FRESHFARM Penn Quarter Market</option>
          <option value="FRESHFARM Oakton Farmers Market">FRESHFARM Oakton Farmers Market</option>
        </select>
        <?php echo $workinglocations; ?><br>
        <!-- <input type="submit" name="submit" value="Create Account"> -->
        <button type="submit" name = 'submit' value="submit">Create Account</button>
        </form>
    </div>

    <?php
    } else {
      $_SESSION['username']=test_input($_POST['username']);
      header("Location: vendor-appsubmitted.php");
      exit();
    }
    ?>

</body>

</html>
