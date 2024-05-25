
<?php include('../config/constants.php'); ?>
<html>
   <head>
      <title>Login - Food Order System</title>
      <link rel="stylesheet" href="../css/admin.css">
   </head>

   <body>

   <div class="login">
      <h1 class="text-center">Login</h1>
      <br><br>

      <?php

      if(isset($_SESSION['login']))
      {
         echo $_SESSION['login'];
         unset($_SESSION['login']);
      }
      if(isset( $_SESSION['no-login-message']))
      {
         echo  $_SESSION['no-login-message'];
         unset( $_SESSION['no-login-message']);
      }

      ?>
      <br><br>
      <!-- login form starts -->
      <form action="" method="POST" class="text-center">
         Username: <br/>
         <input type="text" name="username" placeholder="Enter username"><br/><br/>

         Password: <br/>
         <input type="text" name="password" placeholder="Enter password"><br/><br/>

         <input type="submit" name="submit" value="Login" class="btn-primary">
         <br> <br>
      </form>

      <!-- loin form ends -->

   </div>
      

   </body>




</html>

<?php

if(isset($_POST['submit']))
{
   //process login
   //get data from login
   $username = mysqli_real_escape_string($conn,$_POST['username']);
   $raw_password =md5($_POST['password']);
   $password=mysqli_real_escape_string($conn,$raw_password);

   //sql-username.pass exist or not
   $sql ="SELECT* FROM tbl_admin WHERE username='$username' AND password='$password'";
   $res=mysqli_query($conn,$sql);

   //user exist or not
   $count=mysqli_num_rows($res);

   if($count==1)
   {
      //login success
      $_SESSION['login']="<div class='success'>Login Successful</div>";
      $_SESSION['user']=$username;//to check whether user is logged in or not and logout will unset it
      //redirect
      header('location:'.SITEURL.'admin/');

   }
   else{
      $_SESSION['login']="<div class='error'>Username or password did not match</div>";
      //redirect
      header('location:'.SITEURL.'admin/login.php');

   }

}


?>