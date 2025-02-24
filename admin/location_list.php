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
        <?= isset($_POST['delete']) ? deleteItem("tbl_pickup_location", "pickup_location_id", $_POST['id']) : "" ?>
        <div class="row">
            <div class="col-lg-12 mb-5">
                <table class="table table-hover text-uppercase">
                    <thead>
                        <tr>
                            <!-- <th scope="col">Status</th> -->
                            <th scope="col">Pick Up Location</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (
                            get_list("select * from tbl_pickup_location
                        where deleted_flag = 0 ") as $key => $result
                        ) { ?>
                            <tr>
                                <td><?= $result['location'] ?></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="id" value="<?= $result['pickup_location_id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-primary" name="delete"><i class="fa-solid fa-trash"></i></button>
                                        <a href="location_edit.php?id=<?= $result['pickup_location_id'] ?>" class="btn btn-sm btn-primary"> <i class="fa-regular fa-pen-to-square"></i> </a>
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