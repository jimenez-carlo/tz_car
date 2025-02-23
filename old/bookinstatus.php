<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOKING STATUS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&display=swap">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background-image: url(images/carbg2.jpg);

        }

        .container {
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .header {
            width: 100%;
            height: 80px;
            background-color: #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1;
        }

        .header .logo {
            font-size: 35px;
            color: #ff7200;
            font-weight: bold;
        }

        .header .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-right: 500px;
        }

        .header .nav a {
            text-decoration: none;
            color: #fff;
            margin-left: 50px;
            font-weight: bold;

        }

        .header .nav a:hover {
            color: #ff7200;
        }

        .main-content {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 100px;
        }

        .card {
            width: 700px;
            height: 400px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

        }

        .card-header {
            width: 100%;
            height: 60px;
            background-color: #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            border-bottom: 1px solid #ddd;
        }

        .card-header .title {
            font-size: 24px;
            color: #fff;
            font-weight: bold;
        }

        .card-header .back-btn {
            background-color: #ff7200;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .card-header .back-btn:hover {
            background-color: #ff8c00;
        }

        .card-header .back-btn a {
            text-decoration: none;
            color: #fff;
        }

        .card-header .back-btn a:hover {
            color: #fff;
        }

        .card-content {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;

        }

        .imgBx {
            width: 200px;
            height: 150px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .img-wrapper {
            width: 100%;
            height: 100%;
            border-radius: 10px;
            overflow: hidden;
        }

        .img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card-content h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .card-content h2 {
            color: #333;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php
    require_once('connection.php');
    session_start();
    $email = $_SESSION['email'];

    $sql = "select * from booking where EMAIL='$email' order by BOOK_ID DESC LIMIT 1";
    $name = mysqli_query($con, $sql);
    $rows = mysqli_fetch_assoc($name);
    if ($rows == null) {
        echo '<script>alert("THERE ARE NO BOOKING DETAILS")</script>';
        echo '<script> window.location.href = "cardetails.php";</script>';
    } else {
        $sql2 = "select * from users where EMAIL='$email'";
        $name2 = mysqli_query($con, $sql2);
        $rows2 = mysqli_fetch_assoc($name2);
        $car_id = $rows['CAR_ID'];
        $sql3 = "select * from cars where CAR_ID='$car_id'";
        $name3 = mysqli_query($con, $sql3);
        $rows3 = mysqli_fetch_assoc($name3);
    ?>
        <div class="container">
            <div class="header">
                <div class="logo">TZ CAR RENTAL (URDANETA)</div>
                <div class="nav">

                </div>
            </div>
            <div class="main-content">
                <div class="card">
                    <div class="card-header">
                        <div class="title">Rent Status</div>
                        <button class="back-btn"><a href="cardetails.php">Go Back</a></button>
                    </div>
                    <div class="card-content">
                        <div class="imgBx">
                            <div class="img-wrapper">
                                <img src="images/<?php echo $rows3['CAR_IMG']; ?>" alt="Car Image">
                            </div>
                        </div>
                        <h1>Booking Details</h1>
                        <h2>Car Name: <?php echo $rows3['CAR_NAME'] ?></h2>
                        <h2>No of Days: <?php echo $rows['DURATION'] ?></h2>
                        <h2>Booking Status: <?php echo $rows['BOOK_STATUS'] ?></h2>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</body>

</html>