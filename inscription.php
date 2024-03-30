<?php

include 'config.php';

if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']); #variable that will get the data of the input box name 
   $familyname = mysqli_real_escape_string($conn, $_POST['familyname']);#variable that will get the data of the input box familyname
   $email = mysqli_real_escape_string($conn, $_POST['email']);#variable that will get the data of the input box email
   $pass = mysqli_real_escape_string($conn, ($_POST['password1']));#variable that will get the data of the input box password
   $cpass = mysqli_real_escape_string($conn,($_POST['password2']));#variable that will get the data of the input box form the password confirmation
   $role = mysqli_real_escape_string($conn,($_POST['role']));#variable that will get the data of the radio buttons for the role
   $image = $_FILES['image']['name']; 
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/'.$image;
   $select = mysqli_query($conn, "SELECT * FROM `inscri` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist'; 
   }else{
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      }elseif($image_size > 2000000){
         $message[] = 'image size is too large!';
      }else{
         $insert = mysqli_query($conn, "INSERT INTO `inscri`(name,familyname, email,role, password, image) VALUES('$name','$familyname','$email','$role', '$pass', '$image')") or die('query failed');

         if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            $message[] = 'registered successfully!';
            header('location:connexion.php');
         }else{
            $message[] = 'registeration failed!';
         }
      }
   }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>inscription</title>
    <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-color: #edf0f7;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #037ef3,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #037ef3,
        #7552cc
    );
    right: -30px;
    bottom: -80px;
}
form{
     height: 1000px;
    width: 500px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 90%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.295);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'italiana',sans-serif;
    color: black;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 20px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}
form h5{
    font-size: 20px;
    font-weight: 500;
    line-height: 30px;
    text-align: center;
    margin-top: 10px;
}
label{
    display: block;
    margin-top: 20px;
    font-size: 16px;
    font-weight: 400;
}

.navbar {
  position: relative;
  height: 70px;
  width: 100%;
  top: 0;
  left: 0;
  background: rgba(0, 0, 0, 0, 0);
}

.banners{
    background-color: rgba(255,255,255,0.13);
  background-size: cover;
  height: 100vh;
}
.navbar img{
  width: 140px;
  height: auto;
  padding: 20px 50px;
}
.navbar .logo {
    width: 200px;
    height: auto;
   
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255, 255, 255, 0.199);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: rgb(70, 69, 69);
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}


.radio{
    display: block;
}


 </style>
</head>
<body>
    <script type="text/javascript" src="javascript.js">
    </script>
<div class="banners">
<div class="banner">
        <nav class="navbar">
            <img class="logo" src="logosite.png">
        </nav>
        
</div>
</div>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
        
    </div>
    <form action="" method="post" enctype="multipart/form-data" onsubmit="return validateform() ">
            <h3>Sign Up Here</h3>
            <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
            <label for="familyname">Family Name</label>
            <input type="text" placeholder="familyname" id="familyname" name="familyname" required>      
            <label for="Name">Name</label>
            <input type="text" placeholder="name" id="name" name="name" required>       
            <label for="Email">Email</label>
            <input type="email" placeholder="Email" id="Email" name="email"required>
            <label for="password">Password</label>
            <input type="password" placeholder="Password" name="password1"required>
            <label for="password">Confirm Password</label>
            <input type="password" name="password2"  required>
           <h5>Are you : </h5>
            <label class="radio">
                <input name="role"type="radio" type="radio" value="student">
                <span>Student</span>
            </label>
            <label class="radio">
                <input name="role" type="radio" value="professor">
                <span>professor</span>
            </label>
            <label class="radio">
                <input name="role" type="radio" value="administration agent">
                <span>Administration</span>
            </label>
            <label for="avatar">Choose a profile picture:</label>
            <input type="file"id="image" name="image" accept="image/png, image/jpeg">
            <button type="submit" Name="submit">Sign up</button>
        </form>
</body>
</html>