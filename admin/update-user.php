
<?php 
if(isset($_REQUEST['id'])){

?>
<?php
session_start();
        if ($_SESSION['role'] ==1) {
?>
<?php include "header.php"; ?>
<?php require_once("config.php"); ?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">

            <?php
            $id = $_REQUEST['id'];
            $sql = "SELECT * FROM `admin-user` WHERE id=$id";
            $run = mysqli_query($con, $sql);
            $row = mysqli_fetch_array($run);

            ?>



                  <!-- Form Start -->
                  <form  action="update_core.php" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="id"  class="form-control" value="<?php echo $row['id'] ?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>Full Name</label>
                          <input type="text" name="name" class="form-control" value="<?php echo $row['name'] ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="usrname" class="form-control" value="<?php echo $row['usr-name'] ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Password</label>
                          <input type="text" name="pass" class="form-control" value="<?php echo $row['pass'] ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role'] ?>">
                            <?php
                            if($row['role']==1){
                           echo'<option Selected value="1">Admin</option>
                            <option value="0">Modaretor</option>';
                              
                             }else{

                echo '  <option Selected value="0">Modaretor</option>
                            <option value="1">Admin</option>';

                                
                              }
                              ?>
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
<?php
   }else{
            header("Location:users.php?normaledit");
   }
?>

<?php
}else{
    header(("Location:users.php"));
}
?>
