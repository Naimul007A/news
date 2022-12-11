<?php
session_start();
if(isset($_SESSION["id"])){
    header("Location:post.php");
}else{

    ?>

<?php 
require_once("config.php");
?>
<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <img class="logo" src="images/news.jpg">
                        <h3 class="heading">Admin</h3>
                        <!-- Form Start -->
                        <form class="form" action="<?php $_SERVER['PHP_SELF']?>" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                             <?php
                             if(isset($_REQUEST['worng'])){
                                ?>
                                <div class="alert alert-danger" role="alert">
                                  Username or Password incorect
                                 </div>

                                <?php
                             }
                             ?>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </form>
                        <!-- /Form  End -->
                    </div>
                </div>
            </div>
        </div>
        <?php 
         if(isset( $_POST['username'])){
            
            $user = $_POST['username'];
            $pass = $_POST['password'];
            $sql="SELECT * FROM `admin-user`";
            $run=mysqli_query($con,$sql)or die("Query Failed");

            while($row=mysqli_fetch_array($run)){
                $id=$row['id'];
                $name=$row['name'];
                $role=$row['role'];
                
            
            if($result=$row['usr-name']===$user && $row['pass']===$pass ){
                    header("location:post.php");
            }else{
                    header("location:index.php?worng");
            }
              if($result==true){
                    session_start();
                    $_SESSION["id"]=$id;
                    $_SESSION["name"]=$name;
                    $_SESSION["role"]=$role;

              }
        
         } }
        ?>
   <?php
   }
?>