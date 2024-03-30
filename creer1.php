<?php
include 'config.php';
session_start();
$petition_id = $_SESSION['user_id'];


if (!$conn){ // Contrôler la connexion
    $MessageConnexion = die ("connection impossible");
}
else {
if(isset($_POST['button'])){ // Autre contrôle pour vérifier si la variable $_POST['Bouton'] est bien définie
   $title=$_POST['title'];
   $content=$_POST['content'];
   $date=$_POST['date'];
   $name=$_POST['name'];
   $fname=$_POST['fname'];

   // Requête d'insertion
   $insert=mysqli_query($conn,"INSERT INTO petition (title , content , date , name , fname) VALUES ('$title', '$content', '$date', '$name', '$fname')")or die('query failed');
    
   if($insert){

    $message[] = 'petition subbmitted successfully!';
    header('location:VIEWLIST.php');
 }else{
    $message[] = 'creation failed!';
 }
}}
?>