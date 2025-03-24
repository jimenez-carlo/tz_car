<?php
include('../includes/functions.php');
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION['user']) || $_SESSION['user']->access_id != 3) {
  header('location:../logout.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Details</title>
  <style>
    /* Global Styles */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-image: url("../images/carbg2.jpg");
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      background-position: center;
      font-family: Arial, sans-serif;
    }

    /* Navbar Styling */
    .navbar {
      width: 100%;
      height: 75px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
      background: #333;
      color: white;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    }

    .icon h2 {
      font-size: 35px;
      font-weight: bold;
      padding-top: 10px;
      color: #ff7200;
    }

    .menu ul {
      display: flex;
      list-style: none;
      align-items: center;
    }

    .menu ul li {
      margin-left: 40px;
      font-size: 16px;
      position: relative;
    }

    .menu ul li a {
      text-decoration: none;
      color: #fff;
      font-weight: bold;
      transition: color 0.3s ease;
    }

    .menu ul li a:hover {
      color: #ff7200;
    }

    .menu ul li img {
      border-radius: 50%;
      width: 30px;
      height: 30px;
      margin-left: 15px;
    }

    /* Overview Section */
    .overview {
      text-align: center;
      margin-top: 20px;
      font-size: 28px;
      color: #333;
      font-weight: bold;
      background-color: white;
      padding: 20px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
    }

    /* Car Listing Box */
    .de {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      margin-top: 30px;
    }

    .box {
      background: linear-gradient(135deg, rgba(255, 251, 251, 0.8) 50%, rgba(250, 246, 246, 0.8) 50%);
      width: 300px;
      padding: 15px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
      border-radius: 8px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .box:hover {
      transform: translateY(-10px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4);
    }

    .box .imgBx {
      width: 100%;
      height: 150px;
      overflow: hidden;
      border-radius: 8px;
      display: flex;
      justify-content: center;
    }

    .box .imgBx .img-wrapper {
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      transition: transform 0.3s ease;
      cursor: pointer;
    }

    .box .imgBx .img-wrapper:hover {
      transform: scale(1.05);
    }

    .box .imgBx .img-wrapper img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .box .content {
      text-align: center;
      padding-top: 10px;
    }

    .box .content h1 {
      font-size: 22px;
      color: #333;
      margin-bottom: 10px;
    }

    .box .content h2 {
      font-size: 16px;
      color: #555;
      margin-bottom: 10px;
    }

    .box .content a {
      color: #ff7200;
      font-weight: bold;
      text-decoration: none;
    }

    .utton {
      width: 100%;
      height: 40px;
      background: #ff7200;
      border: none;
      margin-top: 20px;
      font-size: 18px;
      border-radius: 10px;
      cursor: pointer;
      color: white;
      transition: all 0.3s ease;
    }

    .utton:hover {
      background-color: #e65c00;
      transform: scale(1.05);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
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
    }

    .logout-button:hover {
      background-color: #e65c00;
      transform: scale(1.05);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    /* Image Modal Styles */
    .image-modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0, 0, 0, 0.4);
    }

    .image-modal-content {
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 800px;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2), 0 6px 20px rgba(0, 0, 0, 0.19);
    }

    .image-modal-image {
      width: 100%;
      height: 100%;
      object-fit: contain;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }

    @media (max-width: 768px) {
      .navbar {
        width: 100%;
        flex-direction: column;
        align-items: flex-start;
      }

      .menu ul {
        flex-direction: column;
        margin-top: 20px;
      }

      .menu ul li {
        margin-left: 0;
        margin-top: 10px;
      }

      .box {
        width: 100%;
        margin-top: 20px;
      }
    }

    .inputBox input,
    .inputBox textarea {
      width: 100%;
      padding: 5px 0;
      font-size: 16px;
      margin: 10px 0;
      border: none;
      border-bottom: 2px solid #333;
      outline: none;
      resize: none;
    }

    .inputBox input[type="submit"] {
      width: 100px;
      background: orange;
      color: #fff;
      border: none;
      cursor: pointer;
      padding: 10px;
      font-size: 18px;
    }
  </style>
</head>

