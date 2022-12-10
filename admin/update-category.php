<?php
session_start();
if(isset($_SESSION["id"])){

?>
<?php 
if(isset($_REQUEST['id'])){
?>
<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">

              <?php
              require_once("config.php");
             $id = $_REQUEST['id'];
              $sql = "SELECT * FROM `category` WHERE cate_id=$id";
              $run = mysqli_query($con,$sql);
             $row = mysqli_fetch_array($run);
             ?>
              
                  <form action="update-category-core.php" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['cate_id']?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['cate_name']?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                  </form>
               
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
<?php
}else{
  header("Locaton:category.php");
}?>
<?php
}else{
    header("Location:index.php");
}
?>
