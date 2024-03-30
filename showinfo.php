<?php

include("config.php");
$k=$_POST['id'];
$k=trim($k);


$resultat= "SELECT * from petition where title='{$k}'";

$res=mysqli_query($conn,$resultat);
while ($rows=mysqli_fetch_array($res)){
    ?>
    
<tr>
    <td> <h4><?php echo $rows['date']; ?></h4> </td>
    
    <td> <h5 itemprop="name"> <?php echo $rows['content']; ?></h5> </td>
    
</tr>
<?php }
echo $resultat;
?>
<style>

h4{
  margin: 0 0 0.5rem 0;
  color: #999;
  font-size: 1.25rem;
}
h5 {
  margin: 0 0 1rem 0;
  font-size: 11px;
  letter-spacing: 0.5px;
  color: #333;
}
</style>