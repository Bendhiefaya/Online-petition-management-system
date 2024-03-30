<?php

include 'config.php';
session_start(); #starting a session 

$user_id = $_SESSION['user_id'];#a variable that gets the user id 

# if we click the button update profile 
if(isset($_POST['update_profile'])){ 

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']); #variable for the input box of new name 
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']); #variable for the input box offor the new email
     
   mysqli_query($conn, "UPDATE `inscri` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');
   #updating the old email and name with the new ones
   $new_pass = mysqli_real_escape_string($conn,($_POST['new_pass']));#variable for the input box of the new password 
    $confirm_pass = mysqli_real_escape_string($conn,($_POST['confirm_pass']));#variable for the input box of the confimation of the  password 
 
    if(!empty($new_pass) || !empty($confirm_pass)){
          $message[] = 'confirm password not matched!';
       }else{
          mysqli_query($conn, "UPDATE `inscri` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
          $message[] = 'password updated successfully!';
       }
    }
   
   $update_image = $_FILES['update_image']['name']; #a two-dimensional associative array that keeps information related to uploaded image and its name  
   $update_image_size = $_FILES['update_image']['size'];#a two-dimensional associative array that keeps information related uploaded image and its size 
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image; 

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `inscri` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }



?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
<div class="update-profile">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `inscri` WHERE id = '$user_id'") or die('query failed');#selecting data of the connected user 
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
      
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         if($fetch['image']==''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>username :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
            <span>your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
            <span>update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
       
            <span>new password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="box">
            <span>confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="home.php" class="delete-btn">go back</a>
   </form>

</div>

</body>
</html>