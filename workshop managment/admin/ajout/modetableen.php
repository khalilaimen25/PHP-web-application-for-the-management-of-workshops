<?php
session_start();
include('fonction2.php');
include('importexelen.php');
try{
$DB= new PDO('mysql:host=localhost;dbname=atelier;charset=utf8','root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}catch(Exception $e)
{
die('erreur :'.$e->getMessage());
}
$atelier=$DB->query('select * from atelier');
?>
<html>
<head>
  <title>ajoute enseignant</title>
  <link rel="stylesheet" href="http://localhost:2145/Projects/TP/mini-projet/admin/ajout/ajout.css">
</head>
<body>
<center>


<table border  cellspacing=0 >

  <td rowspan="2"><button class="retour" onclick="alert()">Retour page principale</td>
    <script type="text/javascript">
    function alert()
    {if(confirm('vouler vous quiter le mode tableau..'))
      window.location.href='http://localhost:2145/Projects/TP/mini-projet/admin/addpage.php';}
    </script>

    <form class="form4" action="" method="post">
    <td><select class="listatelier" name="atelierlist">
      <optgroup style="color:#000;text-align:left;background-color:#ffffff;"label="choisir atelier">
        <option selected disabled hidden>Lister par</option>
        <option value="tout">Afficher tout</option>
        <?while ($data=$atelier->fetch()) {
          echo "<option value=".$data['id_atelier'].">".$data['id_atelier']."</option>";
        }?>

     </optgroup>
    </select>
  </td>
    <td rowspan="2"><input type="submit" class="valider" value="Valider"></td>
    <td class="wb" style="background-color:#ffffff;border-top:none;border-right:none;border-bottom:none;" colspan="8"><?if(!empty($r)) echo $r;?></td>
<!--<form class="form2" action="fonction.php" method="post">-->

<tr>
  <!--<td><input style="width:60px;"class="a"type="number" name="id" ></td>
  <td><input type="submit" class="del" value=supprimer></td>-->
  <!--</form>-->

  <!--<form class="form3" action="" method="post">-->
  <td><select class="trier" name="trier">
    <optgroup style="color:#000;text-align:left;background-color:#ffffff;"label="Trier par">
      <option selected disabled hidden>Trier par</option>
      <option value="id">id</option>
      <option value="nom">nom</option>
      <option value="prenom">prenom</option>
      <option value="id_atelier">atelier</option>
      <option value="grade">grade</option>


    </optgroup>
  </select></td>

  </form>
  <form method="post" action="" enctype="multipart/form-data">
  <td><input type="submit" name="import" class="validerexel" value="Importer EXEL file"></td>
    <td colspan="8" class="wb"><input style="width:100%;" type="file" name="file"></td>
    <td class="wb" colspan="5"></td>
  </form>


</tr>
<tr align=center class="head">
  <td>id</td><td>nom</td><td>prenom</td>
  <td>user</td><td>password</td><td>grade</td><td>adresse</td>
  <td>email</td><td>telef</td><td>id_atelier</td>
</tr>
<?php

  if(!empty($_POST['trier']))
  {$tri=$_POST['trier'];}
  else {$tri="id";}

  if(!empty($_POST['atelierlist']))
      {$ate=$_POST['atelierlist'];//echo $ate;
              if($ate != "tout")
              {

              $res=$DB->query("SELECT * FROM enseignant where id_atelier='".$ate."' order by $tri ");
              echo "<p>List des enseignant (atelier): ".$ate."</p>";

              }
              else
              {
              $res=$DB->query("SELECT * FROM enseignant order by $tri ");
                echo "<p>List des enseignant  TI </p>";
              }
      }
else {

  $res=$DB->query("SELECT * FROM enseignant  order by $tri ");
  echo "<p>List des enseignant TI </p>";}



  while($data=$res->fetch())
{


echo "<tr align=center>";
echo "<td>".$data['id']."</td>";
echo "<td>".$data['nom']."</td>";
echo "<td>".$data['prenom']."</td>";
echo "<td>".$data['user']."</td>";
echo "<td>".$data['password']."</td>";
echo "<td>".$data['grade']."</td>";
echo "<td>".$data['adresse']."</td>";
echo "<td>".$data['email']."</td>";
echo "<td>".$data['tel']."</td>";
echo "<td>".$data['id_atelier']."</td>";
echo "</tr>";
}

$res->closeCursor();
?>

  <tr align=center class="head">
    <td>id</td><td>nom</td><td>prenom</td>
    <td>user</td><td>password</td><td>grade</td><td>adresse</td>
    <td>email</td><td>telef</td><td>id_atelier</td>
  </tr>

<form method="post" action="">
<tr>
  <td><!--<input style="width:100px;height:100%;"class="a" type="number" name="idet" max="200" >--></td>
  <td><input class="a" type="text" name="nomen"  required></td>
  <td><input class="a" type="text" name="prenomen" required></td>
  <td><input id="idet" class="a" type="text" name="useren"  required></td>
  <td><input id="pswet" class="a" type="text" name="passworden"  required></td>
  <td><input style="width:90px;" class="a" type="text" name="grade"  required></td>
  <td><input class="a" style="width:auto;"type="text" name="adresseen" required></td>
  <td><input id="emet" class="a" style="width:auto;"type="email" name="emailen"  required></td>
  <td><input class="a" type="number" name="telephoneen"  required></td>
  <td>
    <select class="specialite" name="atelier">
    <optgroup label="Atelier">
      <?
        $atelie=$DB->query('select * from atelier');
        while ($data=$atelie->fetch()) {
        echo "<option value=".$data['id_atelier'].">".$data['id_atelier']."</option>";
      }?>
    </optgroup>
  </select>
 </td>


</tr>
<tr>
<td colspan="11"><input type="submit" class="add" value="Ajoute Ajouter Ajouter Ajouter"></td>
</tr>
</form>
<form class="" action="fonction2.php" method="post" onsubmit="return confirm('Are you sure you want to delete?')">
<td colspan="2"><input type="submit" class="del"value="Supprimer" ></td>
<td style="color:red;font-weight:bold;font-size:20px;"colspan="9">
  <input style="width:70px;height:100%;color:red;font-size:23px;"class=a type="number" name="id" value="" max="200" required>  Entrer l'ID d'etudiant que vouler supprimer..</td>
</form>
</table>
<?if(isset($x) and isset($y,$z,$w)) {echo $x,$y,$z,$w;}?>
</center>




</body>
</html>
