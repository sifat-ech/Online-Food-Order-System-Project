<?php
//to check whether user is logged in or not
if(!isset($_SESSION['user'])){//if user session not set
   //redirect to login page
   $_SESSION['no-login-message']= "<div class='error text-centerath' >Please login to access admin panel</div>"; 

   header('location:'.SITEURL.'admin/login.php');
}

?>