
<?php session_start();?>
<?php include "header.php"; ?>
<?php require_once("config.php")?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">
                <?php 
                if(isset($_REQUEST["normaladd"])){
                    ?>
                 <div class="alert alert-danger" role="alert">
                    You Couldn't Be Add User !
                  </div>
                 <?php 
                }elseif(isset($_REQUEST["normaledit"])){
                ?>
                <div class="alert alert-danger" role="alert">
                    You Couldn't Be Edit Users Info !
                  </div>
                <?php 
                }elseif(isset($_REQUEST["normaldlt"])){
                    ?>
                    <div class="alert alert-danger" role="alert">
                       You Couldn't Be Delete Users Info !
                      </div>
                    <?php 
                    }
                    ?>
                
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Name</th>
                          <th>User-Name</th>
                          <th>Password</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                        
                     <?php
                      $sql = "SELECT * FROM `admin-user`";
                      $run = mysqli_query($con, $sql);
                     $count = 1;
                      while($row=mysqli_fetch_array( $run )){

                      ?><tbody>
                        <tr>
                           <td class='id'><?php echo $count;$count++;?></td>
                              <td><?php echo $row['name'] ?></td>
                              <td><?php echo $row['usr-name'] ?></td>
                               <td>
                               <?php
                              if($_SESSION['role']==1){
                                echo $row['pass'];
                              }
                              ?>
                               </td>
                              <td><?php 
                              if($row['role']==1){
                                echo "Admin";   
                              }else{
                                echo "Modaretor"; 
                              }
                              
                              ?></td>
                              <td class='edit'><a href='update-user.php?id=<?php echo $row['id'] ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-user.php?id=<?php echo $row['id'] ?>'><i class='fa fa-trash-o'></i></a></td>
                              
                          </tr>
                          
                      </tbody>
                   <?php }?>
                  </table>
                  <!-- <ul class='pagination admin-pagination'>
                      <li class="active"><a>1</a></li>
                      <li><a>2</a></li>
                      <li><a>3</a></li>
                  </ul> -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
