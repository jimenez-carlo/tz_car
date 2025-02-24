<?php include("header.php") ?>
<!-- About Start -->
<div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3"></h1>
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a href="index.php">Home</a></h6>
        <h6 class="text-body m-0 px-3">/</h6>
        <h6 class="text-uppercase text-body m-0">Pick Up Location List</h6>
    </div>
</div>

<div class="container-fluid pt-5">
    <div class="container pt-5">
        <?= isset($_POST['delete']) ? deleteItem("tbl_cars", "car_id", $_POST['id']) : "" ?>
        <div class="row">
            <div class="col-lg-12 mb-5">
                <table class="table table-hover text-uppercase">
                    <thead>
                        <tr>
                            <!-- <th scope="col">Status</th> -->

                            <th scope="col">img</th>
                            <!-- <th scope="col">car_id</th> -->
                            <th scope="col">Model</th>
                            <th scope="col">Year</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Gas</th>
                            <th scope="col">Type</th>
                            <th scope="col">Seater</th>
                            <th scope="col">RFID</th>
                            <th scope="col">Color</th>
                            <th scope="col">Price</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (
                            get_list("select 
                            c.car_id,
                            c.brand_id,
                            c.gas_id,
                            c.car_type_id,
                            c.seater_id,
                            c.car_category_id,
                            c.img,
                            c.rfid,
                            c.model,
                            c.model_year,
                            c.color,
                            c.price,
                            c.deleted_flag,
                            c.date_created,
                            b.brand,
                            g.gas,
                            ct.car_type,
                            s.seater,
                            cc.car_category
                             from tbl_cars c 
                             inner join tbl_brand b on b.brand_id = c.brand_id
                             inner join tbl_gas g on g.gas_id = c.gas_id
                             inner join tbl_car_type ct on ct.car_type_id = c.car_type_id
                             inner join tbl_seater s on s.seater_id = c.seater_id
                             inner join tbl_car_category cc on cc.car_category_id = c.car_category_id
                        where c.deleted_flag = 0 ") as $key => $result
                        ) { ?>
                            <tr>
                                <td><img src="../img/cars/<?= $result['img'] ?>" alt="" style="width:120px;height:120px"></td>
                                <td><?= $result['model'] ?></td>
                                <td><?= $result['model_year'] ?></td>
                                <td><?= $result['brand'] ?></td>
                                <td><?= $result['gas'] ?></td>
                                <td><?= $result['car_type'] ?></td>
                                <td><?= $result['seater'] ?></td>
                                <td><?= ($result['rfid']) ? "YES" : "NO" ?></td>
                                <td><?= $result['color'] ?></td>
                                <td><?= number_format($result['price'], 2) ?></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="id" value="<?= $result['car_id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-primary" name="delete"><i class="fa-solid fa-trash"></i></button>
                                        <a href="cars_edit.php?id=<?= $result['car_id'] ?>" class="btn btn-sm btn-primary"> <i class="fa-regular fa-pen-to-square"></i> </a>
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