<?php
require_once("config.php");
if(isset($_REQUEST['id'])){
    $id=$_REQUEST['id'];
    $cate=$_REQUEST['cateid'];
    $sql1 = "SELECT * FROM `post` WHERE post_id=$id";
    $run1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_array($run1);
    $img1=$row1['post_img'];
    unlink("upload/" . $img1);
    
    $sql = "DELETE FROM `post` WHERE post_id=$id;";
    $sql .= "UPDATE `category` SET noPost=noPost-1 WHERE cate_id=$cate";
    $run = mysqli_multi_query($con,$sql);
    if($run==true){
     header("Location:post.php");
    }

}else{
    header("Location:post.php");
}

?>