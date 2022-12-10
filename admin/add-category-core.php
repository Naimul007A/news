<?php
require_once("config.php");
if(isset($_POST['save'])){
    $name=$_POST['cat'];
     $sql = "INSERT INTO `category`(`cate_name`) VALUES ('$name') ";
    $run = mysqli_query($con,$sql);
    if($run==true){
       header("Location:category.php");
    }
     
}else{
    header("Location:category.php"); 
}   
     

?>