<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inscription";

try{

  // Création de la  connexion
  $dbco = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);          

  //Après clic sur le bouton "Envoyer" envoie de données par post
   if(count($_POST)>2) {
	//récupération des données envoyées
	$titre = $_POST["titre"];
	$auteur =  $_POST["auteur"];
	$date =  $_POST["date"];
	//on remplace  les valeurs dans notre requête SQL par nos marqueurs nommés
  $sth->execute(array(
                       ':titre' => $titre,
                       ':content' => $content,
					             ':date' => $date,
                          ));
     $message= "petition a été ajouté  avec succès";
		
   }
}
catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
     }


//les autres pages peuvent envoyer un message dans L’URL. On le  récupère ici pour l'afficher dans l’élément "div.message"
if(isset($_GET["message"])){
	$message=$_GET["message"];
}
?>
<!doctype html>
<html>
<head>
	<title>manage petitions</title>
	<meta charset="utf-8">
	<style type="text/css">
	/* Des styles pour la mise en forme de la page*/
	div{
		margin: auto;
		width: 100;
		margin-bottom: 20px;
	} 
	table{
        height: 100%;
        width:100%
    }
	 thead{
        background-image: linear-gradient(
    -225deg,
    #5271c4 0%,
    #b19fff 48%,
    #eca1fe 100%
  );

	 }
	 tbody{
	 	background:white;
	 	color: black
	 }
     td,th{
     	width: 200px;
     	text-align: center;
     	border: 1px solid #5271c4;
     }
     a{
     	color: black;
         list-style: none;
     }
     .message{
     	background: #d35400;
     	color:white;
     	padding: 5px;
     }
	</style>
</head>
<body>

	<?php if(isset($message)) { echo "<div class='message'>".$message."</div>"; } ?>
     <div class="grid">
      	<table  cellspacing="0">
      		<thead>
      			<tr>
      				<th>id</th>
      				<th>title</th>
      				<th width=200px>content</th>
      				<th>date</th>
                    <th>name of creator</th>
                    <th>family name of creator</th>
      				<th colspan="2">Actions</th>
      			</tr>
      		</thead>
      		<tbody>
      			<!-- Récupération de la liste des livres  -->
      			<?php
				     try{
				     $sth = $dbco->prepare ("SELECT * FROM petition");
                $sth->execute();
                
                /*Retourne un tableau associatif pour chaque entrée de notre table
                 *avec le nom des colonnes sélectionnées en clefs*/
                $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);

			       	if (count($resultat)> 0)
		      		{
				     	for($i=0;$i<count($resultat);$i++)
                        {
        					echo "<tr><td> " . $resultat[$i]["id"]. "</td><td>" . $resultat[$i]["title"]. "</td><td>" . $resultat[$i]["content"]."</td><td>" . $resultat[$i]["date"]. "</td><td>". $resultat[$i]["name"] . "</td><td>". $resultat[$i]["fname"] 
        					."</td><td><a href=\"modifpetition.php?id=".$resultat[$i]["id"]."\">Modifier</a></td>"
        					."</td><td><a href=\"suppressionpetition.php?id=".$resultat[$i]["id"]."\" onclick=\"return confirm('do you really want to delete this one ')\">delete</a></td></tr>";
    					}	
				     }
			      	}
				
		        catch(PDOException $e){
             echo "Erreur : " . $e->getMessage();
            }
			
				  ?>
      		</tbody>
      	</table>
      </div>

</body>
</html>