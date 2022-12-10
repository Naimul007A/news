<?php
require_once("config.php");
if(empty($_FILES['new-image']['name'])){
   $img=$_POST["old-image"];
    
}else{
   $tmp = $_FILES['new-image']['tmp_name'];
    $img = $_FILES['new-image']['name'];
    move_uploaded_file($tmp, "upload/".$img);
}
       $title=$_POST['post_title'];
        $decs= $_POST['postdesc'];
        $cate=$_POST['category'];
        $id = $_POST['post_id'];
       $cateid = $_POST['cateid'];

      $sql = "UPDATE `post` SET `post_title`='$title',`post_decs`='$decs',`post_cate`='$cate',`post_img`='$img' WHERE post_id=$id;";
      $sql .= "UPDATE `category` SET noPost=noPost-1 WHERE cate_id=$cateid;";
      $sql .= "UPDATE `category` SET noPost=noPost+1 WHERE cate_id=$cate";
        $run = mysqli_multi_query($con,$sql);


 if($run==true){
    header("Location:post.php");
 }

?>