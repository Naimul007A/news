<?php
session_start();
if(isset($_SESSION["id"])){
  if(isset($_REQUEST['id'])){

 ?>
<?php include "header.php"; ?>
<?php require_once("config.php");?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <?php
        $id = $_REQUEST['id'];
        $cateid = $_REQUEST['cateid'];
        $sql = "SELECT * FROM `post` WHERE post_id=$id";
        $run = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($run);
        
        ?>
        <form action="upadte-post_core.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $row['post_id'] ?>" placeholder="">
            </div>
            <div class="form-group">
                <input type="hidden" name="cateid"  class="form-control" value="<?php echo $cateid ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $row['post_title'] ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5"><?php echo $row['post_decs'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
                    
                    <?php
                        $sql1 = "SELECT * FROM `category`";
                        $run1 = mysqli_query($con, $sql1);
                        if($run1==true){
                            while($result1=mysqli_fetch_array($run1)){
                                if($cateid==$result1['cate_id']){
                                $selected = "selected";
                                }else{
                                    $selected = "";   
                                }
                               ?>
                             <option <?php echo$selected?> value="<?php echo $result1['cate_id'] ?>"><?php echo $result1['cate_name'] ?></option>
                               <?php 
                            }
                        }
                    ?>
                    
                    
                    
                </select>
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img  src="upload/<?php echo $row['post_img'] ?>" height="150px">
                <input type="hidden" name="old-image" value="<?php echo $row['post_img'] ?>">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
<?php 
 }else{
    header("Location:Post.php");
}
?>
<?php
}else{
    header("Location:index.php");
}
?>