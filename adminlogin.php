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
    <title>ADMIN LOGIN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        body {
            background-image: url("images/meshbg.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            height: 100vh;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .login-form {
            width: 400px;
            height: 500px;
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .login-form input {
            width: 100%;
            height: 40px;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-form input:focus {
            outline: none;
            border-color: #ff7200;
        }

        .login-form button {
            width: 100%;
            height: 40px;
            background-color: #ff7200;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-form button:hover {
            background-color: #be5300;
        }

        .back {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #ff7200;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }

        .back:hover {
            background-color: #be5300;
        }

        .password-input {
            position: relative;
        }

        .password-input i {
            position: absolute;
            top: 12px;
            right: 12px;
            cursor: pointer;
        }

        .login-form input[type="text"], .login-form input[type="password"] {
            box-sizing: border-box;
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
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

        .navbar .icon {
            margin-left: 20px;
        }

        .navbar .icon .logo {
            color: #ff7200;
            font-size: 28px;
        }

        .navbar .menu {
            margin-left: auto;
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

        .navbar .menu ul li a {
            color: white;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            padding: 5px 15px;
            display: inline-block;
            border-radius: 5px;
        }

        /* Hover Effects */
        .navbar .menu ul li a:hover {
            background-color: #f2a900;
            color: #fff;
            transition: background-color 0.3s ease;
            padding: 5px 15px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div class="icon">
            <h2 class="logo">TZ CAR RENTAL (URDANETA)</h2>
        </div>
        <div class="menu">
            <ul>
                <li><a href="index.php" style="font-size: 16px;">HOME</a></li>
                <li><a href="aboutus.php" style="font-size: 16px;">ABOUT</a></li>
                <li><a href="contactus.php" style="font-size: 16px;">CONTACT</a></li>
            </ul>
        </div>
    </div>
    <?= (isset($_POST['submit'])) ? loginAdmin($_POST) : ''; ?>
    <button class="back"><a href="index.php">Home</a></button>
    <div class="container">
        <div class="login-form">
            <h2>Admin Login</h2>
            <form method="POST">
                <input type="text" name="username" placeholder="Enter Admin User Id">
                <div class="password-input">
                    <input type="password" name="password" placeholder="Enter Admin Password" id="password">
                    <i class="fas fa-eye" id="eye" onclick="togglePassword()"></i>
                </div>
                <button type="submit" name="submit">LOGIN</button>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            var password = document.getElementById("password");
            var eye = document.getElementById("eye");

            if (password.type === "password") {
                password.type = "text";
                eye.classList.remove("fa-eye");
                eye.classList.add("fa-eye-slash");
            } else {
                password.type = "password";
                eye.classList.remove("fa-eye-slash");
                eye.classList.add("fa-eye");
            }
        }
    </script>
</body>

</html>