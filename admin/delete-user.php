<?php
session_start();
if ($_SESSION['role'] ==1) {
    require_once("Config.php");
    if (isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
        $sql = "DELETE FROM `admin-user` WHERE id=$id";
        $run = mysqli_query($con, $sql);
        if ($run == true) {
            header("Location:users.php");
        } else {
            header("Location:users.php?error");
        }
    } else {
        header("Location:users.php");
    }
}else{
    header("Location:users.php?normaldlt");
}
?>