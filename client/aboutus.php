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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TZ Car Rental | About Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
</head>

<body class="body">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap');

        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
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

        body {
            font-family: Arial, sans-serif;
            display: grid;
            background-image: url("../images/carbg2.jpg");
            background-size: cover;
            background-position: center;
            /* align-content: center; */
            min-height: 100vh;
        }

        section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 70vh;
            width: 75vw;
            margin: 0 auto;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 12px
        }

        .image {
            background-color: #12192c;
            display: flex;
            border-radius: 12px 0 0 12px;
            height: 50vh;
            margin: 50px auto;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 12px;
            padding: 20px;
        }

        .map-box {
            width: 600px;
            height: 450px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .content {
            background-color: #333;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            border-radius: 0 12px 12px 0;
            color: #fff;
        }

        .content h2 {
            text-transform: uppercase;
            font-size: 36px;
            letter-spacing: 6px;
            opacity: 0.9;
        }

        .content span {
            height: 0.5px;
            width: 80px;
            background: #777;
            margin: 30px 0;
        }

        .content p {
            padding-bottom: 15px;
            font-weight: 300;
            opacity: 0.7;
            width: 60%;
            text-align: center;
            margin: 0 auto;
            line-height: 1.7;
            color: #ffffff
        }

        .links {
            margin: 15px 0;
        }

        .links li {
            border: 2px solid #4158D0;
            list-style: none;
            border-radius: 5px;
            padding: 10px 15px;
            width: 160px;
            text-align: center;
        }

        .links li a {
            text-transform: uppercase;
            color: #fff;
            text-decoration: none;
        }

        .links li:hover {
            border-color: #d87f0b;
        }

        .vertical-line {
            height: 30px;
            width: 3px;
            background: #d87f0b;
            margin: 0 auto;
        }

        .icons {
            display: flex;
            padding: 15px 0;
        }

        .icons li {
            display: block;
            padding: 5px;
            margin: 5px;
        }

        .icons li i {
            font-size: 26px;
            opacity: 0.8;
        }

        .icons li i:hover {
            color: #C850C0;
            cursor: pointer;
        }

        .back-button {
            text-transform: uppercase;
            color: #fff;
            text-decoration: none;
            border: 2px solid #e99700;
            list-style: none;
            border-radius: 5px;
            padding: 10px 15px;
            width: 160px;
            text-align: center;
        }

        .back-button:hover {
            border-color: #C850C0;
        }

        /*****************/

        @media(max-width: 900px) {
            section {
                grid-template-columns: 1fr;
                width: 100%;
                border-radius: none;
            }

            .image {
                height: 100vh;
                border-radius: none;
            }

            .content {
                height: 100vh;
                border-radius: none;
            }

            .content h2 {
                font-size: 20px;
                margin-top: 50px;
            }

            .content span {
                margin: 20px 0;
            }

            .content p {
                font-size: 14px;
            }

            .links li a {
                font-size: 14px;
            }

            .links {
                margin: 5px 0;
            }

            .links li {
                padding: 6px 10px;
            }

            .icons li i {
                font-size: 15px;
            }
        }

        .credit {
            text-align: center;
            color: #000;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        .credit a {
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }
    </style>

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
        </div>
    </div>
    <section>
        <div class="image">
            <div class="map-box">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3835.7407784734482!2d120.5572881!3d15.974907900000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33913f00708f31cb%3A0x6858fcfd38045593!2sTZ%20Car%20Trading!5e0!3m2!1sen!2sph!4v1739430596312!5m2!1sen!2sph" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <div class="content">
            <h2>TZ CAR RENTAL (URDANETA)</h2>
            <span><!-- line here --></span>
            <p>We are pleased you chose TZ CAR RENTAL (URDANETA) Urdaneta to rent a car, We have lots of cars to choose from and we are happy to serve you always anytime anywhere!</p>
            <ul class="links">


            </ul>
            <ul class="icons">
                <li>
                    <i class="fa fa-twitter"></i>
                </li>
                <li>
                    <i class="fa fa-facebook"></i>
                </li>
                <li>
                    <i class="fa fa-github"></i>
                </li>
                <li>
                    <i class="fa fa-pinterest"></i>
                </li>
            </ul>
        </div>
    </section><br><br>
</body>

</html>