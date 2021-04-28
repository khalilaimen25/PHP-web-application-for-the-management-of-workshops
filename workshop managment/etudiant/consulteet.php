<?php
session_start();


try{
$DB= new PDO('mysql:host=localhost;dbname=atelier;charset=utf8','root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}catch(Exception $e)
{
die('erreur :'.$e->getMessage());
}
$atelier=$DB->query('select * from atelier');

if(isset($_POST['atelier']))
{$x=$_POST['atelier'];
  $titre="list d'etudiant atelier ".$x;
$res=$DB->query("SELECT * FROM etudiant where id_atelier='".$x."' order by id ");
}else {
  $titre = "list de tout les etudiant";
  $res=$DB->query("SELECT * FROM etudiant order by id");
}
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
<table class="printthis" width=70% border=2 solid  cellspacing=0 >
<caption> <? echo $titre ?></caption>
<tr align=center>
  <td>id</td><td>nom</td><td>prenom</td>
  <!--<td>user</td><td>password</td><td>adresse</td>-->
  <td>email</td><td>telef</td><td>classement</td><td>id_atelier</td><td>nb_abs</td>
</tr>

<?php  while($data=$res->fetch())
{
echo "<tr align=center>";
echo "<td>".$data['id']."</td>";
echo "<td>".$data['nom']."</td>";
echo "<td>".$data['prenom']."</td>";
//echo "<td>".$data['user']."</td>";
//echo "<td>".$data['password']."</td>";
//echo "<td>".$data['adresse']."</td>";
echo "<td>".$data['email']."</td>";
echo "<td>".$data['tel']."</td>";
echo "<td>".$data['classement']."</td>";
echo "<td>".$data['id_atelier']."</td>";
echo "<td>".$data['nb_abs']."</td>";
echo "</tr>";
}
$res->closeCursor();
?>
</table>
</center>

<button name=""  onclick="window.location.href='pageet.php'">retour</button>

</body>
</html>
