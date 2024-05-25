<?php include('partials/menu.php')  ?>


<div class="main-content">
   <div class="wrapper">
      <h1>Add Category</h1>

      <br><br>

      <?php

      if(isset($_SESSION['add'])){
         echo $_SESSION['add'];
         unset($_SESSION['add']);
      }

      if(isset($_SESSION['upload'])){
         echo $_SESSION['upload'];
         unset($_SESSION['upload']);
      }

      ?>
      <br><br>

      <form action="" method="POST" enctype="multipart/form-data">

      <table class="tbl-30">
      <tr>
         <td>Title:</td>
         <td>
            <input type="text" name="title" placeholder="Category Title">
         </td>
      </tr>


      <tr>
         <td>Select Image:</td>
         <td>
            <input type="file" name="image">
         </td>
      </tr>

      <tr>
         <td>Featured:</td>
         <td>
            <input type="radio" name="featured" value="Yes">Yes
            <input type="radio" name="featured" value="No">No
         </td>
      </tr>
      <tr>
         <td>Active:</td>
         <td>
            <input type="radio" name="active" value="Yes">Yes
            <input type="radio" name="active" value="No">No
         </td>
      </tr>

      <tr>
         <td colspan="2">
            <input type="submit" name="submit" value="Add Category" class="btn-secondary">

         </td>
      </tr>

      </table>

      </form>

      <?php 

      if(isset($_POST['submit'])){
         //echo "clicked";

         $title=$_POST['title'];

         if(isset($_POST['featured'])){
            $featured=$_POST['featured'];
         }
         else{
            $featured="No";
         }

         if(isset($_POST['active'])){
            $active=$_POST['active'];
         }
         else{
            $active="No";
         }

         //check whether image selected or not and set value for imagename

         //print_r($_FILES['image']);
         //die();
         if(isset($_FILES['image']['name'] ))
         {
           //ipload the image
           //to upload image we need source path and destntion path
           $image_name=$_FILES['image']['name'];
           
           //upload image if available
           if($image_name!=""){


           //auto rename our image
           //get extension of our image

           //get the extension of image like png,jpg etc

           $ext = end(explode('.', $image_name));

           //rename image

           $image_name="Food_category_".rand(000,999).'.'.$ext;//e.g. Food_category_834.

           $source_path=$_FILES['image']['tmp_name'];

           $destination_path="../images/category/".$image_name;

           //finally upload image
           $upload=move_uploaded_file($source_path,$destination_path);

           //check whether the image isuploaded or not
           //if not uploaded redirect with error msg
           if($upload==false){
            $_SESSION['upload']="<div class='error'>Failed to upload image.</div>";
            //redirect to add category
            header('location:'.SITEURL.'admin/add-category.php');
            //stop process
            die();
           }
         }
         }
         else{
            //don't upload image and set the image value as blank
            $image_name="";

         }

         

         //create query
         $sql="INSERT INTO tbl_category SET
         title='$title',
         image_name='$image_name',
         featured='$featured',
         active='$active'
         ";
         $res=mysqli_query($conn,$sql);


         if($res==true){
            $_SESSION['add']="<div class='success'>Category Added Successfully.</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
         }
         else{
            $_SESSION['add']="<div class='error'>Failed to add Category.</div>";
            header('location:'.SITEURL.'admin/add-category.php');
         }

      }

      ?>

   </div>

</div>





<?php include('partials/footer.php')  ?>
