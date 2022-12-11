<?php
session_start();
if(isset($_SESSION["id"])){

?>

<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <?php
                     require_once("config.php");
                     $sql = "SELECT * FROM `category`";
                     $run = mysqli_query($con, $sql);
                     $count=1;
                     while($row=mysqli_fetch_array($run)){
                        ?>
                     
                    <tbody>

                        <tr>
                            <td class='id'><?php echo $count;$count++;?></td>
                            <td><?php echo $row['cate_name']?></td>
                            <td><?php echo $row['noPost']?></td>
                            <td class='edit'><a href='update-category.php?id=<?php echo $row['cate_id']?>'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='delete-category.php?id=<?php echo $row['cate_id']?>'><i class='fa fa-trash-o'></i></a></td>
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
<?php
}else{
    header("Location:index.php");
}
?>