<?php  
//include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['user_master_id'])) {
    
    $sql = "SELECT * FROM user_master where is_deleted = 0 ORDER BY user_master_id ASC";//where is_delete==0
    $res = mysqli_query($conn, $sql);
}else{
	header("Location: ../login.php");
}