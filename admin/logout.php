<?php
session_start();
   session_unset();
   $unset=session_destroy();
   if($unset==true){
        header("Location:index.php");
    }else{
    echo "there is a problem";
    }

?>