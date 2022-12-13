<?php
  /*
  Filename: vendor-login.php
  Description: login page for vendors
  Author: Loren Pfeiffer & Sajid Rahman
  */
?>

<!DOCTYPE html>

<html lang="en">

<head>
  <title>Farmers Market Connect</title>

  <link rel="stylesheet" href="css/stylesLogin.css">

  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
</head>

<body>
  <div class="background-image-login">
    <div class= "container">
      <h1>Farmers Market Connect</h1>
    </div>

    <div class="container">

      <?php
        date_default_timezone_set('America/New_York');

        function test_input($data){
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data, ENT_QUOTES);
          return $data;
        }

        session_start();

        if(isset($_POST['loginSubmit'])){
          $username=test_input($_POST['username']);
          $logpassword=$_POST['password'];


            if($username&&$logpassword){

              $connect=mysqli_connect("localhost","root","", "fmc") or die ("Could not connect to database.");

              $sql="SELECT * FROM Vendor WHERE Username='$username' ";
              $query=mysqli_query($connect,$sql);
              $numrows=mysqli_num_rows($query);

                  if($numrows!=0){

                    while($row=mysqli_fetch_assoc($query)){
                      $dbUsername=$row['Username'];
                      $dbpassword=$row['PW'];
                      $vID = $row['VendorID'];
                      $vFN = $row['FirstName'];
                    }

                        if ($username==$dbUsername && $logpassword==$dbpassword){

                          $_SESSION['username']=$username;
                        //  $_SESSION['vendorFirstName'] = $vFN;
                         $_SESSION['id'] = $row['VendorID'];
                          header("Location: vendor-home.php?id=" . $vID . "&vFN=" . $vFN);
                          exit();



                        } else {
                          ?>
                            <div class="loginbox">
                              <img src="images/logo4.png" class="avatar">
                              <h2>Login Here</h2>
                              <form id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                <label for="username">Username: </label>
                                <input type="text" name="username" placeholder="Enter Username" value="" id="username">
                                <br>
                                <label for="password">Password: </label>
                                <input type="password" name="password" placeholder="Enter Password" value="" id="password">
                                <br><br>
                                <input type="checkbox" onclick="showPassword()"> Show Password
                                <br><br>
                                <input type='hidden' name='lastpage' value='<?php echo $lastpage; ?>'>
                                <button type="submit" name = 'loginSubmit' form="loginForm" value="submit">Login</button>
                                <span class= "errorMessage">Incorrect password. Please retry or sign up.</span>
                                <br><br>
                                <a href="register-vendor.php">Create Account</a>
                                <a href="index-forgotpassword.php">Forgot Password</a>
                                </form>

                              <script type="text/javascript">
                                function showPassword() {
                                  var x = document.getElementById("password");
                                  if (x.type === "password") {
                                    x.type = "text";
                                  } else {
                                    x.type = "password";
                                  }
                                }
                              </script>

                              </div>

                          <?php
                        }

                  } else {
                      ?>
                      <div class="loginbox">
                        <img src="images/logo4.png" class="avatar">
                        <h2>Login Here</h2>
                        <form id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                          <label for="username">Username: </label>
                          <input type="text" name="username" placeholder="Enter Username" value="" id="username">
                          <br>
                          <label for="password">Password: </label>
                          <input type="password" name="password" placeholder="Enter Password" value="" id="password">
                          <br><br>
                          <input type="checkbox" onclick="showPassword()"> Show Password
                          <br><br>
                          <input type='hidden' name='lastpage' value='<?php echo $lastpage; ?>'>
                          <button type="submit" name = 'loginSubmit' form="loginForm" value="submit">Login</button>
                          <span class= "errorMessage">User does not exist. Please retry or sign up.</span>
                          <br><br>
                          <a href="register-vendor.php">Create Account</a>
                          <a href="index-forgotpassword.php">Forgot Password</a>
                          </form>

                        <script type="text/javascript">
                          function showPassword() {
                            var x = document.getElementById("password");
                            if (x.type === "password") {
                              x.type = "text";
                            } else {
                              x.type = "password";
                            }
                          }
                        </script>

                        </div>

                    <?php
                  }

            } else {
              ?>

            <div class="loginbox">
              <img src="images/logo4.png" class="avatar">
              <h2>Login Here</h2>
              <form id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <label for="username">Username: </label>
                <input type="text" name="username" placeholder="Enter Username" value="" id="username">
                <br>
                <label for="password">Password: </label>
                <input type="password" name="password" placeholder="Enter Password" value="" id="password">
                <br><br>
                <input type="checkbox" onclick="showPassword()"> Show Password
                <br><br>
                <input type='hidden' name='lastpage' value='<?php echo $lastpage; ?>'>
                <button type="submit" name = 'loginSubmit' form="loginForm" value="submit">Login</button>
                <span class= "errorMessage">Please enter email and password.</span>
                <br><br>
                <a href="vendor-register.php">Create Account</a>
                <a href="index-forgotpassword.php">Forgot Password</a>
                </form>

              <script type="text/javascript">
                function showPassword() {
                  var x = document.getElementById("password");
                  if (x.type === "password") {
                    x.type = "text";
                  } else {
                    x.type = "password";
                  }
                }
              </script>

              </div>

        <?php
        }
        } else {
        ?>

        <div class="loginbox">
        <img src="images/logo4.png" class="avatar">
        <h2>Login Here</h2>
        <form id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
          <label for="username">Username: </label>
          <input type="text" name="username" placeholder="Enter Username" value="" id="username">
          <br>
          <label for="password">Password: </label>
          <input type="password" name="password" placeholder="Enter Password" value="" id="password">
          <br><br>
          <input type="checkbox" onclick="showPassword()"> Show Password
          <br><br>
          <button type="submit" name = 'loginSubmit' form="loginForm" value="submit">Login</button>
          <br><br>
          <a href="vendor-register.php">Create Account</a>
          <a href="index-forgotpassword.php">Forgot Password</a>
        </form>

        <script type="text/javascript">
          function showPassword() {
            var x = document.getElementById("password");
            if (x.type === "password") {
              x.type = "text";
            } else {
              x.type = "password";
            }
          }

        </script>
        </div>
        <?php
        }
        ?>
    </div>
  </div>
</body>
</html>
