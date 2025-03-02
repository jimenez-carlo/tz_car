<?php include('../includes/functions.php') ?>
<?php
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']->access_id == 3) {
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
    <title>Car Details</title>
</head>

<body class="body">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: url("images/carbg2.jpg");
            background-position: center;
            background-size: cover;
            font-family: 'Arial', sans-serif;
        }

        /* Navbar styling */
        .navbar {
            width: 100%;
            height: 75px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            background: #333;
            /* Solid color background */
            color: white;
            /* Text color is white */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            /* Drop shadow for the navbar */
        }

        .icon h2 {
            font-size: 35px;
            font-weight: bold;
            padding-top: 10px;
            color: #ff7200;
            /* Light color for the logo text */
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
            /* White color for text */
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .menu ul li a:hover {
            color: #ff7200;
            /* Hover color remains orange */
        }

        .menu ul li img {
            border-radius: 50%;
            width: 30px;
            height: 30px;
            margin-left: 15px;
        }

        /* Car Overview Section */
        .overview {
            text-align: center;
            margin-top: 50px;
            font-size: 28px;
            color: #333;
            /* Dark color for heading */
            font-weight: bold;
            background-color: white;
            /* White background */
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            /* Drop shadow for the overview section */
            margin-top: 20px;
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
            /* Dark color for car name */
            margin-bottom: 10px;
        }

        .box .content h2 {
            font-size: 16px;
            color: #555;
            /* Slightly lighter color for subheading */
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
            /* Button text remains white */
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
            /* Add padding to make the background proportionate */
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
            background-color: rgb(0, 0, 0);
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

        /* Add some responsiveness */
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
    </style>

    <div class="cd">
        <div class="main">
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
                        <li><img src="../images/profile.png" alt="Profile"></li>
                        <li>
                            <p class="phello" style="color: white;">HELLO! &nbsp;<a id="pname"><?= $_SESSION['user']->FNAME . " " . $_SESSION['user']->LNAME ?></a></p>
                        </li>
                        <li><a id="stat" href="bookinstatus.php">RENT STATUS</a></li>
                    </ul>
                </div>
            </div>

            <h1 class="overview">OUR CARS OVERVIEW</h1>

            <ul class="de">
                <?= (isset($_POST['submit'])) ? createFeedback(array_merge($_POST)) : ''; ?>
                <?php
                foreach (
                    get_list("SELECT c.* FROM cars c WHERE c.CAR_ID NOT IN ( SELECT b.CAR_ID 
    FROM booking b 
    WHERE b.EMAIL = '" . $_SESSION['user']->EMAIL . "')") as $result
                ) {
                ?>
                    <li>
                        <div class="box">
                            <div class="imgBx">
                                <div class="img-wrapper">
                                    <img src="../images/<?php echo $result['CAR_IMG']; ?>" alt="Car Image">
                                </div>
                            </div>
                            <div class="content">
                                <h1><?php echo $result['CAR_NAME']; ?></h1>
                                <h2>Fuel Type: <a><?php echo $result['FUEL_TYPE']; ?></a></h2>
                                <h2>Capacity: <a><?php echo $result['CAPACITY']; ?></a></h2>
                                <h2>Rent Per Day: <a>₱<?php echo $result['PRICE']; ?>/-</a></h2>
                                <a href="book_car.php?car_id=<?= $result['CAR_ID'] ?>" class="utton">
                                    <button type="button" name="submit" class="utton">Rent</button>
                                </a>
                            </div>
                        </div>
                    </li>
                <?php }  ?>
            </ul>
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
        // Get all image wrappers
        const imageWrappers = document.querySelectorAll('.img-wrapper');

        // Add event listener to each image wrapper
        imageWrappers.forEach((wrapper) => {
            wrapper.addEventListener('click', () => {
                // Get the image source
                const imageSrc = wrapper.querySelector('img').src;

                // Display the modal
                const modal = document.getElementById('image-modal');
                modal.style.display = 'block';

                // Set the image source in the modal
                const modalImage = modal.querySelector('.image-modal-image');
                modalImage.src = imageSrc;

                // Add event listener to the close button
                const closeButton = modal.querySelector('.close');
                closeButton.addEventListener('click', () => {
                    modal.style.display = 'none';
                });
            });
        });

        // Add event listener to the modal to close it when clicked outside
        document.getElementById('image-modal').addEventListener('click', (e) => {
            if (e.target === document.getElementById('image-modal')) {
                document.getElementById('image-modal').style.display = 'none';
            }
        });
    </script>

</body>

</html>