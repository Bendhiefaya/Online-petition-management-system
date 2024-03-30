<?php 
include("config.php");
$resultat= "SELECT distinct title from petition";

$res=mysqli_query($conn,$resultat);

?>
<html>
    <script type="text/javascript" src="javascript.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <style>
       html{
            font-family: 'italiana' , sans-serif;
            font-size: 10px;
}
body {
    font-family: 'italiana' , sans-serif;
  font-size: 12px;
  background: white;

} 
.container_copy{
    position: relative;
  padding: 5rem 2rem 5rem 5rem;
  background: #fff;
  height: 80%;
  width:80%;

  border-radius: 10px;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  box-shadow: 1px 1px 2rem rgba(0, 0, 0, 0.3);
} 



    </style>
    <body>
    <div class="container_copy">
    <label > choose a petition : </label>
       <select id="dropdown"onchange="selectPetition()">

         <?php while ($rows=mysqli_fetch_array($res)){
          ?>
          <option value="<?php  echo $rows['title']; ?>"><?php  echo $rows['title']; ?></option>
        <?php } ?>
       </select>
<table>
    <thead> 
    </thead>
  <br>
  <br>
  <br>
  <br>
<tbody id="content"> 


</tbody>

</table>
</div>
    </body>
</html>