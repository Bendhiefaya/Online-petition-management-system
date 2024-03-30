<?php
include("config.php");
if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $getid = htmlspecialchars($_GET['id']);
   $petition = $conn->prepare("SELECT * FROM petition WHERE id ='$getid'");
   $petition->execute(array($getid));
   $petition = $petition->fetch();
   if(isset($_POST['insert'])) {
      if(isset($_POST['comment'],$_POST['situation']) AND !empty($_POST['comment']) AND !empty($_POST['situation'])) {
         $situation = htmlspecialchars($_POST['comment']);
         $commentaire = htmlspecialchars($_POST['situation']);
         if(strlen($pseudo) < 25) {
            $ins = $conn->prepare('INSERT INTO vote (iduser,idpet,situation, commentaire) VALUES (0,$getid,$situation,$commentaire)');
            $ins->execute(array($getid,$situation,$commentaire));
            $c_msg = "<span style='color:green'>Votre commentaire a bien été posté</span>";
         } else {
            $c_msg = "Erreur: Le pseudo doit faire moins de 25 caractères";
         }
      } else {
         $c_msg = "Erreur: Tous les champs doivent être complétés";
      }
   }
   $commentaires = $conn->prepare('SELECT * FROM vote WHERE idpet = ? ORDER BY id DESC');
   $commentaires->execute(array($getid));}
?>