<?php include('partials/menu.php'); ?>

<div class="main-content">
   <div class="wrapper">
      <h1>Add Admin</h1>
      <br/>  <br/>

      <?php
         if(isset($_SESSION['add']))
         {
            echo $_SESSION['add'];//display msg
            unset($_SESSION['add']);//removing msg
         }
      ?>
      <br/>

      <form action="" method="POST">
        <table class="tbl-30">
         <tr>
            <td>Full Name:</td>
            <td><input type="text" name="full_name" placeholder="Enter your name"></td>
         </tr>

         <tr>
            <td>Username:</td>
            <td>
               <input type="text" name="username"placeholder="Enter your Username">
            </td>
         </tr>

         <tr>
            <td>Password: </td>
            <td>
               <input type="password" name="password"placeholder="your password">
            </td>
         </tr>
         <tr>
            <td colspan="2">
               <input type="submit" name="submit" value="Add Admin" class="btn-secondary">

            </td>
         </tr>
        </table>
      
      </form>
   </div>

</div>



<?php include('partials/footer.php'); ?>

<?php

//process the value from form and save it in database

//check whether the submit button is clicked or not

if(isset($_POST['submit']))
{
   //button clicked
   //echo "Button Clicked";

   //get data from form
   $full_name=$_POST['full_name'];
   $username=$_POST['username'];
   $password=md5($_POST['password']); //password encription with md5

   //sql query to save data to database
   $sql="INSERT INTO tbl_admin SET
     full_name='$full_name',
     username='$username',
     password='$password'
   ";
   
   
//executing query and saving data to database
   $res = mysqli_query($conn,$sql) or die(mysqli_error($con));

   //checking whether data inserted

   if($res==TRUE)
   {
      //data inserted
      //echo "data inserted";
      //create session variable to display msg
      $_SESSION['add']="<div class='success'>Admin added successfully</div>";
      //redirect page
      header("location:".SITEURL.'admin/manage-admin.php');
   }
   else{
     // echo "data not inserted";
     $_SESSION['add']="Failed to add admin";
     //redirect page
     header("location:".SITEURL.'admin/add-admin.php');
   }

}


?>