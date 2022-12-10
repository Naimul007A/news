<?php
require_once("config.php");
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $usr = $_POST['usrname'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];
    $sql = "UPDATE `admin-user` SET `name`='$name',`usr-name`='$usr',`pass`='$pass',`role`='$role' WHERE id=$id";
    $run = mysqli_query($con, $sql);

    if($run==true){
        header("Location:users.php");
    }else{
        header("Location:Update-user.php?error");
    }

}else{
    header("Location:users.php");
}
?>