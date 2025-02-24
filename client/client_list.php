<?php include("header.php") ?>
<!-- About Start -->
<div class="container-fluid page-header">
    <h1 class="display-3 text-uppercase text-white mb-3"></h1>
    <div class="d-inline-flex text-white">
        <h6 class="text-uppercase m-0"><a href="index.php">Home</a></h6>
        <h6 class="text-body m-0 px-3">/</h6>
        <h6 class="text-uppercase text-body m-0">User list</h6>
    </div>
</div>

<div class="container-fluid pt-5">
    <div class="container pt-5">
        <?= isset($_POST['delete']) ? deleteItem("tbl_users", "user_id", $_POST['id']) : "" ?>
        <div class="row">
            <div class="col-lg-12 mb-5">
                <table class="table table-hover text-uppercase">
                    <thead>
                        <tr>
                            <!-- <th scope="col">Status</th> -->
                            <th scope="col">Role</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone No.</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach (
                            get_list("select * from 
                        tbl_users u 
                        inner join tbl_access a on a.access_id = u.access_id 
                        inner join tbl_gender g on g.gender_id = u.gender_id 
                        inner join tbl_user_status us on us.user_status_id = u.user_status_id 
                        where u.deleted_flag = 0 and u.access_id = 3") as $key => $result
                        ) { ?>
                            <tr>
                                <!-- <td><?= $result['user_status'] ?></td> -->
                                <td><?= $result['role'] ?></td>
                                <td><?= $result['first_name'] ?></td>
                                <td><?= $result['last_name'] ?></td>
                                <td><?= $result['gender'] ?></td>
                                <td><?= $result['username'] ?></td>
                                <td><?= $result['email'] ?></td>
                                <td><?= $result['phone_no'] ?></td>
                                <td>
                                    <form method="post">
                                        <input type="hidden" name="id" value="<?= $result['user_id'] ?>">
                                        <button type="submit" class="btn btn-sm btn-primary" name="delete"><i class="fa-solid fa-trash"></i></button>
                                        <a href="client_edit.php?id=<?= $result['user_id'] ?>" class="btn btn-sm btn-primary"> <i class="fa-regular fa-pen-to-square"></i> </a>
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