<?php 
include('../config/constants.php');
//check whether id & image name is set or not

if(isset($_GET['id']) AND isset($_GET['image_name'])){
   //echo "Get value and delete";
   $id=$_GET['id'];
   $image_name=$_GET['image_name'];

   //remove the img file if available then will delete data and redirect with msg
   //remove img
   if($image_name!=""){
      //img available so remove
      $path="../images/category/".$image_name;
      $remove=unlink($path);
      if($remove==false){
         //if failed to remove then add errror
         $_SESSION['remove']="<div class='error'>Failed to remove image</div>";
         //redirect
         header('location:'.SITEURL.'admin/manage-category.php');
         //stop process
         die();
      }
   }
   //remove data

   $sql="DELETE FROM tbl_category WHERE id=$id";
   $res=mysqli_query($conn,$sql);
   //check if dsata deleted
   if($res==true){
      $_SESSION['delete']="<div class='success'>Category Deleted Successfully</div>";
      //redirect
      header('location:'.SITEURL.'admin/manage-category.php');

   }
   else{
      $_SESSION['delete']="<div class='error'>Failed to delete Category</div>";
      //redirect
      header('location:'.SITEURL.'admin/manage-category.php');


   }

}
else
{
   header('location:'.SITEURL.'admin/manage-category.php');
}

?>