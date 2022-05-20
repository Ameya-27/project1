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
    include "../master/breadcrumbs.php";
    ?>
    <html>

    <body>
        <div class="container d-flex align-items-center" style="min-height: 30vh">
            <!-- For Admin 
		<div class="card" style="width: 18rem;">
			<img src="../assets/images/others/admin-default.png" class="card-img-top" alt="admin image">
			<div class="card-body text-center">
				<h5 class="card-title">
					<?= $_SESSION['name'] ?>
				</h5>
				<a href="../logout.php" class="btn btn-dark">Logout</a>
			</div>

		</div>-->
            <div class="p-3">
                <?php include '../master/members.php';
                if (mysqli_num_rows($res) > 0) { ?>
                    <h1 class="display-4 fs-1">Members</h1>
                    <a class="btn btn-primary" href="../create.php">Add new</a>
                    <table class="table" style="width: 32rem;">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
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
                                    
                                    <td><?= $rows['user_master_id'] ?></td>
                                    <td><?= $rows['name'] ?></td>
                                    <td><?= $rows['email'] ?></td>
                                    <td><?= $rows['role'] ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="update.php?Id=<?php echo $rows['user_master_id']; ?> &name=<?php echo $rows['name']; ?> &email=<?php echo $rows['email']; ?> &role=<?php echo $rows['role']; ?>"> Edit </a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-success deletebtn">DELETE</button>
                                    </td>
                                </tr>
                            <?php $i++;
                            } ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>


        </div>
        <script>
            $(document).ready(function() {

                $('.deletebtn').on('click', function() {

                    $('#deletemodal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#delete_id').val(data[0]);

                });
            });
        </script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- ########################################################################## -->
<!-- delete popup form -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete department</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="delete.php" method='post'>
                            <div class="modal-body">
                                <input type="hidden" name="delete_id" id="delete_id">
                                <h4> Do you want to Delete this Data ??</h4>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                <button type="submit" class="btn btn-primary" name="deletedata" value="deletedata">Yes !! Delete it.</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
<!-- delete popup form -->
        <!-- ########################################################################## -->
        <script>
            $(document).ready(function() {

                $('.deletebtn').on('click', function() {

                    $('#deletemodal').modal('show');

                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function() {
                        return $(this).text();
                    }).get();

                    console.log(data);

                    $('#delete_id').val(data[0]);

                });
            });
        </script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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