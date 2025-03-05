<?php include('../includes/functions.php') ?>
<?php
if (isset($_SESSION['user'])) {
  if ($_SESSION['user']->access_id == 3) {
  } else {
    header('location:../logout.php');
  }
} ?>
<!DOCTYPE html>
<html>

<head>
  <title>Home</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <link rel="stylesheet" href="Stylesheet.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {
      background-image: url("../images/carbg2.jpg");
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      background-position: center;
    }

    .container {
      background-color: #fff;
      padding: 20px;
      margin: 50px auto;
      width: 80%;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      border-radius: 10px;
    }

    @media only screen and (max-width: 768px) {
      .container {
        width: 90%;
      }
    }

    @media only screen and (max-width: 480px) {
      .container {
        width: 100%;
        padding: 10px;
      }

      .col-sm-6 {
        width: 100%;
      }
    }

    .contact-us {
      font-size: 72px;
      color: #000;
      font-weight: bold;
      text-align: center;
      margin-bottom: 20px;
    }

    .contact-us strong {
      font-size: 5cm;
      color: #555;
    }

    .form-container {
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-control {
      padding: 10px;
      font-size: 18px;
      border: 1px solid #ccc;
      border-radius: 5px;
      width: 100%;
    }

    .form-control:focus {
      border-color: #ff7200;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    button.btn {
      background-color: #ff7200;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 18px;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s ease-in-out;
    }

    button.btn:hover {
      background-color: #ff9900;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    input[type="submit"].btn.btn-info {
      background-color: #ff7200;
      color: #fff;
      border: none;
      padding: 10px 20px;
      font-size: 18px;
      cursor: pointer;
      border-radius: 5px;
      transition: background-color 0.3s ease-in-out;
      width: 100%;
      text-align: center;
    }

    input[type="submit"].btn.btn-info:hover {
      background-color: #ff9900;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .back-to-home-btn {
      margin-left: 100px;
      margin-top: 25px;
      position: absolute;
      top: 0;
      left: 0;
    }
  </style>
</head>

<style>
  * {
    margin: 0;
    padding: 0;

  }


  .navbar {
    height: 75px;
    background-color: #333;
    padding: 10px;
    border-radius: 0px;
    display: flex;
    justify-content: space-between;
  }

  .icon {
    float: left;
    height: 70px;
  }

  .logo {
    color: #ff7200;
    font-size: 35px;
    font-family: Arial;
    padding-left: 20px;
    float: left;
    padding-top: 10px;
  }

  .menu {
    float: left;
    height: 70px;

  }

  ul {
    float: left;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  ul li {
    list-style: none;
    margin-left: 62px;
    margin-top: 27px;
    font-size: 14px;

  }

  ul li a {
    color: #fff;
    text-decoration: none;
    font-family: Arial;
    font-weight: bold;
    transition: 0.4s ease-in-out;
  }

  ul li a:hover {
    color: #ff9900;
  }

  .content-table {
    border-collapse: collapse;
    font-size: 1em;
    min-width: 400px;
    border-radius: 5px 5px 0 0;
    overflow: hidden;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    margin: 0 auto;
    margin-top: 25px;
    width: 1300px;
    height: 300px;
    color: #333;
    background: linear-gradient(to bottom, #ffffff, #f0f0f0);
    /* Add a gradient background */

  }

  .content-table thead tr {
    background-color: orange;
    color: white;
    text-align: center;
  }

  .content-table th,
  .content-table td {
    padding: 12px 15px;
    text-align: center;
    color: #333;
  }

  .content-table tbody tr {
    border-bottom: 1px solid #dddddd;
  }

  .content-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;

  }

  .content-table tbody tr:last-of-type {
    border-bottom: 2px solid orange;
  }

  .content-table thead .active-row {
    font-weight: bold;
    color: orange;
  }


  .header {
    margin-top: 20px;
    margin-left: 0;
    text-align: center;
  }


  .nn {
    width: 100px;
    background: #ff7200;
    border: none;
    height: 40px;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color: white;
    transition: 0.4s ease;
  }

  .nn:hover {
    background: #ff9900;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }

  .nn a {
    text-decoration: none;
    color: black;
    font-weight: bold;
  }

  .add {
    width: 200px;
    height: 40px;

    background: #ff7200;
    border: none;
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color: #fff;
    transition: 0.4s ease;
    margin: 0 auto;
  }

  .add:hover {
    background: #ff9900;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }

  .add a {
    text-decoration: none;
    color: black;
    font-weight: bolder;

  }

  .but {
    width: 100px;
    height: 30px;
    background: #ff7200;
    border: none;
    font-size: 14px;
    border-radius: 10px;
    cursor: pointer;
    color: #fff;
    transition: 0.4s ease;
  }

  .but:hover {
    background: #ff9900;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }

  .but a {
    text-decoration: none;
    color: black;
  }


  .main {
    width: 400px;
    margin: 100px auto 0px auto;
    margin-top: 30px;
  }

  .btnn {
    width: 240px;
    height: 40px;
    background: #ff7200;
    border: none;
    margin-top: 30px;
    /* margin-left: 40px; */
    font-size: 18px;
    border-radius: 10px;
    cursor: pointer;
    color: #fff;
    transition: 0.4s ease;
    width: 100%;
  }

  .btnn:hover {
    background: #fff;
    color: #ff7200;
  }

  .btnn a {
    text-decoration: none;
    color: black;
    font-weight: bold;
  }

  h2 {
    text-align: center;
    padding: 20px;
    font-family: sans-serif;

  }

  .register {
    background-color: rgba(0, 0, 0, 0.6);
    width: fit-content;
    font-size: 18px;
    border-radius: 10px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 2px 2px 15px rgba(0, 0, 0, 0.3);
    color: #fff;

  }

  form#register {
    margin: 40px;
    margin-top: 10px;

  }

  label {
    font-family: sans-serif;
    font-size: 18px;
    font-style: italic;
  }

  input#name {
    width: 300px;
    border: 1px solid #ddd;
    border-radius: 3px;
    outline: 0;
    padding: 7px;
    background-color: #fff;
    box-shadow: inset 1px 1px 5px rgba(0, 0, 0, 0.3);
  }


  #back {
    width: 100px;
    height: 40px;
    background: #ff7200;
    border: none;
    margin-top: 10px;
    margin-left: 20px;
    font-size: 18px;
    border-radius: 25px;
  }


  #back a {
    text-decoration: none;
    color: black;
    font-weight: bold;

  }

  #back a:hover {
    background: #be5300;
    color: #ff7200;

  }

  #fam {
    color: #ff7200;
    font-family: 'Times New Roman';
    font-size: 50px;
    padding-left: 20px;
    margin-top: -10px;
    text-align: center;
    letter-spacing: 2px;
    display: inline;
    margin-left: 250px;
  }

  .reg {
    width: 100%;
  }

  .logout-button {
    width: 100px;
    height: 40px;
    background: #ff7200;
    border: none;
    font-size: 18px;
    border-radius: 1000px;
    cursor: pointer;
    color: white;
    transition: 0.4s ease;
    padding: 0.5em 1em;
    /* Add padding to make the background proportionate */
  }

  .logout-button:hover {
    background-color: #e65c00;
    transform: scale(1.05);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
  }

  .form-input {
    width: 100% !important;
    padding: 10px;
    font-size: 18px;
    border: 1px solid #ddd;
  }
