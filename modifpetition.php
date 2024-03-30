<style>
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
    font-family: 'italiana';
    color: white;
    letter-spacing: 0.5px;
    outline: none;
    border: 1px solid white;
    background-image: linear-gradient(
    -225deg,
    #5271c4 0%,
    #b19fff 48%,
    #eca1fe 100%)
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

input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: white;
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
label{
    display: block;
    margin-top: 20px;
    font-size: 16px;
    font-weight: 400;
}
</style>


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
//Après appel de la page on récupéré l'id du livre en question
  if(isset($_GET["id"])){
	//protection de données
	$idm = $_GET["id"];
	$sth = $dbco->prepare ("SELECT * FROM petition WHERE id=$idm");
     $sth->execute();
     $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);

	if (count($resultat)> 0)
			{

    	// Récupérer des informations du livre en question qui seront par la suite affichées dans le formulaire en bas
        
        $id=$resultat[0]["id"];
        $title=$resultat[0]["title"];
        $content=$resultat[0]["content"];
        $date=$resultat[0]["date"];
    }  
       else{
        	//Si erreur envoie de message à la page livre.php
            $message="unavailable petition ";
        	header("Loation:affichagepouredition.php");
        }
    }
  }
	catch(PDOException $e){
             echo "Erreur : " . $e->getMessage();
        }
	$conn=mysqli_connect('localhost','root','','inscription') or die('connection failed');
    // Après clic sur le bouton modifier on récupère les données envoyées par la méthode post
   if(count($_POST)>3) {
	$title = mysqli_real_escape_string($conn, $_POST["title"]);
	$content =mysqli_real_escape_string($conn, $_POST["content"]);
	$date = mysqli_real_escape_string($conn, $_POST["date"]);
	$id= $_POST["id"];
	
	try{
		
		      $sth = $dbco->prepare("update  petition set title='$title' , content='$content', date='$date'
     WHERE id=$id");
                $sth->execute();
                $message= "petition updated successfully";
         }
    catch(PDOException $e){
			 $message = "Error: " . $e->getMessage() . "<br>" ;
            }
     header("Location:affichagepouredition.php?message=$message");
   }

        ?>
<!--  Afficher le formulaire rempli par les données du livre récupéré en haut.-->
        <form name="liv" action="modifpetition.php" method="post">
      		<fieldset>
      			<legend>update a petition</legend>
      			<input type="hidden" id="id" name="id" value="<?php if(isset($id)) { echo $id; } ?>"><br/>
      			<label for="titre">Title :</label>
      			<input type="text" id="title" name="title" required value="<?php if(isset($title)) { echo $title; } ?>"><br/>
      			<label for="auteur">content :</label>
      			<input type="text" id="content" name="content" required value="<?php if(isset($content)) { echo $content; } ?>"><br/>
      			<label for="date">Date :</label>
      			<input type="date" id="date" name="date" required value="<?php if(isset($date)) { echo $date; } ?>"><br/>
      			<input Type="submit" value="Modifier">
      		</fieldset>
      </form>
      