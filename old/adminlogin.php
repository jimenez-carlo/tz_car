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

</head>

<body>
    <style>
        body {
            background-image: url("images/meshbg.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            height: 95vh;
        }

        .form {
            width: 300px;
            height: 400px;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.8)50%, rgba(0, 0, 0, 0.8)50%);
            margin-top: 100px;
            border-radius: 10px;
            padding: 20px;


        }

        .form h2 {
            width: 90%;
            font-family: sans-serif;
            text-align: center;
            color: orange;
            font-size: 22px;
            background-color: white;
            border-radius: 10px;
            margin: 2px;
            padding: 8px;

        }

        .h {
            width: 100%;
            height: 75px;
            background: transparent;
            border-bottom: 1px solid #ff7200;
            border-top: none;
            border-right: none;
            border-left: none;
            color: #fff;
            font-size: 15px;
            letter-spacing: 1px;
            margin-top: 30px;
            font-family: sans-serif;
        }

        .h:focus {
            outline: none;
        }

        ::placeholder {
            color: #fff;
            font-family: Arial;

        }

        .btnn {
            width: 300px;
            height: 40px;

            background: #ff7200;
            border: none;
            margin-top: 70px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            color: #fff;
            transition: background-color 0.5s ease;
        }

        .btnn:hover {
            background: #be5300;
            color: #ff7200;
        }

        .btnn a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        .back {
            width: 150px;
            height: 40px;

            background: #ff7200;
            border: none;
            margin-top: 0px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            color: #fff;
            transition: background-color 0.5s ease;
        }

        .back:hover {
            background: #fff;
            color: #ff7200;
        }

        .back a {
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        .form .link {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 17px;
            padding-top: 20px;
            text-align: center;
            color: #fff;
        }

        .form .link a {
            text-decoration: none;
            color: #ff7200
        }



        .helloadmin {
            width: 1500px;
            height: 100%;
            text-align: center;
        }

        .helloadmin h1 {
            display: inline-block;
            font-family: 'Times New Roman';
            font-size: 50px;
            color: white;
            background-color: #ff7200;
            padding: 10px;
            border-radius: 10px;
            margin-top: 50px;
        }
    </style>

    <?= (isset($_POST['submit'])) ? loginAdmin($_POST) : ''; ?>



    <center>
        <button class="back"><a href="index.php">Go To Home</a></button>
        <div class="helloadmin">
            <h1>HELLO ADMIN!</h1>
        </div>
        <form class="form" method="POST">
            <h2>Admin Login</h2>
            <input class="h" type="text" name="username" placeholder="Enter admin user id">
            <input class="h" type="password" name="password" placeholder="Enter admin password">
            <input type="submit" class="btnn" value="LOGIN" name="submit">
        </form>
    </center>
</body>

</html>