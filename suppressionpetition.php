<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inscription";


try
{
// Création de la connexion
 $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
 
if(!empty($_GET["id"])){
    //Supprimer le livre dont l'id est envoyé avec l'URL
	$ids = $_GET["id"];
	
	$sth = $dbco->prepare("DELETE FROM petition WHERE id=$ids");
	$sth->execute();
    $message= "petition deleted successfully";
    header("Location:affichagepourpetition.php");
     }
} 
   catch(PDOException $e){
             $message= "Error while deleting the petition: : " . $e->getMessage();
        }
		
	
	//Redirection vers la page affichagepourpetitionpetition.php avec un message résultat de la suppression 
   header("Location:affichagepourpetition.php");
?>