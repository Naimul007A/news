<?php
session_start();
if(isset($_SESSION["id"])){

?>
<?php include "header.php"; ?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
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
                        require_once("config.php");
                        $limit = 10;
                        if(isset($_REQUEST['page'])){
                            $page = $_REQUEST['page'];

                        }else{
                          $page = 1;
                        }
                       
                        $offset =($page - 1)  * $limit;


                      $sql = "SELECT * FROM post
                       LEFT JOIN category ON post.post_cate = category.cate_id ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
                      $run = mysqli_query($con, $sql);
                      if($run==true){
                        while($row=mysqli_fetch_array($run)){
                            ?>
                           
                      <tbody>
                          <tr>
                            <td class='id'><?php echo $row['post_id'] ?></td>
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
                          
                           <?php
                                }
                                }?>
                  </table>
                  <?php
                    $sql1 = "SELECT * FROM post";
                    $run1 = mysqli_query($con, $sql1);
                    $totalrecoard= mysqli_num_rows($run1);
                    
                    $totalpage = ceil($totalrecoard / $limit);
                    echo"<ul class='pagination admin-pagination'>";
                    if($page>1){
                      echo '<li><a href="post.php?page='.($page-1).'">pre</a></li>';
                    }
                    for ($i =1; $i <= $totalpage;$i++){
                      if($i==$page){
                       $active = "active";
                      }else{
                       $active = "";

                      }
                     echo '
                    <li><a class="'.$active.'" href="post.php?page='.$i.'">'.$i.'</a></li>';
                     
                    }
                    if($totalpage>$page){
                        echo '<li><a href="post.php?page='.($page+1).'">next</a></li>';
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