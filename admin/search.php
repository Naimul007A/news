<?php
session_start();
if(isset($_SESSION["id"])){
if(!isset($_REQUEST['search'])){
        header("Location:post.php");
}
?>
<?php include "header.php"; ?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-8">
                
                  <h2 class="page-search">Search : <span><?php echo$_REQUEST['search'] ?></span></h2>
            
              </div>
              
              <div class="col-md-4">
              <form class="search-post" action="search.php" method ="GET">
                <div class="input-group">
                <input type="text" name="search" class="form-control" value="<?php echo$_REQUEST['search'] ?>"
                placeholder="Search ....." required>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
              </div>
        </form>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                 
                      <thead>
                          
                          <th>S.No.</th>
                           <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <?php
                  $search = $_REQUEST['search'];
                        require_once("config.php");
                        $limit = 10;
                        if(isset($_REQUEST['page'])){
                            $page = $_REQUEST['page'];

                        }else{
                          $page = 1;
                        }
                       
                        $offset =($page - 1)  * $limit;


                      $sql = "SELECT * FROM post
                       LEFT JOIN category ON post.post_cate = category.cate_id 
                       WHERE post_title LIKE '%$search%' OR post_decs LIKE '%$search%' 
                       ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
                      $run = mysqli_query($con, $sql);
                      if(mysqli_num_rows($run)>0){
                        $count = 1;
                        while($row=mysqli_fetch_array($run)){
                            ?>
                      <tbody>
                          <tr>
                            <td><?php echo $count;$count++; ?></td>
                             <td><?php echo $row['post_title'] ?></td>
                              <td><?php echo $row['cate_name'] ?></td>
                              <td><?php echo $row['post_date'] ?></td>
                              <td><?php 
                              if($row['post_ath']==0){
                               echo "Modaretor";
                              }else{
                             echo "Admin";
                              }
                              
                              ?></td>
                              <td class='edit'><a href='update-post.php?id=<?php echo $row['post_id'] ?>&cateid=<?php echo$row['post_cate'] ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-post.php?id=<?php echo $row['post_id']?>&cateid=<?php echo$row['post_cate'] ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                          </tbody>
                           <?php
                                }
                                }else{
                                    echo "<h3 style='color:red;'>Data not found</h3>";
                                }
                                ?>
                  </table>
                  <?php
                            $sql1 = "SELECT * FROM post WHERE post_title LIKE '%$search%' OR post_decs LIKE '%$search%'";
                            $run1 = mysqli_query($con, $sql1);
                            $totalrecoard= mysqli_num_rows($run1);
                            
                            $totalpage = ceil($totalrecoard / $limit);
                            echo"<ul class='pagination admin-pagination'>";
                            if($page>1){
                            echo '<li><a href="search.php?page='.($page-1).'&search='.$search.'">pre</a></li>';
                            }
                            for ($i =1; $i <= $totalpage;$i++){
                            if($i==$page){
                            $active = "active";
                            }else{
                            $active = "";

                            }
                            echo '
                            <li><a class="'.$active.'" href="search.php?page='.$i.'&search='.$search.'">'.$i.'</a></li>';
                            
                            }
                            if($totalpage>$page){
                                echo '<li><a href="search.php?page='.($page+1).'&search='.$search.'">next</a></li>';
                            }
                            echo"</ul>";
                  ?>
                  
                     
                  
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