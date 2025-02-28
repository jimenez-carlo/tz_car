<?php
ob_start();

require_once('connection.php');

if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  if (empty($email) || empty($pass)) {
    echo '<script>alert("please fill the blanks")</script>';
  } else {
    $query = "select *from users where EMAIL='$email'";
    $res = mysqli_query($con, $query);

    if ($res === FALSE) {
      echo '<script>alert("Database query error")</script>';
    } else {
      if ($row = mysqli_fetch_assoc($res)) {
        $db_password = $row['PASSWORD'];

        if (md5($pass) == $db_password) {
          // Redirect to car details page
          header("location: cardetails.php");
          session_start();
          $_SESSION['email'] = $email;
          exit; // Add exit to prevent further execution
        } else {
          echo '<script>alert("Enter a proper password")</script>';
        }
      } else {
        echo '<script>alert("enter a proper email")</script>';
      }
    }
  }
}

ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>CAR RENTAL</title>
  <link rel="stylesheet" href="css/style.css">
  <style>

  </style>
</head>

<body>

  <div class="hai">
    <div class="navbar">
      <div class="icon">
        <h2 class="logo">TZ CAR RENTAL (URDANETA)</h2>
      </div>
      <div class="menu">
        <ul>
          <li><a href="index.php">HOME</a></li>
          <li><a href="aboutus.php">ABOUT</a></li>
          <li><a href="contactus.php">CONTACT</a></li>
          <li><button class="adminbtn"><a href="adminlogin.php">ADMIN</a></button></li>
          </li>
        </ul>
      </div>
    </div>
    <div class="content">
      <div>
        <h1>Rent your Car <br><span>at TZ CAR RENTAL (URDANETA)</span></h1>
        <p class="par">Here at TZ CAR RENTAL (URDANETA)<br>
          Urdaneta, Pangasinan<br>Enjoy every moment with your family<br>
          We offer a wide range of cars for rent and fast response!</p>
        <button class="cn"><a href="register.php">JOIN US</a></button>
      </div>
      <div class="form">
        <h2>Login Here</h2>
        <form method="POST">
          <input type="email" name="email" placeholder="Enter Email Here">
          <input type="password" name="pass" placeholder="Enter Password Here">
          <input class="btnn" type="submit" value="Login" name="login">
        </form>
        <p class="link">Don't have an account?<br>
          <a href="register.php">Sign up</a> here
        </p>
      </div>
    </div>
  </div>

  <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>

</html>