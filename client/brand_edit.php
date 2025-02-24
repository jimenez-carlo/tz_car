<?php include("header.php") ?>
<!-- About Start -->
<div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3"></h1>
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a href="index.php">Home</a></h6>
        <h6 class="text-body m-0 px-3">/</h6>
        <h6 class="text-uppercase text-body m-0">Brand Update</h6>
    </div>
</div>

<div class="container-fluid pt-5">
    <div class="container pt-5">

        <?= isset($_POST['submit']) ? updateBrand($_POST) : "" ?>
        <?php $data = get_one("select * from tbl_brand where brand_id = " . $_GET['id']) ?>
        <div class="row">

            <div class="col-lg-12 mb-5">
                <form method="post">
                    <div class="bg-secondary p-5">
                        <h3 class="text-primary mb-4">Edit Brand</h3>
                        <input type="hidden" name="id" value="<?= $data->brand_id ?>">
                        <div class="row">
                            <div class="col-12 form-group">
                                <input type="text" class="form-control p-4" placeholder="Brand Name" required="required" name="brand" value="<?= $_POST['brand'] ?? $data->brand ?>">
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