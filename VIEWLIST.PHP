<?php 
	include 'config.php'; 
  $result= mysqli_query($conn,"SELECT * FROM petition");    #selection of all of the data in the petition table in our database
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>petition</title>
<link rel="stylesheet" href="styleview.css">

</head>
<body>
  <script type="text/javascript" src="js.js">




  </script>
<div class="banners">
<div class="banner">
        <nav class="navbar">
            <img class="logo" src="logosite.png">
            <a href="index.php">Home</a>
        </nav>
        
</div>
</div>
<div>

            <table >

                <tbody>
				<?php
  
                $result = mysqli_query($conn,"SELECT * FROM petition");
                while($row = mysqli_fetch_array($result))  #boucle pour afficher tous les données de chaque petition de la requete select dans un tableau
                {
          ?>
					<td>
                        <tr>
                     <div class="wrapper">
                       <form action="comment.php" method="post"  >
                       <div class="blog_post">
                         <div class="container_copy">
                         <h1><?php echo $row["id"] #affichage id petition ?></h1>
                        <h1><?php echo $row["name"];echo ' '; echo $row["fname"];#affichage nom et prenom du createur  petition  ?></h1>
                        <h2><?php echo $row["title"]; #affichage titre  petition?></h2>
                        <h3><?php echo $row["date"]; #affichage date petition?></h3>
                        <p><?php echo $row["content"]; #affichage contenu petition?></p>
                        </div>

                        <!--zone  pour le commentaire et le vote   -->
                        <label for="">enter your full name </label>
                         <input type="text" name="comment" >
                        <label for="">add comment</label>
                         <input type="text" name="comment" >
                         <h4>approve/disapprove</h4>
                         <label for="">Accept petition</label>
                         <input type="radio" name="situation" value="Approve">
                         <label for="">Disapprove petition</label>
                         <input type="radio" name="situation" value="DisaApprove">
                         <button type="submit" name="insert" id="insert" class ="btn btn-primary">validate </button>
                        </div>
                        </form>
                      </div>
                      <div id="content">
                        
                      </div>
                        </tr>          
					</td>
          <?php 
                    } 
                ?>
            			<?php
				
					// close connection database
					mysqli_close($conn);
                ?>
                </tbody>
                  </table>
</body>
</html>