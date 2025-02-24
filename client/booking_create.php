<?php include("header.php") ?>
<!-- About Start -->
<div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3"></h1>
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a href="index.php">Home</a></h6>
        <h6 class="text-body m-0 px-3">/</h6>
        <h6 class="text-uppercase text-body m-0">Book Create</h6>
    </div>
</div>

<div class="container-fluid pt-5">
    <div class="container pt-5">
        <?= isset($_POST['submit']) ? createBookAdmin(array_merge($_POST, $_FILES)) : "" ?>
        <div class="row">

            <div class="col-lg-12 mb-5">
                <form method="post" enctype="multipart/form-data">
                    <div class="bg-secondary p-5">
                        <h3 class="text-primary mb-4">Book Create</h3>

                        <div class="row">
                            <input type="hidden" name="client_id" value="<?= $_SESSION['user']->user_id ?>">
                            <input type="hidden" name="payment_status_id" value="1">

                        </div>
                        <div class="row">
                            <div class="col-12 form-group">
                                <select class="custom-select px-4 select2" style="height: 50px;" required name="car_id">
                                    <option value="">Car Model | Color | Price</option>
                                    <?php foreach (
                                        get_list("SELECT c.* 
FROM tbl_cars c
LEFT JOIN tbl_booking b ON c.car_id = b.car_id 
AND (b.book_status_id NOT IN (3, 4, 6) 
     AND b.date_end > NOW())
WHERE b.car_id IS NULL and c.deleted_flag = 0") as $result
                                    ) { ?>
                                        <option value="<?= $result['car_id'] ?>" <?= ($_POST['car_id'] ?? "") == $result['car_id'] ? "selected" : "" ?>><?= $result['model'] . " | " . $result['color'] . " | " . number_format($result['price'], 2) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Start Date"
                                        data-target="#date1" data-toggle="datetimepicker" name="start_date" />
                                </div>
                            </div>
                            <div class="col-6 form-group">
                                <div class="date" id="date2" data-target-input="nearest">
                                    <input type="text" class="form-control p-4 datetimepicker-input" placeholder="End Date"
                                        data-target="#date2" data-toggle="datetimepicker" name="end_date" />
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12 form-group">
                                <select class="custom-select px-4" style="height: 50px;" required name="pickup_location_id">
                                    <option value="">Pickup Location</option>
                                    <?php foreach (get_list("select * from tbl_pickup_location where deleted_flag = 0") as $result) { ?>
                                        <option value="<?= $result['pickup_location_id'] ?>" <?= ($_POST['pickup_location_id'] ?? "") == $result['pickup_location_id'] ? "selected" : "" ?>><?= $result['location'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12 form-group">
                                <input type="number" class="form-control p-4" placeholder="Amount" required="required" name="amount" value="<?= $_POST['amount'] ?? "" ?>">

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12 form-group">
                                <select class="custom-select px-4" style="height: 50px;" required name="payment_mode_id">
                                    <option value="">Payment Mode</option>
                                    <?php foreach (get_list("select * from tbl_payment_mode where deleted_flag = 0") as $result) { ?>
                                        <option value="<?= $result['payment_mode_id'] ?>" <?= ($_POST['payment_mode_id'] ?? "") == $result['payment_mode_id'] ? "selected" : "" ?>><?= $result['payment_mode'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12 form-group">
                                <img src="../img/payment/default.png" alt="" id="preview" style="width:300px;height:200px">
                            </div>
                            <div class="col-12 form-group">
                                <input type="file" class=" input-image" name="img">
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <button class="btn btn-primary btn-block" type="submit" style="height: 50px;" name="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- About End -->


<?php include("footer.php") ?>