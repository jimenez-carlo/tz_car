<?php include("header.php") ?>
<!-- About Start -->
<div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3"></h1>
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a href="index.php">Home</a></h6>
        <h6 class="text-body m-0 px-3">/</h6>
        <h6 class="text-uppercase text-body m-0">My Booked List</h6>
    </div>
</div>

<div class="container-fluid pt-5">
    <div class="container-fluid pt-5">
        <?= isset($_POST['delete']) ? deleteItem("tbl_booking", "booking_id", $_POST['id']) : "" ?>
        <div class="row">
            <div class="col-lg-12 mb-5">
                <table class="table table-hover text-uppercase">
                    <thead>
                        <tr>
                            <th scope="col">IMG</th>
                            <th scope="col">Car Model</th>
                            <!-- <th scope="col">Client</th> -->
                            <th scope="col">Book Status</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Pickup Location</th>
                            <th scope="col">Mode</th>
                            <th scope="col">Payment Status</th>
                            <th scope="col">Price</th>
                            <th scope="col">Date Created</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (
                            get_list("select 
                            b.booking_id,
                            b.date_start,
                            b.date_end,
                            b.date_created,
                            concat(c.model,' ', c.color) as model,
                            c.img,
                            c.price,
                            concat( u.first_name,' ', u.last_name) as client_name,
                            bs.book_status,
                            pl.location,
                            pm.payment_mode,
                            ps.payment_status
                            from tbl_booking b 
                            inner join tbl_cars c on c.car_id = b.car_id
                            inner join tbl_users u on u.user_id = b.client_id
                            inner join tbl_book_status bs on bs.book_status_id = b.book_status_id
                            inner join tbl_pickup_location pl on pl.pickup_location_id = b.pickup_location_id
                            inner join tbl_payment_mode pm on pm.payment_mode_id = b.payment_mode_id
                            inner join tbl_payment_status ps on ps.payment_status_id = b.payment_status_id
                            where b.deleted_flag = 0 and b.client_id =" . $_SESSION['user']->user_id) as $key => $result
                        ) { ?>
                            <tr>
                                <td><img src="../img/cars/<?= $result['img'] ?>" alt="" style="width:120px;height:120px"></td>
                                <td><?= $result['model'] ?></td>
                                <!-- <td><?= $result['client_name'] ?></td> -->
                                <td><?= $result['book_status'] ?></td>
                                <td><?= $result['date_start'] ?></td>
                                <td><?= $result['date_end'] ?></td>
                                <td><?= $result['location'] ?></td>
                                <td><?= $result['payment_mode'] ?></td>
                                <td><?= $result['payment_status'] ?></td>
                                <td><?= number_format($result['price'] ?? 0, 2) ?></td>
                                <td><?= date_format(new Datetime($result['date_created']), "Y-m-d") ?></td>

                                <td>
                                    <form method="post">
                                        <input type="hidden" name="id" value="<?= $result['booking_id'] ?>">
                                        <!-- <button type="submit" class="btn btn-sm btn-primary" name="delete"><i class="fa-solid fa-trash"></i></button> -->
                                        <a href="booking_edit.php?id=<?= $result['booking_id'] ?>" class="btn btn-sm btn-primary"> <i class="fa-regular fa-pen-to-square"></i> </a>
                                    </form>
                                </td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>

            </div>


        </div>
    </div>
</div>
<!-- About End -->


<?php include("footer.php") ?>