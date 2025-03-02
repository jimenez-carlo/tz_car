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
<?php
$title = "Contacts";
$phone = "09614284823";
$email = "tzcarrental@gmail.com";
$address = "Urdaneta City, Pangasinan, Philippines";
$background_image = "car-background.jpg"; // Dynamic background image
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom right, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.7)), url('<?php echo $background_image; ?>');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            background-image: url("carbg2.jpg"), url("carbg2.jpg");
        }

        .container {
            max-width: 600px;
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
            text-align: center;
            backdrop-filter: blur(5px);
        }

        .contact-info {
            margin-top: 20px;
            line-height: 1.8;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 16px;
            color: #555;
        }

        .contact-form button {
            padding: 12px 18px;
            border: none;
            background-color: #ff9800;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .contact-form button:hover {
            background-color: #e68900;
            transform: scale(1.1);
        }

        .home-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #ff9800;
            color: white;
            padding: 12px 18px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .home-button:hover {
            background-color: #e68900;
            transform: scale(1.1);
        }

        h1 {
            color: #ff9800;
            font-size: 32px;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
        }

        h2 {
            color: #333;
            font-size: 24px;
            font-weight: bold;
        }

        p {
            font-size: 18px;
            color: #444;
        }

        .contact-info p {
            background: rgba(255, 255, 255, 0.7);
            padding: 10px;
            border-radius: 5px;
            box-shadow: 1px 1px 5px rgba(0, 0, 0, 0.2);
        }

        .social-links a {
            color: #ff9800;
            margin: 0 10px;
            text-decoration: none;
            font-size: 20px;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            color: #e68900;
            transform: scale(1.2);
        }

        footer {
            position: absolute;
            bottom: 10px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>

<body>
    <a href="index.php" class="home-button">Go Home</a>
    <div class="container">
        <h1>TZ CAR RENTAL (URDANETA)</h1>
        <h2>Contact TZ CAR RENTAL (URDANETA) Urdaneta</h2>
        <div class="contact-info">
            <p><strong>Phone:</strong> <?php echo $phone; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Address:</strong> <?php echo $address; ?></p>
        </div>

        <div class="contact-form">
            <h3>Send Us a Message</h3>
            <form method="post" action="">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" rows="4" placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>

        <div class="social-links">
            <p>Follow Us:</p>
            <a href="https://facebook.com" target="_blank">Facebook</a>
            <a href="https://twitter.com" target="_blank">Twitter</a>
            <a href="https://instagram.com" target="_blank">Instagram</a>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 TZ CAR RENTAL (URDANETA) | All Rights Reserved</p>
    </footer>
</body>

</html>