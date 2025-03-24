<?php include_once('../includes/functions.php') ?>
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

    .expandable-image {
      cursor: pointer;
    }

    .expanded-image {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.8);
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 1000;
    }

    .expanded-image img {
      max-width: 80%;
      max-height: 80%;
      object-fit: contain;
    }

    .actions {
      display: flex;
      justify-content: space-between;
    }

    .actions button {
      margin: 0 5px;
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
        <li><a href="admincategory.php">CATEGORY</a></li>
        <li><a href="adminvehicle.php">VEHICLE MANAGEMENT</a></li>
        <li><a href="adminusers.php">USERS</a></li>
        <li><a href="index.php">FEEDBACKS</a></li>

        <li><a href="adminbook.php">RENT REQUEST</a></li>
        <li> <button class="nn"><a href="../logout.php">LOGOUT</a></button></li>
      </ul>
    </div>
  </div>
  <div class="hai" style="overflow: auto;">
    <div class="header-container">
      <h1 class="header">RENT HISTORY/PROCESS</h1>
    </div>
    <div class="table-container">
      <table class="content-table">
        <thead>
          <tr>
            <th>IMG</th>
            <th>CAR ID</th>
            <th>EMAIL</th>
            <th>BOOK PLACE</th>
            <th>BOOK DATE</th>
            <th>PHONE NUMBER</th>
            <th>DESTINATION</th>
            <th>RETURN DATE</th>
            <th>BOOKING STATUS</th>
            <th>SCREENSHOTS</th>
            <th>LICENSE FRONT</th>
            <th>LICENSE BACK</th>
            <th>ACTIONS</th>

          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_POST['confirm'])) {
            extract($_POST);
            query("UPDATE booking SET BOOK_STATUS = 'CONFIRMED' WHERE BOOK_ID = '$id'");
            query("UPDATE cars SET AVAILABLE = 'N' WHERE CAR_ID = '$car_id'");
            echo success_message("Car Confirmed Successfully!");
          } elseif (isset($_POST['return'])) {
            extract($_POST);
            query("UPDATE booking SET BOOK_STATUS = 'RETURNED' WHERE BOOK_ID = '$id'");
            query("UPDATE cars SET AVAILABLE = 'Y' WHERE CAR_ID = '$car_id'");
            echo success_message("Car Returned Successfully!");
          } elseif (isset($_POST['reject'])) {
            extract($_POST);
            query("UPDATE booking SET BOOK_STATUS = 'REJECTED' WHERE BOOK_ID = '$id'");
            query("UPDATE cars SET AVAILABLE = 'Y' WHERE CAR_ID = '$car_id'");
            echo success_message("Car Rejected Successfully!");
          }
          foreach (get_list("SELECT b.CAR_ID,b.EMAIL,b.BOOK_PLACE,b.BOOK_DATE,b.PHONE_NUMBER, b.DESTINATION, b.RETURN_DATE, b.BOOK_STATUS,c.CAR_IMG,b.BOOK_ID,b.BOOK_SS, c.AVAILABLE  from booking b inner join cars c on c.CAR_ID = b.CAR_ID ORDER BY b.BOOK_ID DESC") as $key => $res) {
          ?>
            <tr class="active-row">
              <td><img src="../images/<?php echo $res['CAR_IMG']; ?>" alt="" width="200" height="150" class="expandable-image" data-src="../images/<?php echo $res['CAR_IMG']; ?>"></td>
              <td><?php echo $res['CAR_ID']; ?></php>
              </td>
              <td><?php echo $res['EMAIL']; ?></php>
              </td>
              <td><?php echo $res['BOOK_PLACE']; ?></php>
              </td>
              <td><?php echo $res['BOOK_DATE']; ?></php>
              </td>
              <td><?php echo $res['PHONE_NUMBER']; ?></php>
              </td>
              <td><?php echo $res['DESTINATION']; ?></php>
              </td>
              <td><?php echo $res['RETURN_DATE']; ?></php>
              </td>
              <td><?php echo ($res['BOOK_STATUS'] == "HIDDEN") ? "RETURNED" : $res['BOOK_STATUS']; ?></php>
              </td>
              <td><img src="../images/<?php echo $res['BOOK_SS'] ?? "default_car.png"; ?>" alt="" width="100" height="100" class="expandable-image" data-src="../images/<?php echo $res['BOOK_SS'] ?? "default_car.png"; ?>"></td>
              <td><img src="../images/<?php echo get_one("SELECT LICENSE_SS from users where EMAIL = '" . $res['EMAIL'] . "'")->LICENSE_SS ?? "default_car.png" ?>" alt="" width="100" height="100" class="expandable-image" data-src="../images/<?php echo get_one("SELECT LICENSE_SS from users where EMAIL = '" . $res['EMAIL'] . "'")->LICENSE_SS ?? "default_car.png" ?>"></td>
              <td><img src="../images/<?php echo get_one("SELECT LICENSE_BACK from users where EMAIL = '" . $res['EMAIL'] . "'")->LICENSE_BACK ?? "default_car.png" ?>" alt="" width="100" height="100" class="expandable-image" data-src="../images/<?php echo get_one("SELECT LICENSE_BACK from users where EMAIL = '" . $res['EMAIL'] . "'")->LICENSE_BACK ?? "default_car.png" ?>"></td>
              <td>
                <div class="actions">
                  <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $res['BOOK_ID']; ?>">
                    <input type="hidden" name="car_id" value="<?php echo $res['CAR_ID']; ?>">
                    <button class="but" name="confirm">CONFIRM</button>
                    <button class="but" name="return">RETURNED</button>
                    <button class="but" name="reject">REJECT</button>
                  </form>

                </div>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <script>
    // Get all expandable images
    const expandableImages = document.querySelectorAll('.expandable-image');

    // Add event listener to each image
    expandableImages.forEach((image) => {
      image.addEventListener('click', () => {
        // Create a new div to hold the expanded image
        const expandedImageContainer = document.createElement('div');
        expandedImageContainer.classList.add('expanded-image');

        // Create a new img element to hold the expanded image
        const expandedImage = document.createElement('img');
        expandedImage.src = image.getAttribute('data-src');

        // Add the expanded image to the container
        expandedImageContainer.appendChild(expandedImage);

        // Add the container to the body
        document.body.appendChild(expandedImageContainer);

        // Add event listener to close the expanded image when clicked outside
        expandedImageContainer.addEventListener('click', (e) => {
          if (e.target === expandedImageContainer) {
            expandedImageContainer.remove();
          }
        });
      });
    });
  </script>
</body>

</html>