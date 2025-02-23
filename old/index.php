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
    /* General styles */
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }

    /* Navbar Styling */
    .navbar {
      background-color: #333;
      padding: 15px 0;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
      height: 75px;
      display: flex;
      align-items: center;
      padding: 0 20px;
      display: flex;
      align-items: center;
    }

    .navbar .icon .logo {
      color: #ff7200;
      font-size: 28px;
      margin-left: 20px;
    }

    .navbar .menu ul {
      list-style-type: none;
      padding: 0;
      margin: 0;
      text-align: right;
    }

    .navbar .menu ul li {
      display: inline-block;
      margin-right: 20px;
    }

    .navbar .menu ul li a,
    .navbar .menu ul li button a {
      color: white;
      font-size: 18px;
      text-decoration: none;
      padding: 5px 15px;
      display: inline-block;
      border-radius: 5px;
    }

    /* Hover Effects */
    .navbar .menu ul li a:hover,
    .navbar .menu ul li button a:hover {
      background-color: #f2a900;
      color: #fff;
      transition: background-color 0.3s ease;
    }

    /* Content Section Styling */
    .hai {
      margin-top: 100px;
      /* Space for fixed navbar */
      text-align: center;
    }

    .content {
      padding: 50px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .content h1 {
      font-size: 50px;
      font-weight: bold;
      color: #333;
      background-color: #f2f2f2;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      display: inline-block;
    }

    .content .par {
      font-size: 20px;
      color: #555;
      background: white;
      background-size: 10px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      text-align: center;
      /* updated text alignment */
      letter-spacing: 0.5px;
      /* updated letter spacing */
    }

    .content .cn a {
      text-decoration: none;
      color: white;
      background-color: #f2a900;
      background-size: 9px 44px;
      padding: 10px 44px;
      /* updated padding */
      border-radius: 5px;
      font-size: 18px;
    }

    .content .cn a:hover {
      background-color: #d87a00;
      background-size: contain;
    }

    /* Form Styling */
    .form {
      background-color: white (opacity);
      padding: 30px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      display: flex;
      flex-direction: column;
      align-items: center;
      border-radius: 8px;
      margin-left: auto;
      margin-top: 0px;
      width: 30%;
    }

    .form input[type="email"],
    .form input[type="password"] {
      width: 100%;
      box-sizing: border-box;
      padding: 10px;
      margin-bottom: 20px;
    }


    .form .btnn {
      background-color: #f2a900;
      color: white;
      border: none;
      padding: 12px 30px;
      font-size: 18px;
      cursor: pointer;
      border-radius: 5px;
      text-align: center;
      /* Add this line to center the text horizontally */
      line-height: 24px;
      /* Add this line to center the text vertically */
      height: 48px;
      /* Add this line to set the height of the button */
    }

    .form .btnn:hover {
      background-color: #d87a00;
      transition: background-color 0.3s ease;
    }

    /* Footer Style */
    .link a {
      text-decoration: none;
      color: #f2a900;
    }

    .link a:hover {
      color: #d87a00;
    }

    .toggle-password {
      cursor
    }

    .adminbtn {
      width: 100px;
      height: 40px;
      background: #ff7200;
      border: none;
      font-size: 18px;
      border-radius: 10px;
      cursor: pointer;
      color: white;
      transition: 0.4s ease;
    }

    .adminbtn:hover {
      background: #d87a00;
      color: #fff;
      transform: scale(1.1);
    }
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
          <li><a href="#">HOME</a></li>
          <li><a href="aboutus.html">ABOUT</a></li>
          <li><a href="contactus.html">CONTACT</a></li>
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