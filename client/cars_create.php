<?php include("header.php") ?>
<!-- About Start -->
<div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3"></h1>
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a href="index.php">Home</a></h6>
        <h6 class="text-body m-0 px-3">/</h6>
        <h6 class="text-uppercase text-body m-0">Car Create</h6>
    </div>
</div>

<div class="container-fluid pt-5">
    <div class="container pt-5">
        <?= isset($_POST['submit']) ? createCar(array_merge($_POST, $_FILES)) : "" ?>
        <div class="row">

            <div class="col-lg-12 mb-5">
                <form method="post" enctype="multipart/form-data">
                    <div class="bg-secondary p-5">
                        <h3 class="text-primary mb-4">Create Car</h3>
                        <div class="row">
                            <div class="col-12 form-group">
                                <img src="../img/cars/default.png" alt="" id="preview" style="width:300px;height:200px">
                            </div>
                            <div class="col-12 form-group">
                                <input type="file" class=" input-image" name="img">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" placeholder="Model" required="required" name="model" value="<?= $_POST['model'] ?? "" ?>">
                            </div>
                            <div class="col-6 form-group">
                                <input type="year" class="form-control p-4" placeholder="Model Year" required="required" name="model_year" value="<?= $_POST['model_year'] ?? "" ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <select class="custom-select px-4" style="height: 50px;" required name="brand_id">
                                    <option value="">Brand</option>
                                    <?php foreach (get_list("select * from tbl_brand where deleted_flag = 0") as $result) { ?>
                                        <option value="<?= $result['brand_id'] ?>" <?= ($_POST['brand_id'] ?? "") == $result['brand_id'] ? "selected" : "" ?>><?= $result['brand'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-6 form-group">
                                <select class="custom-select px-4" style="height: 50px;" required name="car_category_id">
                                    <option value="">Category</option>
                                    <?php foreach (get_list("select * from tbl_car_category where deleted_flag = 0") as $result) { ?>
                                        <option value="<?= $result['car_category_id'] ?>" <?= ($_POST['car_category_id'] ?? "") == $result['car_category_id'] ? "selected" : "" ?>><?= $result['car_category'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <select class="custom-select px-4" style="height: 50px;" required name="car_type_id">
                                    <option value="">Type</option>
                                    <?php foreach (get_list("select * from tbl_car_type where deleted_flag = 0") as $result) { ?>
                                        <option value="<?= $result['car_type_id'] ?>" <?= ($_POST['car_type_id'] ?? "") == $result['car_type_id'] ? "selected" : "" ?>><?= $result['car_type'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-6 form-group">
                                <select class="custom-select px-4" style="height: 50px;" required name="gas_id">
                                    <option value="">Gas</option>
                                    <?php foreach (get_list("select * from tbl_gas where deleted_flag = 0") as $result) { ?>
                                        <option value="<?= $result['gas_id'] ?>" <?= ($_POST['gas_id'] ?? "") == $result['gas_id'] ? "selected" : "" ?>><?= $result['gas'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <select class="custom-select px-4" style="height: 50px;" required name="seater_id">
                                    <option value="">Seater</option>
                                    <?php foreach (get_list("select * from tbl_seater where deleted_flag = 0") as $result) { ?>
                                        <option value="<?= $result['seater_id'] ?>" <?= ($_POST['seater_id'] ?? "") == $result['seater_id'] ? "selected" : "" ?>><?= $result['seater'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-6 form-group">
                                <input type="number" class="form-control p-4" placeholder="Price" required="required" name="price" value="<?= $_POST['price'] ?? "" ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <select class="custom-select px-4" style="height: 50px;" required name="rfid">
                                    <option value="">RFID</option>
                                    <option value="1" <?= ($_POST['rfid'] ?? "") == 1 ? "selected" : "" ?>>YES</option>
                                    <option value="0" <?= ($_POST['rfid'] ?? "") == 0 ? "selected" : "" ?>>NO</option>
                                </select>
                            </div>
                            <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" placeholder="Color" required="required" name="color" value="<?= $_POST['color'] ?? "" ?>">
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