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
}

    /* Add hover effect to the back button */
    button.btn {
      transition: background-color 0.3s ease-in-out;
    }

    button.btn:hover {
      background-color: #ff9900; /* Change the background color on hover */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a box shadow on hover */
    }

    /* Add hover effect to the submit button */
    input[type="submit"].btn.btn-info {
      transition: background-color 0.3s ease-in-out;
    }

    input[type="submit"].btn.btn-info:hover {
      background-color: #66CCCC; /* Change the background color on hover */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* Add a box shadow on hover */
    }
  </style>
</head>
<body>
  <?php
  require_once('../connection.php');
  session_start();
  $email = $_SESSION['email'];

  if(isset($_POST['submit'])){
    $comment=mysqli_real_escape_string($con,$_POST['comment']);
    $sql="insert into  feedback (EMAIL,COMMENT) values('$email','$comment')";
    $result = mysqli_query($con,$sql);
    if ($result) {
      echo '<script>alert("Feedback Sent Successfully!!THANK YOU!!"); window.location.href = "../cardetails.php";</script>';
    } else {
      echo '<script>alert("Error sending feedback. Please try again.");</script>';
    }
  }
  ?>
  <button class="btn" style="
    width: 150px;
    background: orange;
    color: #fff;
    border: none;
    cursor: pointer;
    padding: 10px;
    font-size: 18px;
    margin-left:100px;
    margin-top:25px;
  "><a href="../cardetails.php" style="
    text-decoration: none;
    color: #fff;">Back to home</a></button>
  <br><br><br>
  <div id="form">
    <div class="col-md-12" id="mainform">
      <div class="col-sm-6">
        <h2 class="contact-us" style="font-size:72px; color:#000;"><strong style="font-size:5cm; color:#555;">F</strong>eedback.</h2>
      </div>
      <div class="col-sm-6">
        <form method="POST">
          <label><h4>Name:</h4> </label><input type="text" name="name" size="20"  class=" form-control" placeholder="User        name" required />
          <h4>Comments:</h4><textarea class="form-control"   name="comment" rows="6"  placeholder="Message"  required></textarea>
          <br>
          <input type="submit" class="btn btn-info" id="btn" style="text-shadow:0 0 3px #000000; font-size:24px;" value="SUBMIT" name="submit">
        </form>
      </div>
    </div>
  </div>
</body>
</html>