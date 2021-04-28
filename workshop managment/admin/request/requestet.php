<?php
session_start();
try{
$DB= new PDO('mysql:host=localhost;dbname=atelier;charset=utf8','root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}catch(Exception $e)
{
die('erreur :'.$e->getMessage());
}
$req=$DB->query("select * from demandeet");
$n=$DB->query("select count(*) from demandeet")->fetchColumn();
?>
<html>
  <head>
    <title>Demande</title>
    <link rel="stylesheet" href="http://localhost:2145/Projects/TP/mini-projet/index.css">
    <link rel="stylesheet" href="request.css">
  </head>
  <body>
    <header>
    		<h1>Universite Constantine 2</h1>
    		<h2>Gestionaire d'atelier 3emeLI</h2><br>
    </header>

    <div id="body1">
      <div class="nbdm"><? echo "Vous avez ".$n." demande d'ajout etudiant<br>";?></div>

      <div id="dem">

<?
if($n == 0) {echo "<p> aucune demande recu</p>";}
$d = 1 ;
while ($data = $req->fetch()) {
?>

    <form class="" action="suppdemet.php" method="post">


  <table>
    <caption>demande N:<?echo "<span>".$d."</span>";?></caption>
    <tr>
      <td class="a">Nom/Prenom :</td><td class="b"><?  echo $data['nom']." ".$data['prenom']; ?></td>
    </tr>
    <tr>
      <td class="a">Groupe :</td><td class="b"><? echo "Gr 0".$data['groupe'];?></td>
    </tr>
    <tr>
      <td class="a">Classement :</td><td class="b"><?echo $data['classement'];?></td>
    </tr>
    <tr>
      <td class="a">Atelier :</td><td class="b"><? echo $data['atelier'];?></td>
    </tr>
    <tr>
      <td class="a">Password :</td><td class="b"><? echo $data['password'];?></td>
    </tr>
    <tr>
      <td class="a">Email :</td><td class="b"><? echo $data['email'];?></td>
    </tr>
    <tr>
      <td class="a">Telephone :</td><td class="b"><? echo $data['tel'];?></td>
    </tr>
    <tr>
      <td class="a">Adresse :</td><td class="b"><? echo $data['adresse'];?></td>
    </tr>
    <tr>
      <?$nom=$data['nom'];
        $tel=$data['tel'];
        $password=$data['password'];?>
      <input type='hidden' name='nom' value=<?php echo htmlspecialchars($nom); ?> />
      <input type='hidden' name='psw' value=<?php echo htmlspecialchars($password); ?> />
      <input type='hidden' name='tel' value=<?php echo htmlspecialchars($tel); ?> />
      <td><input type="submit" class="supp"  value="supprimer"/></td>
    </tr>


    </table>
</form>

<?
$d = $d + 1;
 }?>
 </div>
 <button type="button" id="retour" name="button" onclick="window.location.href='http://localhost:2145/Projects/TP/mini-projet/admin/addpage.php'">Retour</button>
</div>
</body>
 </html>
