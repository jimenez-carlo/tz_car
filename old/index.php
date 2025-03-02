<?php include('includes/functions.php') ?>
<?php
if (isset($_SESSION['user'])) {
  if ($_SESSION['user']->access_id == 1 || $_SESSION['user']->access_id == 2) {
    header('location:admin');
  } else if ($_SESSION['user']->access_id == 3) {
    header('location:client');
  }
} ?>
<?= (isset($_POST['submit'])) ? loginUser($_POST) : ''; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>CAR RENTAL</title>
  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <div class="hai">
    <div class="navbar">
      <div class="icon">
        <h2 class="logo">TZ CAR RENTAL (URDANETA)</h2>
      </div>
      <div class="menu">
        <ul>
          <li><a href="#">HOME</a></li>
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
          <input type="email" name="username" placeholder="Enter Email Here">
          <input type="password" name="password" placeholder="Enter Password Here">
          <input class="btnn" type="submit" value="Login" name="submit">
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