<form method="post">
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="loginModalLabel">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?= (isset($_POST['loginUser'])) ? loginUser($_POST) : ''; ?>
          <div class="form-group">
            <input class="form-control form-control-lg" type="text" placeholder="Username or Email" name="username" required autocomplete="off" inputmode="none">
          </div>
          <div class="form-group">
            <input class="form-control form-control-lg" type="password" placeholder="Password" name="password" required autocomplete="off" inputmode="none">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="loginUser">Login</button>
          <div style="display: block;width:100%">
            <p class="link">Don't have an account?
              <a href="registration.php">Sign up</a> here
            </p>
          </div>
        </div>

      </div>
    </div>
  </div>
</form>

<!-- <div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
  <p class="mb-2 text-center text-body">&copy; <a href="#">TZ CAR RENTAL</a>. All Rights Reserved.</p>
</div> -->
<!-- Footer End -->



<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="../lib/easing/easing.min.js"></script>
<script src="../lib/waypoints/waypoints.min.js"></script>
<script src="../lib/owlcarousel/owl.carousel.min.js"></script>
<script src="../lib/tempusdominus/js/moment.min.js"></script>
<script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Template Javascript -->
<script src="../js/main.js"></script>
<script>
  $(document).ready(function() {
    //  load table
    new DataTable('table', {
      ordering: false // Disables sorting on all columns
    });

    // load image
    if ($(".input-image").length && $("#preview").length) {
      $(".input-image").on("change", function(evt) {
        const file = this.files[0];
        if (file) {
          $("#preview").attr("src", URL.createObjectURL(file));
        }
      });
    }

    $('.select2').select2();
  });
</script>

</body>

</html>