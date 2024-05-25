<?php
include('../config/constants.php');

//getting the id to be deeted

$id=$_GET['id'];

$sql = "DELETE FROM tbl_admin WHERE id=$id";

//execute query

$res=mysqli_query($conn,$sql);

//check query
if($res==true){
//echo "admin deleted";
//create session variable to display msg

$_SESSION['delete']="<div class='success'>Admin Deleted Successfully.</div>";

header('location:'.SITEURL.'admin/manage-admin.php');

}
else{
   //echo "failed to delete";
   $_SESSION['delete']="<div class='error'>Failed to delete.Try Again Later.</div>";
   header('location:'.SITEURL.'admin/manage-admin.php');   

}

?>