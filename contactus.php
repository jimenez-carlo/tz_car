<?php include('includes/functions.php') ?>
<?php
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']->access_id == 1 || $_SESSION['user']->access_id == 2) {
        header('location:admin');
    } else if ($_SESSION['user']->access_id == 3) {
        header('location:client');
    }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <link rel="stylesheet" href="css/cont.css">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<style>
    .contact {
        background-image: url('images/meshbg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .contactInfo {
        background-color: #fff;
        background-size: auto;
        /* Changed to auto */
        border-radius: 15px;
        padding: 50px;
        /* Added padding to make the background size adjust to the content */
        box-sizing: border-box;
        /* Added box-sizing to include padding in the width and height */
    }

    .inputBox .btn,
    .inputBox input[type="submit"] {
        width: 150px;
        background: orange;
        color: #fff;
        border: none;
        cursor: pointer;
        padding: 10px;
        font-size: 18px;
        margin-left: 100px;
        transition: background 0.3s ease-in-out;
        text-decoration: none;
        display: inline-block;
    }

    .inputBox .btn:hover,
    .inputBox input[type="submit"]:hover {
        background: #ff9900;
        /* Changed to a darker orange color on hover */
        transform: scale(1.1);
        /* Added a slight scale effect on hover */
    }

    .contactInfo .box .text h3 {
        color: #ff9900 !important;
        /* Dark orange color */
    }

    b {
        font-size: 36px;
        font-family: Arial, sans-serif;
        font-weight: bold;
        color: #fff;
        background-color: #ff9900;
        padding: 20px;
        border-radius: 20px;
        text-align: center;
        animation: breathe 2s infinite;
    }

    @keyframes breathe {
        0% {
            opacity: 0.6;
        }

        50% {
            opacity: 1;
        }

        100% {
            opacity: 0.5;
        }
    }

    .contactForm {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        overflow: hidden;
    }

    .contactInfo {
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        overflow: hidden;
    }

    .inputBox .btn,
    .inputBox input[type="submit"] {
        width: 150px;
        background: orange;
        color: #fff;
        border: none;
        cursor: pointer;
        padding: 10px;
        font-size: 18px;
        margin-left: 100px;
        transition: background 0.3s ease-in-out;
        text-decoration: none;
        display: inline-block;
        border-radius: 5px;
        /* Make the buttons less round */
    }

    .content {
        margin: unset;
        display: flex;
        justify-content: center;
        max-width: unset !important;
    }

    .contact {
        display: inline-block;
        width: 100vw;
    }

    .content h1 {
        background: unset;
    }
</style>

<body>
    <?= (isset($_POST['submit'])) ? contact_us($_POST) : ''; ?>
    <div class="hai" style="height: fit-content;">
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

    </div>
    <section class="contact">

        <div class="content">
            <center>
                <h1><b>CONTACT US</b></h1>

            </center>
        </div>
        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="fas fa-map-marker" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>Urdaneta,<br>Pangasinan,<br>55060</p>
                    </div>

                </div>
                <div class="box">
                    <div class="icon"><i class="fas fa-phone-alt" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>0961-428-4823</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fas fa-envelope" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>tzcarrental@gmail.com</p>
                    </div>
                </div>

            </div>
            <div class="contactForm">
                <form method="post">
                    <h2>Send Message</h2>
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
                        <span>Type your Message...</span>
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="submit" value="Send">

                    </div>
                </form>
            </div>
        </div>
    </section>

</body>

</html>