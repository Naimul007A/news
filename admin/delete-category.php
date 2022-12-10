<?php
require_once("config.php");
if(isset($_REQUEST['id'])){
 $id=$_REQUEST['id'];
    $sql = "DELETE FROM `category` WHERE cate_id=$id";
    $run = mysqli_query($con,$sql);
    if($run==true){
     header("Location:category.php");
    }

}else{
    header("Location:category.php");
}

?>