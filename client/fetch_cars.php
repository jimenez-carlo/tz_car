<?php
include('../includes/functions.php');
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if (!isset($_SESSION['user']) || $_SESSION['user']->access_id != 3) {
  header('location:../logout.php');
  exit;
}

$cars = get_list("SELECT c.*, b.BOOK_STATUS
                  FROM booking b
                  INNER JOIN cars c ON b.CAR_ID = c.CAR_ID
                  WHERE c.AVAILABLE = 'Y'
                    AND b.EMAIL = '" . $_SESSION['user']->EMAIL . "'
                    AND b.BOOK_STATUS IN ('REJECTED', 'RETURNED')");
// $cars = get_list("SELECT c.* FROM cars c 
//                   WHERE c.AVAILABLE = 'Y'
//                     ");




foreach ($cars as $result) {
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
<?php
}
?>