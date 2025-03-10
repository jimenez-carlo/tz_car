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
  <style>
    * {
      margin: 0;
      padding: 0;

    }

    .hai {
      width: 100%;
      background: linear-gradient(to top, rgba(0, 0, 0, 0)50%, rgba(0, 0, 0, 0)50%), url("../images/carbg2.jpg");
      background-position: center;
      background-size: cover;
      height: 109vh;
      animation: infiniteScrollBg 50s linear infinite;
      margin-top: 75px;
      display: flex;
      flex-direction: column;
      align-items: center;
      background-image: url(images/carbg2.jpg);
    }

    .main {
      width: 100%;
      background: linear-gradient(to top, rgba(0, 0, 0, 0)50%, rgba(0, 0, 0, 0)50%);
      background-position: center;
      background-size: cover;
      height: 109vh;
      animation: infiniteScrollBg 50s linear infinite;
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
      color: #fff;
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
  </style>
  <style>
    .book-car-container {
      max-width: 800px;
      margin: 40px auto;
      padding: 20px;
      background-color: #f9f9f9;
      border: 1px solid #ddd;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .book-car-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .book-car-container fieldset {
      margin-bottom: 20px;
      border: none;
      padding: 0;
    }

    .book-car-container legend {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .book-car-container table {
      width: 100%;
      border-collapse: collapse;
    }

    .book-car-container th,
    .book-car-container td {
      padding: 10px;
      border: 1px solid #ddd;
    }

    .book-car-container th {
      background-color: #f0f0f0;
    }

    .book-car-container input[type="text"],
    .book-car-container input[type="date"],
    .book-car-container input[type="number"],
    .book-car-container textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .book-car-container input[type="text"]:disabled,
    .book-car-container input[type="date"]:disabled,
    .book-car-container input[type="number"]:disabled,
    .book-car-container textarea:disabled {
      background-color: #f9f9f9;
      cursor: not-allowed;
    }

    .book-car-container input[type="file"] {
      margin-bottom: 20px;
    }

    .book-car-container .btnn {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .book-car-container .btnn:hover {
      background-color: #3e8e41;
    }

    .row {
      display: flex;
      justify-content: space-between;
    }

    .col-md-6 {
      width: 50%;
      padding: 20px;
    }
  </style>
</head>

<body>



  <?php if (isset($_POST['submit'])) {
    $result = createBook(array_merge($_POST, $_FILES));
    if ($result) {
      echo "<script>alert('Booked Successfully!');</script>";
      echo "<script>window.location.href='index.php';</script>";
    } else {
      echo "<script>alert('Failed to book!');</script>";
    }
  } ?>


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
  <div class="hai">

    <?php
    $car_id = $_GET['car_id'];
    $car = get_one("select * from cars where CAR_ID = '$car_id'");
    ?>
    <div class="book-car-container">
      <h2>Transaction Detail</h2>
      <form id="register" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-6">
            <fieldset>
              <legend>Car Details</legend>
              <table>
                <tr>
                  <td colspan="2">
                    <img src="../images/<?= $car->CAR_IMG ?>" alt="" style="width:310px;height:150px">
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>Car Name:</label>
                  </td>
                  <td>
                    <input type="text" value="<?= $car->CAR_NAME ?>" disabled>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>Fuel Type:</label>
                  </td>
                  <td>
                    <input type="text" value="<?= $car->FUEL_TYPE ?>" disabled>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>Capacity:</label>
                  </td>
                  <td>
                    <input type="text" value="<?= $car->CAPACITY ?>" disabled>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>Price:</label>
                  </td>
                  <td>
                    <input type="text" value="<?= $car->PRICE ?>" disabled id="price">
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <label>license:</label>
                  </td>
                </tr>
                <tr>
                  <td colspan="2">
                    <img src="../images/<?= $_SESSION['user']->LICENSE_SS ?>" alt="" style="width:310px;height:150px">
                  </td>
                </tr>
              </table>
            </fieldset>
          </div>
          <div class="col-md-6">
            <fieldset>
              <legend>Booking Details</legend>
              <table>
                <tr>
                  <td>
                    <label>Book Date:</label>
                  </td>
                  <td>
                    <input type="datetime-local" name="book_date" required id="book_date">
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>Return Date:</label>
                  </td>
                  <td>
                    <input type="datetime-local" name="return_date" required id="return_date">
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>Duration:</label>
                  </td>
                  <td>
                    <input type="number" disabled id="duration">
                    <input type="hidden" name="duration" id="duration2">
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>Total:</label>
                  </td>
                  <td>
                    <input type="text" disabled id="total">
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>Phone No:</label>
                  </td>
                  <td>
                    <input type="number" name="phone_no" required>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>Book Place:</label>
                  </td>
                  <td>
                    <textarea name="book_place" rows="5" required></textarea>
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>Destination:</label>
                  </td>
                  <td>
                    <textarea name="destination" rows="5" required></textarea>
                  </td>
                </tr>
              </table>
            </fieldset>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <fieldset>
              <legend>Payment Details</legend>
              <table>
                <tr>
                  <td>
                    <label>Payment Method:</label>
                  </td>
                  <td>
                    <select id="payment-method" name="payment_method">
                      <option value="Gcash">Gcash</option>
                      <option value="Paymaya">Paymaya</option>
                      <option value="Cash on Delivery">Cash on Delivery</option>
                    </select>
                  </td>
                </tr>
                <tr id="gcash-image-row">
                  <td colspan="2">
                    <img src="../images/gcash.jpg" alt="" style="width:310px;height:450px" id="gcash-image" onclick="openImage('gcash-image')">
                  </td>
                </tr>
                <tr id="paymaya-image-row" style="display: none;">
                  <td colspan="2">
                    <img src="../images/paymaya.jpg" alt="" style="width:310px;height:450px" id="paymaya-image" onclick="openImage('paymaya-image')">
                  </td>
                </tr>
                <tr id="cod-image-row" style="display: none;">
                  <td colspan="2">
                    <img src="../images/cod.jpg" alt="" style="width:310px;height:450px" id="cod-image" onclick="openImage('cod-image')">
                  </td>
                </tr>
                <tr>
                  <td>
                    <label>Screenshot:</label>
                  </td>
                  <td>
                    <input type="file" name="image" required>
                  </td>
                </tr>
              </table>
            </fieldset>
          </div>
        </div>
        <input type="hidden" name="email" value="<?= $_SESSION['user']->EMAIL ?>">
        <input type="hidden" name="car_id" value="<?= $car->CAR_ID ?>">
        <input type="hidden" name="price" value="<?= $car->PRICE ?>">
        <input type="hidden" name=" book_status" value="UNDER PROCESSING">
        <input type="submit" class="btnn" value="BOOK" name="submit">
      </form>
    </div>
  </div>
  <script>
    function calculateDifference() {
      const startDate = document.getElementById('book_date').value;
      const endDate = document.getElementById('return_date').value;

      if (startDate && endDate) {
        // Convert the input values into Date objects
        const start = new Date(startDate);
        const end = new Date(endDate);

        start.setHours(0, 0, 0, 0);
        end.setHours(0, 0, 0, 0);
        // Calculate the difference in milliseconds
        const differenceInMilliseconds = end - start;

        // Convert milliseconds to days
        const differenceInDays = differenceInMilliseconds / (1000 * 60 * 60 * 24);

        // Display the result
        return Math.abs(differenceInDays);
      } else {
        return 1;
      }
    }

    document.getElementById("book_date").addEventListener("input", function() {
      let bookDate = document.getElementById("book_date").value;
      let returnDate = document.getElementById("return_date").value;
      let price = document.getElementById("price").value;
      let duration = document.getElementById("duration");
      let duration2 = document.getElementById("duration2");
      let total = document.getElementById("total");
      if (bookDate && returnDate) {
        total.value = parseFloat(price) * calculateDifference();
        duration.value = calculateDifference();
        duration2.value = calculateDifference();
      }
    });

    document.getElementById("return_date").addEventListener("input", function() {
      let bookDate = document.getElementById("book_date").value;
      let returnDate = document.getElementById("return_date").value;
      let price = document.getElementById("price").value;
      let duration = document.getElementById("duration");
      let duration2 = document.getElementById("duration2");
      let total = document.getElementById("total");

      if (bookDate && returnDate) {
        total.value = parseFloat(price) * calculateDifference();
        duration.value = calculateDifference();
        duration2.value = calculateDifference();
      }
    });
  </script>
  <script>
    document.getElementById("payment-method").addEventListener("change", function() {
      let paymentMethod = document.getElementById("payment-method").value;
      let gcashImageRow = document.getElementById("gcash-image-row");
      let paymayaImageRow = document.getElementById("paymaya-image-row");
      let codImageRow = document.getElementById("cod-image-row");

      if (paymentMethod === "Gcash") {
        gcashImageRow.style.display = "table-row";
        paymayaImageRow.style.display = "none";
        codImageRow.style.display = "none";
      } else if (paymentMethod === "Paymaya") {
        gcashImageRow.style.display = "none";
        paymayaImageRow.style.display = "table-row";
        codImageRow.style.display = "none";
      } else if (paymentMethod === "Cash on Delivery") {
        gcashImageRow.style.display = "none";
        paymayaImageRow.style.display = "none";
        codImageRow.style.display = "table-row";
      }
    });
  </script>
  <script>
    function openImage(imageId) {
      var image = document.getElementById(imageId);
      var imageUrl = image.src;
      var imageModal = document.createElement('div');
      imageModal.style.position = 'fixed';
      imageModal.style.top = '0';
      imageModal.style.left = '0';
      imageModal.style.width = '100%';
      imageModal.style.height = '100%';
      imageModal.style.background = 'rgba(0, 0, 0, 0.5)';
      imageModal.style.display = 'flex';
      imageModal.style.justifyContent = 'center';
      imageModal.style.alignItems = 'center';
      imageModal.style.zIndex = '1000';

      var closeButton = document.createElement('span');
      closeButton.style.position = 'absolute';
      closeButton.style.top = '10px';
      closeButton.style.right = '10px';
      closeButton.style.fontSize = '36px';
      closeButton.style.cursor = 'pointer';
      closeButton.innerHTML = '&times;';
      closeButton.onclick = function() {
        imageModal.remove();
      };

      var imageElement = document.createElement('img');
      imageElement.src = imageUrl;
      imageElement.style.maxWidth = '80%';
      imageElement.style.maxHeight = '80%';

      imageModal.appendChild(closeButton);
      imageModal.appendChild(imageElement);
      document.body.appendChild(imageModal);

      // Add event listener to close the modal when clicked outside the image
      imageModal.addEventListener('click', function(event) {
        if (event.target !== imageElement && event.target !== closeButton) {
          imageModal.remove();
        }
      });
    }
  </script>
</body>

</html>