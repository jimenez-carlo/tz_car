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
            cursor: pointer;
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

        .form {
            margin: auto;
            width: unset;
        }
    </style>
</head>

<body>
    <?= (isset($_POST['submit'])) ? forgot_password($_POST['username']) : ''; ?>
    <div class="hai">
        <div class="navbar">
            <div class="icon">
                <h2 class="logo">TZ CAR RENTAL (URDANETA)</h2>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php" style="font-size: 16px; margin-left: 20px;">HOME</a></li>
                    <li><a href="aboutus.php" style="font-size: 16px; margin-left: 20px;">ABOUT</a></li>
                    <li><a href="contactus.php" style="font-size: 16px; margin-left: 20px;">CONTACT</a></li>
                    <li><button class="adminbtn" style="margin-left: 20px;"><a href="adminlogin.php">ADMIN</a></button></li>
                </ul>
            </div>
        </div>
        <div class="content">

            <div class="form">
                <h2>Forgot Password</h2>
                <form method="POST">
                    <input type="email" name="username" placeholder="Enter Email Here">
                    <input class="btnn" type="submit" value="Submit" name="submit">
                </form>
                <p class="link">Already have an account?<br>
                    <a href="index.php">login</a> here.
                </p>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>

</html>