<?php include("header.php") ?>
<!-- About Start -->
<div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3"></h1>
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a href="index.php">Home</a></h6>
        <h6 class="text-body m-0 px-3">/</h6>
        <h6 class="text-uppercase text-body m-0">User Update</h6>
    </div>
</div>

<div class="container-fluid pt-5">
    <div class="container pt-5">

        <?= isset($_POST['submit']) ? updateUser($_POST) : "" ?>
        <?php $data = get_one("select * from tbl_users where user_id = " . $_GET['id']) ?>
        <div class="row">

            <div class="col-lg-12 mb-5">
                <form method="post">
                    <div class="bg-secondary p-5">
                        <h3 class="text-primary mb-4">Create Client</h3>
                        <input type="hidden" name="id" value="<?= $data->user_id ?>">
                        <input type="hidden" name="access_id" value="3">
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" placeholder="First Name" required="required" name="first_name" value="<?= $_POST['first_name'] ?? $data->first_name ?>">
                            </div>
                            <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" placeholder="Last Name" required="required" name="last_name" value="<?= $_POST['last_name'] ?? $data->last_name ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="email" class="form-control p-4" placeholder="Email" required="required" name="email" value="<?= $_POST['email'] ?? $data->email ?>">
                            </div>
                            <div class="col-6 form-group">
                                <input type="number" class="form-control p-4" placeholder="Phone no" required="required" name="phone_no" value="<?= $_POST['phone_no'] ?? $data->phone_no ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" placeholder="Username" required="required" name="username" value="<?= $_POST['username'] ?? $data->username ?>">
                            </div>
                            <div class="col-6 form-group">
                                <input type="password" class="form-control p-4" placeholder="Password" required="required" name="password" value="<?= $_POST['password'] ?? "" ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 form-group">
                                <select class="custom-select px-4" style="height: 50px;" required name="gender_id">
                                    <option value="">Gender</option>
                                    <?php foreach (get_list("select * from tbl_gender where deleted_flag = 0") as $result) { ?>
                                        <option value="<?= $result['gender_id'] ?>" <?= ($_POST['gender_id'] ?? $data->gender_id) == $result['gender_id'] ? "selected" : "" ?>><?= $result['gender'] ?></option>
                                    <?php } ?>
                                </select>
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