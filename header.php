<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="images/news.jpg"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
               
                require_once("config.php");
                $sql = "SELECT * FROM category WHERE noPost > 0";
                $run = mysqli_query($con,$sql)or die("Header Query failed");
                ?>
                <ul class='menu'>
                <li><a href='index.php'>Home</a></li>
                
                    <?php
                    
                    if ($run == true) {
                        while ($row = mysqli_fetch_array($run)) {
                            
                    ?>
                  
                   <li><a class='' href='category.php?cateid=<?php echo $row['cate_id'] ?>'><?php echo $row['cate_name'] ?></a></li>
                  <?php

                        }
                    }
                    
                    ?>
                   
                   
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
