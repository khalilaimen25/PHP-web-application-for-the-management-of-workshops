<?
session_start();
try{
$DB= new PDO('mysql:host=localhost;dbname=atelier;charset=utf8','root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}catch(Exception $e)
{
die('erreur :'.$e->getMessage());
}

$id=$_SESSION['id_e'];
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
$atelier=$_SESSION['atelier'];
$note=$DB->query("select note,date_note from evaluation,etudiant where id_et=id and id_et=$id");
//$note=$DB->query("select note from evaluation,etudiant where evaluation.id_et = etudiant.id ");
?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://localhost:2145/Projects/TP/mini-projet/etudiant/etudiant.css" type="text/css">
    <link rel="stylesheet" href="http://localhost:2145/Projects/TP/mini-projet/admin/admin.css">

    <title>Etudiant</title>
  </head>
  <body>
    <header>
    		<h1>Universite Constantine 2</h1>
    		<h2>Gestionaire d'atelier 3emeLI</h2><br>
    </header>

    <div id="body1">
      <center>
        <div class="tab">
      <table class="infos"  cellspacing=10 width=45%>
        <caption style="margin:30px;">Evaluation de <?echo $nom." ".$prenom;?> atelier <?echo $atelier;?></caption>
          <tr>
            <td></td><th>note</th><th>date</th>
          </tr>
          <?$i=1;
            while ($a=$note->fetch()) {?>
            <tr><th>note : <?echo $i;?></td><td><?echo $a['note'];?></td><td><?echo $a['date_note']?></td></tr>
          <?
          $i=$i+1;
          }?>

    </table>
  </div>
    <button type="button" name="button" onclick="window.location.href='pageet.php'">Retour</button>
  </center>

    </div>

  </body>
</html>
