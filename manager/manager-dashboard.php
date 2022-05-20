<?php
session_start();
$page_title = "Manger";
include "../master/db_conn.php";
include "../master/pre-header.php";
include "../master/header.php";
//include "../master/navbar.php";
include "../master/breadcrumbs.php";
?>
<html>

<body>
    <div class="p-3">

        <div class="card-body text-center">
            <h5 class="card-title">
                <?= $_SESSION['name'] ?>
            </h5>
            <a href="../logout.php" class="btn btn-dark">Logout</a>
        </div>
        <?php include 'managerlist.php';
        if (mysqli_num_rows($result) > 0) { ?>

            <h1 class="display-4 fs-1">Managers</h1>
            <table class="table" style="width: 32rem;">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">DEPARTMENT_ID</th>
                        <th scope="col">DEPARTMENT_NAME</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($rows = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <th scope="row"><?= $rows['user_master_id'] ?></th>
                            <td><?= $rows['name'] ?></td>
                            <td><?= $rows['email'] ?></td>
                            <td><?= $rows['dept_id'] ?></td>
                            <td><?= $rows['dept_name'] ?></td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>



</body>

</html>

<?php
// content end
include "../master/footer.php";
include "../master/after-footer.php";
?>