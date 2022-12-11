<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post form" action="search.php" method ="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search ....." required>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
        <?php
        $limit = 5;
        $sql = "SELECT * FROM post
        LEFT JOIN category ON post.post_cate = category.cate_id ORDER BY post.post_id DESC LIMIT {$limit}";
       $run = mysqli_query($con, $sql);
       if($run==true){
         while($row=mysqli_fetch_array($run)){
             ?>
        
        <div class="recent-post">
            <a class="post-img" href="">
                <img src="<?php echo'admin/upload/'.$row['post_img']?>" alt=""/>
            </a>
            <div class="post-content">
                <h5><a href="single.php"><?php echo$row['post_title']?></a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='category.php?cateid=<?php echo $row['post_cate'] ?>'><?php echo $row['cate_name'] ?></a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo$row['post_date']?>
                </span>
                <a class='read-more pull-right' href='single.php?id=<?php echo $row['post_id'] ?>'>read more</a>
            </div>
        </div>
       
        <?php }}?>
    </div>
    <!-- /recent posts box -->
</div>
