<?php include("header.php") ?>
<!-- About Start -->
<div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3"></h1>
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a href="index.php">Home</a></h6>
        <h6 class="text-body m-0 px-3">/</h6>
        <h6 class="text-uppercase text-body m-0">Booking Update</h6>
    </div>
</div>

<div class="container-fluid pt-5">
    <div class="container pt-5">

        <?= isset($_POST['submit']) ? updateBookAdmin(array_merge($_POST, $_FILES)) : "" ?>
        <?php $data = get_one("select * from tbl_booking where booking_id = " . $_GET['id']) ?>
        <div class="row">

            <div class="col-lg-12 mb-5">
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $data->booking_id ?>">
                    <input type="hidden" name="default_img" value="<?= $data->img ?>">
                    <input type="hidden" name="old_book_status_id" value="<?= $data->book_status_id ?>">
                    <div class="bg-secondary p-5">
                        <h3 class="text-primary mb-4">Book Update <select class="px-4 float-end" style="float:right;font-size:1em" required name="book_status_id">
                                <option value="">Status</option>
                                <?php foreach (get_list("select * from tbl_book_status where deleted_flag = 0") as $result) { ?>
                                    <option value="<?= $result['book_status_id'] ?>" <?= ($_POST['book_status_id'] ?? $data->book_status_id) == $result['book_status_id'] ? "selected" : "" ?>><?= $result['book_status'] ?></option>
                                <?php } ?>
                            </select></h3>

                        <div class="row">
                            <div class="col-12 form-group">
                                <select class="custom-select px-4 select2" style="height: 50px; text-transform:uppercase" required name="client_id">
                                    <option value="">Client</option>
                                    <?php foreach (get_list("select * from tbl_users where deleted_flag = 0 and access_id = 3 ") as $result) { ?>
                                        <option value="<?= $result['user_id'] ?>" <?= ($_POST['user_id'] ?? $data->client_id) == $result['user_id'] ? "selected" : "" ?>><?= $result['first_name'] . " " . $result['last_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
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
WHERE (b.car_id IS NULL or b.car_id = $data->car_id )and c.deleted_flag = 0 ") as $result
                                    ) { ?>
                                        <option value="<?= $result['car_id'] ?>" <?= ($_POST['car_id'] ?? $data->car_id) == $result['car_id'] ? "selected" : "" ?>><?= $result['model'] . " | " . $result['color'] . " | " . number_format($result['price'], 2) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Start Date"
                                        data-target="#date1" data-toggle="datetimepicker" name="start_date" value="<?= $_POST['date_start'] ?? $data->date_start ?>" />
                                </div>
                            </div>
                            <div class="col-6 form-group">
                                <div class="date" id="date2" data-target-input="nearest">
                                    <input type="text" class="form-control p-4 datetimepicker-input" placeholder="End Date"
                                        data-target="#date2" data-toggle="datetimepicker" name="end_date" value="<?= $_POST['date_end'] ?? $data->date_end ?>" />
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12 form-group">
                                <select class="custom-select px-4" style="height: 50px;" required name="pickup_location_id">
                                    <option value="">Pickup Location</option>
                                    <?php foreach (get_list("select * from tbl_pickup_location where deleted_flag = 0") as $result) { ?>
                                        <option value="<?= $result['pickup_location_id'] ?>" <?= ($_POST['pickup_location_id'] ?? $data->pickup_location_id) == $result['pickup_location_id'] ? "selected" : "" ?>><?= $result['location'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12 form-group">
                                <input type="number" class="form-control p-4" placeholder="Amount" required="required" name="amount" value="<?= $_POST['amount'] ?? $data->amount ?>">

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-6 form-group">
                                <select class="custom-select px-4" style="height: 50px;" required name="payment_mode_id">
                                    <option value="">Payment Mode</option>
                                    <?php foreach (get_list("select * from tbl_payment_mode where deleted_flag = 0") as $result) { ?>
                                        <option value="<?= $result['payment_mode_id'] ?>" <?= ($_POST['payment_mode_id'] ?? $data->payment_mode_id) == $result['payment_mode_id'] ? "selected" : "" ?>><?= $result['payment_mode'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-6 form-group">
                                <select class="custom-select px-4" style="height: 50px;" required name="payment_status_id">
                                    <option value="">Payment Status</option>
                                    <?php foreach (get_list("select * from tbl_payment_status where deleted_flag = 0") as $result) { ?>
                                        <option value="<?= $result['payment_status_id'] ?>" <?= ($_POST['payment_status_id'] ?? $data->payment_status_id) == $result['payment_status_id'] ? "selected" : "" ?>><?= $result['payment_status'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <img src="../img/payment/<?= $data->img ?>" alt="" id="preview" style="width:300px;height:200px">
                            </div>
                            <div class="col-6 form-group">
                                <img src="../img/default.jfif" alt="" id="preview" style="width:300px;height:auto">
                            </div>
                            <div class="col-12 form-group">
                                <input type="file" class=" input-image" name="img">
                            </div>
                            <!-- <div class="col-12 form-group">
                                <img src="../img/payment/<?= $data->img ?>" alt="" id="preview" style="width:300px;height:200px">
                            </div>
                            <div class="col-12 form-group">
                                <input type="file" class=" input-image" name="img">
                            </div> -->
                        </div>

                        <div class="form-group mb-0">
                            <button class="btn btn-primary btn-block" type="submit" style="height: 50px;" name="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 mb-5">
                <!-- <table class="table table-hover text-uppercase">
                    <thead>
                        <tr>
                            <th scope="col">Status</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach (
                            get_list("select bs.*,bsh.* from tbl_booking_status_history bsh inner join tbl_book_status bs on bs.book_status_id = bsh.booking_status_id where bsh.deleted_flag = 0  and bsh.booking_id = " . $_GET['id'] . " order by bsh.date_created asc") as $key => $result
                        ) { ?>
                            <tr>
                                <td><?= $result['book_status'] ?></td>
                                <td><?= date_format(new Datetime($result['date_created']), "Y-m-d h:m:s") ?></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table> -->

            </div>
        </div>
    </div>
</div>
<!-- About End -->


<?php include("footer.php") ?>