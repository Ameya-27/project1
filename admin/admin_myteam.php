<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['user_master_id'])) {
    $page_title = "admin";
    include "../master/db_conn.php";
    include "../master/pre-header.php";
    include "../master/header.php";
    include "../master/navbar.php";
?>
    <html>

    <body>
        <div class="side-nav">
            <div class="side-nav-inner">
                <ul class="side-nav-menu scrollable">
                    <li class="nav-item dropdown">
                        <a href="admin-dashboard.php">
                            <span class="icon-holder">

                            </span>
                            <span class="title">DASHBOARD</span>
                        </a>
                        <a href="../department/create_dept.php">
                            <span class="icon-holder">

                            </span>
                            <span class="title">DEPEARTMENT</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="javascript:void(0);">
                            <span class="icon-holder">
                                <i class="anticon anticon-pie-chart"></i>
                            </span>
                            <span class="title">EMPLOYEE</span>
                            <span class="arrow">
                                <i class="arrow-icon"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="admin_myteam.php">MYTEAM</a>
                            </li>
                            <li>
                                <a href="allEmployee.php">ALL EMPLOYEE</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </body>

    </html>
    <?php
    $id = $_SESSION['user_master_id'];
    $sql = "SELECT * FROM user_master where is_deleted = 0 AND manager_id = '$id' ORDER BY user_master_id ASC"; //where is_delete==0
    $res = mysqli_query($conn, $sql);
    ?>
    <html>

    <body>
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
            <div class="p-3">
                <?php 
                $id = $_SESSION['user_master_id'];
                $sql = "SELECT * FROM user_master where is_deleted = 0 AND manager_id = '$id' ORDER BY user_master_id ASC"; //where is_delete==0
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) { ?>

                    <h1 class="display-4 fs-1">Members</h1>
                    <table class="table" style="width: 32rem;">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">User name</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            while ($rows = mysqli_fetch_assoc($res)) { ?>
                                <tr>
                                    <th scope="row"><?= $i ?></th>
                                    <td><?= $rows['name'] ?></td>
                                    <td><?= $rows['email'] ?></td>
                                    <td><?= $rows['role'] ?></td>
                                    <td>
                                        <a class="btn btn-danger" href="delete.php?Id=<?php echo $row['Id']; ?>">
                                            Delete </a>
                                    </td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>


        </div>
    </body>

    </html>
<?php
    // content end
    include "../master/footer.php";
    include "../master/after-footer.php";
} else {
    header('Location:../login.php');
}
?>