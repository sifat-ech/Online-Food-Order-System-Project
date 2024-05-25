<?php include('partials/menu.php'); ?>


<div class="main-content">
   <div class="wrapper">
      <h1>Add Food</h1>

      <br><br>

      <?php

      if(isset($_SESSION['upload'])){
         echo $_SESSION['upload'];
         unset($_SESSION['upload']);
      }

      ?>

      <form action="" method="POST" enctype="multipart/form-data">

      <table class="tbl-30">

      <tr>
         <td>Title: </td>
         <td>
            <input type="text" name="title" placeholder="Title of the food">
         </td>
      </tr>

      <tr>
         <td>Description: </td>
         <td>
            <textarea name="description" cols="30" rows="6" placeholder="description of the food"></textarea>
         </td>
      </tr>

      <tr>
         <td>Price: </td>
         <td>
            <input type="number" name="price" >
         </td>

      </tr>

      <tr>
         <td>Select Image: </td>
         <td>
            <input type="file" name="image">
         </td>
      </tr>

      <tr>

      <td>Category: </td>
      <td>
         <select name="category">

         <?php
         //create php code to display active catagories
         //create sql
         $sql = "SELECT * FROM tbl_category WHERE active='Yes'";

         $res = mysqli_query($conn,$sql);

         //count row to check whether we have category or not

         $count= mysqli_num_rows($res);

         //if count greater than 0 we have category else not
         if($count>0){
            while($row=mysqli_fetch_assoc($res))
            {
               //get the details of category
               $id=$row['id'];
               $title= $row['title'];
               ?>

               <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
               <?php
            }

         }
         else
         {
            ?>
            <option value="0">No category found</option>

            <?php
         }
         
         ?>




         </select>
      </td>
   </tr>

   <tr>
      <td>Featured: </td>
      <td>
         <input type="radio" name="featured" value="Yes"> Yes
         <input type="radio" name="featured" value="No"> No

      </td>
   </tr>

   <tr>
      <td>Active: </td>
      <td>
      <input type="radio" name="active" value="Yes"> Yes
      <input type="radio" name="active" value="No"> No

      </td>
   </tr>

   <tr>
      <td colspan="2">
         <input type="submit" name="submit" value="Add Food" class="btn-secondary">
      </td>
   </tr>

      </table>


      </form>

      <?php

      //check whether button clicked or not
      if(isset($_POST['submit'])){
         //add food in database
         //echo "clicked";
         //get ddta from form
         $title=$_POST['title'];
         $description=$_POST['description'];
         $price=$_POST['price'];
         $category=$_POST['category'];
         if(isset($_POST['featured'])){
            $featured=$_POST['featured'];
         }
         else
         {
            $featured="No";
         }

         if(isset($_POST['active']))
         {
            $active=$_POST['active'];
         }
         else
         {
            $active="No";//default value
         }

         //upload image
         if(isset($_FILES['image']['name']))
         {
            $image_name=$_FILES['image']['name'];

            if($image_name!=""){
               $ext=end(explode('.',$image_name));

               $image_name="Food-Name-".rand(0000,9999).".".$ext;//new img name

               //upload img

               $src=$_FILES['image']['tmp_name'];//source path

               $dst="../images/food/".$image_name;//destination path

               $upload=move_uploaded_file($src,$dst);

               if($upload==false)
               {
                  $_SESSION['upload']="<div class='error'>Failed to upload image</div>";
                  header('location:'.SITEURL.'admin/add-food.php');
                  die();
               }


            }

         }
         else
         {
            $image_name="";//default blank
         }
         //insert data to database
         //create sql to save to database

         $sql2="INSERT INTO tbl_food SET
           title='$title',
           description='$description',
           price=$price,
           image_name='$image_name',
           category_id=$category,
           featured='$featured',
           active='$active'
         ";

         //execute query

         $res2= mysqli_query($conn,$sql2);

         if($res2==true){
            //data inserted
            $_SESSION['add'] ="<div class='success'>Food added successfully</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
         }

         else{
            $_SESSION['add'] ="<div class='error'>Failed to add food</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
         }


      }

      ?>

   </div>


</div>


<?php include('partials/footer.php'); ?>