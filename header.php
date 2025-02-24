<?php include('includes/functions.php') ?>
<?php
if (isset($_SESSION['user'])) {
  if ($_SESSION['user']->access_id == 1 || $_SESSION['user']->access_id == 2) {
    header('location:admin');
  } else if ($_SESSION['user']->access_id == 3) {
    header('location:client');
  }
} ?>
<!DOCTYPE php>
<php lang="en">

  <head>
    <meta charset="utf-8">
    <title>TZ CAR RENTAL</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free php Templates" name="keywords">
    <meta content="Free php Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <!-- <link href="css/style.css" rel="stylesheet"> -->
  </head>

  <body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
      <div class="row">
        <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
          <div class="d-inline-flex align-items-center">
            <a class="text-body pr-3" href=""><i class="fa fa-phone-alt mr-2"></i>+0961-428-4823</a>
            <span class="text-body">|</span>
            <a class="text-body px-3" href=""><i class="fa fa-envelope mr-2"></i>tzcarrental@gmail.com</a>
          </div>
        </div>
        <div class="col-md-6 text-center text-lg-right">
          <div class="d-inline-flex align-items-center">
            <a class="text-body px-3" href="">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a class="text-body px-3" href="">
              <i class="fab fa-twitter"></i>
            </a>
            <a class="text-body px-3" href="">
              <i class="fab fa-linkedin-in"></i>
            </a>
            <a class="text-body px-3" href="">
              <i class="fab fa-instagram"></i>
            </a>
            <a class="text-body pl-3" href="">
              <i class="fab fa-youtube"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
      <!-- <div class="position-relative px-lg-5" style="z-index: 9;"> -->
      <div class="position-relative" style="z-index: 9;">
        <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
          <a href="" class="navbar-brand">
            <h1 class="text-uppercase text-primary mb-1">TZ CAR RENTAL</h1>
          </a>
          <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
            <div class="navbar-nav ml-auto py-0">
              <a href="index.php" class="nav-item nav-link <?= strpos($_SERVER['REQUEST_URI'], 'index.php') !== false ? "active" : ""  ?>">Home</a>
              <a href="about.php" class="nav-item nav-link <?= strpos($_SERVER['REQUEST_URI'], 'about.php') !== false ? "active" : ""  ?>">About</a>
              <a href="contact.php" class="nav-item nav-link <?= strpos($_SERVER['REQUEST_URI'], 'contact.php') !== false ? "active" : ""  ?>">Contact</a>
              <a href="#" class="nav-item nav-link <?= strpos($_SERVER['REQUEST_URI'], 'admin.php') !== false ? "active" : ""  ?>" data-toggle="modal" data-target="#loginModal">Login</a>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <!-- Navbar End -->


    <!-- Search Start -->
    <!-- <form method="get">
      <div class="container-fluid bg-white pt-3 px-lg-5">
        <div class="row mx-n2">
          <div class="col-xl-4 col-lg-6 col-md-6 px-2">
            <select class="custom-select px-4 mb-3" style="height: 50px;" name="pickup_location_id">
              <option selected>Pickup Location</option>
              <?php foreach (get_list("select * from tbl_pickup_location where deleted_flag = 0") as $location) { ?>
                <option value="<?= $location['pickup_location_id'] ?>"><?= $location['location'] ?></option>
              <?php } ?>
            </select>
          </div>

    <div class="col-xl-2 col-lg-6 col-md-6 px-2">
      <div class="date mb-3" id="date" data-target-input="nearest">
        <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Pickup Date"
          data-target="#date" data-toggle="datetimepicker" name="pickup_date" />
      </div>
    </div>
    <div class="col-xl-2 col-lg-6 col-md-6 px-2">
      <div class="date mb-3" id="date2" data-target-input="nearest">
        <input type="text" class="form-control p-4 datetimepicker-input" placeholder="End Date"
          data-target="#date2" data-toggle="datetimepicker" name="end_date" />
      </div>
    </div>

    <div class="col-xl-2 col-lg-6 col-md-6 px-2">
      <select class="custom-select px-4 mb-3" style="height: 50px;" name="car_">
        <option selected>Select A Car</option>
        <?php foreach (
          get_list("select c.* from tbl_cars c where c.deleted_flag = 0 and c.car_id IN (
    SELECT MIN(car_id) FROM tbl_cars WHERE deleted_flag = 0 GROUP BY model
)") as $car
        ) { ?>
          <option value="<?= $car['car_id'] ?>"><?= $car['model'] ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="col-xl-2 col-lg-4 col-md-6 px-2">
      <button class="btn btn-primary btn-block mb-3" type="submit" style="height: 50px;">Search</button>
    </div>
    </div>
    </div>
    </form> -->
    <!-- Search End -->