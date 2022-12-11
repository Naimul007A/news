<?php
if(!isset($_REQUEST['id'])){
    header("Location:index.php");
}
?>


<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                        <?php
                        require_once("config.php");
                        $post_id = $_REQUEST['id'];
                        $sql = "SELECT * FROM post
                       LEFT JOIN category ON post.post_cate = category.cate_id WHERE post_id=$post_id";
                      $run = mysqli_query($con, $sql);
                        if ($run == true) {
                            while ($row = mysqli_fetch_array($run)) {
                        ?>
                        <div class="post-content single-post">
                            <h3><?php echo $row['post_title'] ?></h3>
                            <div class="post-information">
                                <span>
                                    <a href='category.php?cateid=<?php echo $row['post_cate'] ?>'>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <?php echo $row['cate_name'] ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a>
                                   <?php if($row['post_ath']==1){
                                                    echo "Admin";   
                                                  }else{
                                                    echo "Modaretor"; 
                                                  }
                                      ?>            
                                    </a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row['post_date'] ?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="<?php echo'admin/upload/'.$row['post_img'] ?>" alt=""/>
                            <p class="description">
                            <?php echo $row['post_decs'] ?>
                            </p>
                        </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
