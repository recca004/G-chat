<?php
   require 'core/init.php';
        session_destroy();
   if(isset($_SESSION['login'])){

     echo 'You have cleaned session';
     header('Refresh: 5; URL = login.php');
   }else {
     echo "You are not login";
     header('Refresh: 3; URL = login.php');
   }

?>
