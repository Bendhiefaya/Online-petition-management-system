<?php

include 'config.php';
session_start(); #starting a session 
$user_id= $_SESSION['user_id'];#a variable that gets the user id 

if(!isset($user_id)){
   header('location:connexion.php'); #if there's no user id we should go back to the login 
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();    
   header('location:connexion.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

   <div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `inscri` WHERE id = '$user_id'") or die('query failed'); #selecting all of the data in our inscri table where the id is similar with the user id of the connected person
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
         } #if the select brings more than 0 row so we create an associative array(fetch) which contains the  rows of the select .
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">'; # if the user do not have any image we displayed an image of anonymous user 
         }else{ #else we fetch the image of the user 
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
      ?>
      <h3><?php echo $fetch['name'];echo ' ';echo $fetch['familyname'];  #showing the name and the family name of the user ?></h3> 
      <a href="update_profile.php" class="btn">update profile</a>
      <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
      <a href="membre.php" class= "btn">go back</a>
   </div>

</div>

</body>
</html>