</style>


<?= (isset($_POST['submit'])) ? updateUser($_POST) : ''; ?>
<?php $data = get_one("select * from users where EMAIL = '" . $_SESSION['user']->EMAIL . "'") ?>

<div class="navbar">
  <div class="icon">
    <h2 class="logo">TZ CAR RENTAL (URDANETA)</h2>
  </div>
  <div class="menu">
    <ul>
      <li><a href="index.php">HOME</a></li>
      <li><a href="aboutus.php">ABOUT</a></li>
      <li><a href="contactus.php">CONTACT</a></li>
      <li><a href="create_feedback.php">FEEDBACK</a></li>
      <li><a href="../logout.php" class="logout-button">LOGOUT</a></li>
      <li>
        <a href="profile.php">
          <img src="../images/profile.png" alt="Profile" width="30" height="30" style="border-radius: 50%;">
        </a>
      </li>
      <li>
        <p class="phello" style="color: white;">HELLO! &nbsp;<a id="pname"><?= $_SESSION['user']->FNAME . " " . $_SESSION['user']->LNAME ?></a></p>
      </li>
      <li><a id="stat" href="bookinstatus.php">RENT STATUS</a></li>
    </ul>
  </div>
</div>
<div class="register" style="width: 80%; margin: 40px auto;">
  <h2>Profile</h2>
  <form id="register" method="POST">
    <label>Firstname : </label>
    <br>
    <input type="text" name="fname" id="name" placeholder="Enter Your First Name" required="" class="form-input" value="<?= $data->FNAME ?>">
    <br><br>
    <label>Last : </label>
    <br>
    <input type="text" name="lname" id="name" placeholder="Enter Your Last Name" required="" class="form-input" value="<?= $data->LNAME ?>">
    <br><br>
    <label>Email : </label>
    <br>
    <input type="email" name="email" id="name" placeholder="Enter Your Email" required="" class="form-input" value="<?= $data->EMAIL ?>">
    <br><br>
    <label>License Number : </label>
    <br>
    <input type="text" name="lic" id="name" placeholder="Enter Your Licensed Number" required="" class="form-input" value="<?= $data->LIC_NUM ?>">
    <br><br>
    <label>Phone Number : </label>
    <br>
    <input type="tel" name="ph" id="name" required="" class="form-input" value="<?= $data->PHONE_NUMBER ?>" maxlength="10" onkeypress="return onlyNumberKey(event)" id="name" placeholder="Enter Your Phone Number">
    <br><br>
    <label>Password : </label>
    <br>
    <input type="password" name="pass" maxlength="12" id="psw" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="" class="form-input">
    <br><br>
    <label>Gender : </label>
    <br>
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <label for="one">Male</label>
    <input type="radio" id="input_enabled" name="gender" value="male" style="width:200px" required <?= $data->GENDER == 'male' ? "checked" : "" ?>>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <label for="two">Female</label>
    <input type="radio" id="input_disabled" name="gender" value="female" style="width:160px" required <?= $data->GENDER == 'female' ? "checked" : "" ?>>

    <br><br>
    <input type="submit" class="btnn" value="Update" name="submit">
  </form>
</div>
</body>

</html>