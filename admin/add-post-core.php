
<?php
require_once("config.php");

$tmp=$_FILES["fileToUpload"]["tmp_name"];
$img = $_FILES["fileToUpload"]["name"];
move_uploaded_file($tmp,"upload/".$img);


$title=$_POST['post_title'];
$decs= $_POST['postdesc'];
$cate=$_POST['category'];
$athr=$_POST['athr'];
$date=date("d M,Y");

  $sql ="INSERT INTO `post`(`post_title`, `post_decs`, `post_cate`, `post_ath`, `post_img`,`post_date`) VALUES ('$title','$decs','$cate','$athr','$img','$date');";
  $sql .= "UPDATE `category` SET noPost=noPost+1 WHERE cate_id=$cate";

 echo $run =mysqli_multi_query($con,$sql)or die("error");
 if($run==true){
    header("Location:post.php");
 }
     
     

?>