<?php
session_start();
if(isset($_SESSION["id"])){

?>
<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Add New Post</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <form class="form" action="add-post-core.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Title</label>
                          <input type="text" name="post_title" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1"> Description</label>
                          <textarea name="postdesc" class="form-control" rows="5"  required></textarea>
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Category</label>
                          <select name="category" class="form-control">
                            <option value="Select Category" selected> Select Category</option>
                            <?php
                                 require_once("config.php");
                                 $sql = "SELECT * FROM `category`";
                                $run = mysqli_query($con, $sql);
                                if($run==true){
                                    while($row=mysqli_fetch_array($run)){
                                 $name = $row['cate_name'];
                             ?>
                            
                                 <option value="<?php echo $row['cate_id'];?>" > <?php echo$name ?></option>
                                 
                              <?php
                                }
                                }
                            ?>

                          </select>
                      </div>

                      <div class="form-group">
                          <input type="hidden" name="athr"  class="form-control" value="<?php echo $_SESSION['role']; ?>">
                      </div>
                      <div class="form-group">
                          <label for="exampleInputPassword1">Post image</label>
                          <input type="file" name="fileToUpload" required>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
<?php
}else{
    header("Location:index.php");
}
?>