<body class="body">
  <?= (isset($_POST['submit'])) ? contact_us($_POST) : ''; ?>
  <div class="cd">
    <div class="main">
      <div class="navbar">
        <div class="icon">
          <h2 class="logo">TZ CAR RENTAL (URDANETA)</h2>
        </div>
        <div class="menu">
          <ul>
            <li><a href="index.php" id="#">HOME</a></li>
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
              <p class="phello" style="color: white;">
                HELLO! &nbsp;<a id="pname"><?= $_SESSION['user']->FNAME . " " . $_SESSION['user']->LNAME ?></a>
              </p>
            </li>
            <li><a id="stat" href="bookinstatus.php">RENT STATUS</a></li>
          </ul>
        </div>
      </div>

      <h1 class="overview">CONTACT US</h1>
      <div style="display:flex;justify-content:space-between;flex-direction:row;padding:0 15vw;margin-top:30px">
        <div style="    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    overflow: hidden;
    background-color: #fff;
    background-size: auto;
    border-radius: 15px;
    padding: 50px;
    box-sizing: border-box;
    ">


          <div style="display:flex;flex-direction:column">
            <div style="display:flex;flex-direction:row;margin-bottom:30px;">
              <div style="min-width: 60px;
    height: 60px;
    background: orange;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    font-size: 22px;margin-right:20px">
                <i class="fas fa-map-marker" aria-hidden="true"></i>
              </div>
              <h3 style="color: #ff9900">
                Address
                <br>

                <p style="font-size:16px;color: #ff9900">
                  Urdaneta,
                  Pangasinan,
                  55060
                </p>
              </h3>
            </div>
            <div style="display:flex;flex-direction:row;margin-bottom:30px">
              <div style="min-width: 60px;
    height: 60px;
    background: orange;
    display: flex
;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    font-size: 22px;margin-right:20px">
                <i class="fas fa-phone-alt" aria-hidden="true"></i>
              </div>
              <h3 style="color: #ff9900">
                Phone
                <br>
                <p style="font-size:16px;color: #ff9900">
                  0961-428-4823
                </p>
              </h3>
            </div>
            <div style="display:flex;flex-direction:row;margin-bottom:30px">
              <div style="min-width: 60px;
    height: 60px;
    background: orange;
    display: flex
;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    font-size: 22px;margin-right:20px">
                <i class="fas fa-envelope" aria-hidden="true"></i>
              </div>
              <h3 style="color: #ff9900">
                Email
                <br>
                <p style="font-size:16px;color: #ff9900">
                  tzcarrental@g
                </p>
              </h3>
            </div>
          </div>
        </div>
        <div style="    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    overflow: hidden;
    background-color: #fff;
    background-size: auto;
    border-radius: 15px;
    padding: 50px;
    box-sizing: border-box;
    ">
          <form method="post">
            <h2 style="font-size: 30px;
    color: orange;
    font-weight: 700;">Send Message</h2>
            <div class="inputBox">
              <input type="text" name="fullname" required="required">
              <span>Full Name</span>

            </div>
            <div class="inputBox">
              <input type="text" name="email" required="required">
              <span>Email</span>
            </div>
            <div class="inputBox">
              <textarea required="required" name="details"></textarea>
            </div>
            <div class="inputBox">
              <input type="submit" name="submit" value="Send">
              <a href="index.php" class="btn" style="
                            text-decoration: none;
                            color: #fff;
                        ">Go To Home</a>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>

  <!-- Image Modal -->
  <div id="image-modal" class="image-modal">
    <div class="image-modal-content">
      <span class="close">&times;</span>
      <img class="image-modal-image" src="" alt="">
    </div>
  </div>

  <script>
    // Image Modal functionality
    const imageWrappers = document.querySelectorAll('.img-wrapper');
    imageWrappers.forEach((wrapper) => {
      wrapper.addEventListener('click', () => {
        const imageSrc = wrapper.querySelector('img').src;
        const modal = document.getElementById('image-modal');
        modal.style.display = 'block';
        const modalImage = modal.querySelector('.image-modal-image');
        modalImage.src = imageSrc;
        const closeButton = modal.querySelector('.close');
        closeButton.addEventListener('click', () => {
          modal.style.display = 'none';
        });
      });
    });
    document.getElementById('image-modal').addEventListener('click', (e) => {
      if (e.target === document.getElementById('image-modal')) {
        document.getElementById('image-modal').style.display = 'none';
      }
    });

    // AJAX call when clicking the Home link to refresh the car list
    document.getElementById('home-link').addEventListener('click', function(e) {
      e.preventDefault();
      fetch('fetch_cars.php')
        .then(response => response.text())
        .then(data => {
          document.querySelector('.de').innerHTML = data;
        })
        .catch(error => console.error('Error fetching car data:', error));
    });
  </script>
</body>

</html>