<?php
require_once("config.php");
 $name=$_POST['name'];
$usr= $_POST['user'];
$pass=$_POST['password'];
$role=$_POST['role'];

 $sql = "INSERT INTO `admin-user`(`name`, `usr-name`, `pass`, `role`) VALUES ('$name','$usr','$pass','$role') ";
 $run = mysqli_query($con,$sql);
 if($run==true){
    header("Location:users.php");
 }
     
     

?>