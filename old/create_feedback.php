<!doctype html>
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
    body{
      background-image: url('images/meshbg.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      background-position: center;
      font-family: Arial, sans-serif;
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
<body>
  <?php
  require_once('connection.php');
  session_start();
  $email = $_SESSION['email'];

  if(isset($_POST['submit'])){
    $comment=mysqli_real_escape_string($con,$_POST['comment']);
    $sql="insert into  feedback (EMAIL,COMMENT) values('$email','$comment')";
    $result = mysqli_query($con,$sql);
    if ($result) {
      header('Location: http://localhost/tzcarrental/create_feedback.php');
      exit;
    } else {
      echo '<script>alert("Error sending feedback. Please try again.");</script>';
    }
  }
  ?>
  <<a href="cardetails.php">
  <button class="btn back-to-home-btn">
    Back to home
  </button>
</a>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="contact-us"><strong>F</strong>eedback.</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-container">
          <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
              <label for="name" style="font-size: 18px; margin-bottom: 10px;">Name:</label>
              <input type="text" name="name" size="20"  class="form-control" placeholder="User                         name" required />
            </div>
            <div class="form-group">
              <label for="comment" style="font-size: 18px; margin-bottom: 10px;">Comments:</label>
              <textarea class="form-control"   name="comment" rows="6"  placeholder="Message"  required></textarea>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-info" id="btn" style="text-shadow:0 0 3px #000000; font-size:24px;" value="SUBMIT" name="submit">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>