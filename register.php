<?php include('includes/functions.php') ?>
<?php
if (isset($_SESSION['user'])) {
  if ($_SESSION['user']->access_id == 1 || $_SESSION['user']->access_id == 2) {
    header('location:admin');
  } else if ($_SESSION['user']->access_id == 3) {
    header('location:client/index.php');
    include('fetch_cars.php');
  }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>REGISTRATION</title>
  <link rel="stylesheet" href="css/regs.css" type="text/css">
  <style>
    body {
      background-image: url('images/carbg2.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    input#psw {
      width: 300px;
      border: 1px solid #ddd;
      border-radius: 3px;
      outline: 0;
      padding: 7px;
      background-color: #fff;
      box-shadow: inset 1px 1px 5px rgba(0, 0, 0, 0.3);
    }

    input#cpsw {
      width: 300px;
      border: 1px solid #ddd;
      border-radius: 3px;
      outline: 0;
      padding: 7px;
      background-color: #fff;
      box-shadow: inset 1px 1px 5px rgba(0, 0, 0, 0.3);
    }

    #message {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #fff;
      border: 1px solid #ddd;
      padding: 20px;
      width: 300px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      z-index: 1;
      display: none;
    }

    #message h3 {
      margin-top: 0;
    }

    #message p {
      margin-bottom: 10px;
    }

    .valid {
      color: green;
    }

    .valid:before {
      content: "✔";
      margin-right: 5px;
    }

    .invalid {
      color: red;
    }

    .invalid:before {
      content: "✖";
      margin-right: 5px;
    }

    #fam {
      position: absolute;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      font-size: 40px;
      background-color: #ff7200;
      color: #fff;
      padding: 10px 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      white-space: nowrap;
      text-align: center;
      max-width: 500px;
      margin: 0 auto;
    }

    .main {
      margin-top: 50px;
    }

    input[type="submit"].btnn {
      background-color: #ff7200;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    input[type="submit"].btnn:hover {
      background-color: #ff9900;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    #back {
      position: absolute;
      top: 10px;
      right: 10px;
      background-color: #ff7200;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    #back:hover {
      background-color: #ff9900;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
  </style>

</head>

<body>

  <?php

  // Database connection

  if (isset($_POST['regs'])) {
    extract(array_merge($_POST, $_FILES));

    $Pass = password_hash($pass, PASSWORD_BCRYPT);

    if (empty($fname) || empty($lname) || empty($email) || empty($lic) || empty($ph) || empty($pass) || empty($gender)) {
      echo error_message("please fill the place");
    } else {
      if ($pass == $cpass) {
        $sql2 = "SELECT * from users where EMAIL='$email'";
        $result = mysqli_query($conn, $sql2);

        if (mysqli_num_rows($result) > 0) {
          echo error_message('EMAIL ALREADY EXISTS PRESS OK FOR LOGIN!!');
          echo '<script> window.location.href = "index.php";</script>';
        } else {
          $img = upload_pic($license_ss, "images");
          query("insert into users (FNAME,LNAME,EMAIL,LIC_NUM,PHONE_NUMBER,PASSWORD,GENDER,LICENSE_SS) values('$fname','$lname','$email','$lic',$ph,'$Pass','$gender','$img')");

          echo success_message('Registration Successful Press ok to login');
          echo '<script> window.location.href = "index.php";</script>';
        }
      } else {
        echo error_message('PASSWORD DID NOT MATCH');
        echo '<script> window.location.href = "register.php";</script>';
      }
    }
  }

  ?>

  <div id="fam">Join TZ CAR RENTAL</div>
  <button id="back" onclick="window.location.href='index.php'">HOME</button>
  <div class="main">
    <div style="margin-bottom: 20px;"></div>
    <div class="register">
      <form id="register" method="POST" enctype="multipart/form-data">
        <h2>Register Here</h2>
        <label>First Name : </label>
        <br>
        <input type="text" name="fname"
          id="name" placeholder="Enter Your First Name" required>
        <br><br>

        <label>Last Name : </label>
        <br>
        <input type="text" name="lname"
          id="name" placeholder="Enter Your Last Name" required>
        <br><br>

        <label>Email : </label>
        <br>
        <input type="email" name="email"
          id="name" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="ex: example@ex.com" placeholder="Enter Valid Email" required>
        <br><br>

        <label>Your License number : </label>
        <br>
        <input type="text" name="lic"
          id="name" placeholder="Enter Your License number" required>
        <br><br>
        <label>License Screenshot : </label>
        <br>
        <input type="file" name="license_ss" required>
        <br><br>
        <label>Phone Number : </label>
        <br>
        <input type="tel" name="ph" maxlength="10" onkeypress="return onlyNumberKey(event)"
          id="name" placeholder="Enter Your Phone Number" required>
        <br><br>



        <label>Password : </label>
        <br>
        <input type="password" name="pass" maxlength="12"
          id="psw" placeholder="Enter Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
        <br><br>
        <label>Confirm Password : </label>
        <br>
        <input type="password" name="cpass"
          id="cpsw" placeholder="Renter the password" required>
        <br><br>
        <tr>
          <td>
            <label">Gender : </label>
          </td><br>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<td>
            <label for="one">Male</label>
            <input type="radio" id="input_enabled" name="gender" value="male" style="width:200px">
          </td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <td>
            <label for="two">Female</label>
            <input type="radio" id="input_disabled" name="gender" value="female" style="width:160px" />
          </td>
        </tr>
        <br><br>

        <input type="submit" class="btnn" value="REGISTER" name="regs">

      </form>
    </div>
  </div>
  <div id="message">
    <h3>Password must contain the following:</h3>
    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
    <p id="number" class="invalid">A <b>number</b></p>
    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
  </div>
  <script>
    var myInput = document.getElementById("psw");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
      document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
      document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if (myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove("invalid");
        letter.classList.add("valid");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
      }

      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if (myInput.value.match(upperCaseLetters)) {
        capital.classList.remove("invalid");
        capital.classList.add("valid");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
      }

      // Validate numbers
      var numbers = /[0-9]/g;
      if (myInput.value.match(numbers)) {
        number.classList.remove("invalid");
        number.classList.add("valid");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
      }

      // Validate length
      if (myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
      }
    }
  </script>
  <script>
    function onlyNumberKey(evt) {

      // Only ASCII character in that range allowed
      var ASCIICode = (evt.which) ? evt.which : evt.keyCode
      if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
        return false;
      return true;
    }
  </script>
</body>

</html>