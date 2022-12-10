<?php
require_once("config.php");


if(isset($_POST['sumbit'])){
    $id = $_POST['cat_id'];
    $name = $_POST['cat_name'];
    $sql = "UPDATE `category` SET `cate_name`='$name' WHERE cate_id=$id";
    $run = mysqli_query($con, $sql);
    if($run==true){
        header("Location:category.php");
    }else{
        header("Location:category.php?error");
    }

}else{
    header("Location:category.php?TTT");
}
?>