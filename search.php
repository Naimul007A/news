<?php 
if(!isset($_REQUEST['search'])){
 header("location:index.php");
}
?>


<?php include 'header.php';
require_once("config.php");
?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">

                  <h2 class="page-heading">Search : <?php echo$_REQUEST['search'] ?></h2>
                  <?php
                  $search = $_REQUEST['search'];
                        require_once("config.php");
                        $limit = 5;
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
                      if(mysqli_num_rows($run) >0){
                        while($row=mysqli_fetch_array($run)){
                            ?>
                            
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo $row['post_id'] ?>"><img src="<?php echo 'admin/upload/'.$row['post_img'] ?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                  
                                        <h3><a href='single.php?id=<?php echo $row['post_id'] ?>'><?php echo $row['post_title'] ?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php?cateid=<?php echo $row['post_cate'] ?>'><?php echo $row['cate_name'] ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a ><?php 
                                                if($row['post_ath']==1){
                                                    echo "Admin";   
                                                  }else{
                                                    echo "Modaretor"; 
                                                  }
                                                ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $row['post_date'] ?>
                                            </span>
                                        </div>
                                        <p class="description">
                                        <?php echo substr($row['post_decs'], 0, 130).'....' ?>
                                        </p>
                                        <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id'] ?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                                }
                                }else{
                                    echo "<h3 style='color:red;'>Data not found</h3>";
                                }
                                ?>
                       
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
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
