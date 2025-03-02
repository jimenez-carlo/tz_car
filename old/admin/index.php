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
            /* width: 400px; */
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
            margin-top: 0;
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
    </style>

    <div class="navbar">
        <div class="icon">
            <h2 class="logo">TZ CAR RENTAL (URDANETA)</h2>
        </div>
        <div class="menu">
            <ul>
                <li><a href="adminvehicle.php">VEHICLE MANAGEMENT</a></li>
                <li><a href="adminusers.php">USERS</a></li>
                <li><a href="index.php">FEEDBACKS</a></li>

                <li><a href="adminbook.php">RENT REQUEST</a></li>
                <li> <button class="nn"><a href="../logout.php">LOGOUT</a></button></li>
            </ul>
        </div>
    </div>
    <div class="hai">
        <div class="header-container">
            <h1 class="header">FEEDBACKS</h1>
        </div>
        <div class="table-container">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>FEEDBACK_ID</th>
                        <th>EMAIL</th>
                        <th>COMMENT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach (get_list("select * from feedback") as $key => $res) {
                    ?>
                        <tr class="active-row">
                            <td><?php echo $res['FED_ID']; ?></php>
                            </td>
                            <td><?php echo $res['EMAIL']; ?></php>
                            </td>
                            <td><?php echo $res['COMMENT']; ?></php>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>