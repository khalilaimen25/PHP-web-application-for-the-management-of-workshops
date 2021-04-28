<?php
session_start();


try{
$DB= new PDO('mysql:host=localhost;dbname=atelier;charset=utf8','root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}catch(Exception $e)
{
die('erreur :'.$e->getMessage());
}
$res=$DB->query('SELECT * FROM enseignant');
if(isset($_POST['atelier']))
{$x=$_POST['atelier'];
  $titre="list d'enseignant atelier ".$x;
$res=$DB->query("SELECT * FROM enseignant where id_atelier='".$x."' order by id ");
}else {
  $titre = "list de tout les enseignant";
  $res=$DB->query("SELECT * FROM enseignant order by id");
}
$atelier=$DB->query('select * from atelier');
?>
<html>
<body class="noprint">
<center>
  <form class="" action="" method="post">
    <select class="" name="atelier">
      <?while ($data=$atelier->fetch()) {
        echo "<option value=".$data['id_atelier'].">".$data['id_atelier']."</option>";
      }?>
    </select>
    <input type="submit" name="" value="changer atelier">
  </form>
  <caption><? echo $titre;?></caption>
<table class="printthis" border=2 width=70% cellspacing=0 >
<tr align=center>
  <td>id</td><td>nom</td><td>prenom</td>
  <!--<td>user</td><td>password</td><td>adresse</td>-->
  <td>grade</td><td>atelier</td><td>email</td><td>telef</td>
</tr>

<?php  while($data=$res->fetch())
{
echo "<tr align=center>";
echo "<td>".$data['id']."</td>";
echo "<td>".$data['nom']."</td>";
echo "<td>".$data['prenom']."</td>";
echo "<td>".$data['grade']."</td>";
echo "<td>".$data['id_atelier']."</td>";
echo "<td>".$data['email']."</td>";
echo "<td>".$data['tel']."</td>";


echo "</tr>";
}
$res->closeCursor();
?>
</table>
</center>

<a href="pageet.php"><input type="button" name="" value="retour"></a>

</body>
</html>
