<?php include('../includes/functions.php') ?>
<?php
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']->access_id == 1) {
    } else {
        header('location:../logout.php');
    }
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRATOR</title>
</head>

<body>
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
            margin-left: 40px;
            font-size: 18px;
            border-radius: 10px;
            cursor: pointer;
            color: #fff;
            transition: 0.4s ease;
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
    </style>


    <?= (isset($_POST['submit'])) ? createCategory(array_merge($_POST)) : ''; ?>


    <div class="navbar">
        <div class="icon">
            <h2 class="logo">TZ CAR RENTAL (URDANETA)</h2>
        </div>
        <div class="menu">
            <ul>
                <li><a href="admincategory.php">CATEGORY</a></li>
                <li><a href="adminvehicle.php">VEHICLE MANAGEMENT</a></li>
                <li><a href="adminusers.php">USERS</a></li>
                <li><a href="index.php">FEEDBACKS</a></li>

                <li><a href="adminbook.php">RENT REQUEST</a></li>
                <li> <button class="nn"><a href="../logout.php">LOGOUT</a></button></li>
            </ul>
        </div>
    </div>
    <div class="hai">

        <div class="register">
            <h2>Enter details of new category</h2>
            <form id="register" method="POST" enctype="multipart/form-data">
                <label>Category Name : </label>
                <br>
                <input type="text" name="category_name"
                    id="name" placeholder="Enter Category Name" required>
                <br><br>

                <input type="submit" class="btnn" value="ADD CATEGORY" name="submit">



                </input>

            </form>
        </div>
    </div>
</body>

</html>




</body>

</html>