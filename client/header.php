<?php include('../includes/functions.php') ?>
<?php
if (isset($_SESSION['user'])) {
  if ($_SESSION['user']->access_id == 3) {
  } else {
    header('location:../logout.php');
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

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap4.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap4.css">


    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <!-- Template Stylesheet -->
    <!-- <link href="css/style.css" rel="stylesheet"> -->

  </head>
  <style>
    .select2-selection__rendered {
      line-height: 50px !important;
    }

    .select2-container .select2-selection--single {
      height: 50px !important;
    }

    .select2-selection__arrow {
      height: 50px !important;
    }
  </style>

  <body>


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
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
              <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle <?= strpos($_SERVER['REQUEST_URI'], 'booking') !== false ? "active" : ""  ?>" data-toggle="dropdown">Booking</a>
                <div class="dropdown-menu rounded-0 m-0">
                  <a href="booking_list.php" class="dropdown-item <?= strpos($_SERVER['REQUEST_URI'], 'booking_list.php') !== false ? "active" : ""  ?>">My Book</a>
                  <a href="booking_create.php" class="dropdown-item <?= strpos($_SERVER['REQUEST_URI'], 'booking_create.php') !== false ? "active" : ""  ?>">Create</a>
                </div>
              </div>



              <a href="../logout.php" class="nav-item nav-link">Logout</a>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <!-- Navbar End -->