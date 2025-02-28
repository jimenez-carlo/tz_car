<?php include("header.php") ?>

<!-- Registration Start -->
<div class="container-fluid py-5">
  <div class="container pt-5 pb-3">
    <h1 class="display-4 text-uppercase text-center mb-5">Signup Now</h1>
    <?= isset($_POST['submit']) ? createUser($_POST) : "" ?>
    <div class="row">
      <div class="col-lg-12 mb-2">
        <div class="contact-form bg-light mb-4" style="padding: 30px;">
          <form method="post">
            <input type="hidden" name="access_id" value="3">
            <div class="row">
              <div class="col-6 form-group">
                <input type="text" class="form-control p-4" placeholder="First Name" required="required" name="first_name">
              </div>
              <div class="col-6 form-group">
                <input type="text" class="form-control p-4" placeholder="Last Name" required="required" name="last_name">
              </div>
            </div>
            <div class="row">
              <div class="col-6 form-group">
                <input type="text" class="form-control p-4" placeholder="Username" required="required" name="username">
              </div>
              <div class="col-6 form-group">
                <input type="email" class="form-control p-4" placeholder="Email" required="required" name="email">
              </div>
            </div>
            <div class="form-group">
              <input type="password" class="form-control p-4" placeholder="Password" required="required" name="password">
            </div>
            <div class="form-group">
              <input type="number" class="form-control p-4" placeholder="Phone No" required="required" name="phone_no">
            </div>
            <div class="form-group">
              <select class="custom-select px-4 mb-3" style="height: 50px;" name="gender_id" required>
                <option selected>Gender</option>
                <?php foreach (get_list("select * from tbl_gender where deleted_flag = 0") as $gender) { ?>
                  <option value="<?= $gender['gender_id'] ?>"><?= $gender['gender'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div>
              <button class="btn btn-primary py-3 px-5" type="submit" name="submit">Register</button>
            </div>
          </form>
        </div>
      </div>
      <!-- <div class="col-lg-5 mb-2">
        <div class="bg-secondary d-flex flex-column justify-content-center px-5 mb-4" style="height: 435px;">
          <div class="d-flex mb-3">
            <i class="fa fa-2x fa-map-marker-alt text-primary flex-shrink-0 mr-3"></i>
            <div class="mt-n1">
              <h5 class="text-light">Address</h5>
              <p>Urdaneta,
                Pangasinan,
                55060</p>
            </div>
          </div>
          <div class="d-flex mb-3">
            <i class="fa fa-2x fa-envelope-open text-primary flex-shrink-0 mr-3"></i>
            <div class="mt-n1">
              <h5 class="text-light">Email</h5>
              <p>tzcarrental@gmail.com</p>
            </div>
          </div>
          <div class="d-flex">
            <i class="fa fa-2x fa-phone text-primary flex-shrink-0 mr-3"></i>
            <div class="mt-n1">
              <h5 class="text-light">Phone</h5>
              <p class="m-0">0961-428-4823</p>
            </div>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</div>
<!-- Contact End -->


<!-- Vendor Start -->
<!-- <div class="container-fluid py-5">
  <div class="container py-5">
    <div class="owl-carousel vendor-carousel">
      <div class="bg-light p-4">
        <img src="img/vendor-1.png" alt="">
      </div>
      <div class="bg-light p-4">
        <img src="img/vendor-2.png" alt="">
      </div>
      <div class="bg-light p-4">
        <img src="img/vendor-3.png" alt="">
      </div>
      <div class="bg-light p-4">
        <img src="img/vendor-4.png" alt="">
      </div>
      <div class="bg-light p-4">
        <img src="img/vendor-5.png" alt="">
      </div>
      <div class="bg-light p-4">
        <img src="img/vendor-6.png" alt="">
      </div>
      <div class="bg-light p-4">
        <img src="img/vendor-7.png" alt="">
      </div>
      <div class="bg-light p-4">
        <img src="img/vendor-8.png" alt="">
      </div>
    </div>
  </div>
</div> -->
<!-- Vendor End -->

<?php include("footer.php") ?>