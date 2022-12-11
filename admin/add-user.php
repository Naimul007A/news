
<?php require_once("config.php"); ?>
<?php
session_start();
if ($_SESSION['role'] == 0) {
    header("Location:users.php?normaladd");
}
?>
<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form class="form"  action="add-user_core.php" method ="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Full Name</label>
                          <input type="text" name="name" class="form-control" placeholder="First Name" required>
                      </div>
                          
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option>Select category</option>
                              <option value="0">Moderator</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
    
   

<?php include "footer.php"; ?>
<?php
//     }else{
//         header("Location:users.php?normaladd");
//     }
// ?>