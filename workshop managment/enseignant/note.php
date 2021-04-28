<?
session_start();
try{
$DB= new PDO('mysql:host=localhost;dbname=atelier;charset=utf8','root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}catch(Exception $e)
{
die('erreur :'.$e->getMessage());
}
$atelier=$_SESSION['atelier'];
$et=$DB->query("select * from etudiant where id_atelier ='".$atelier."'");
//$note=$DB->query("select note from evaluation,etudiant where evaluation.id_et = etudiant.id ");
?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://localhost:2145/Projects/TP/mini-projet/etudiant/etudiant.css" type="text/css">
    <link rel="stylesheet" href="http://localhost:2145/Projects/TP/mini-projet/admin/admin.css">
    <link rel="stylesheet" href="enseignant.css">
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
      <table class="tablenote" border=3px  cellspacing=0 >
        <legend>Evaluation atelier : <? echo $atelier;?></legend>
        <tr>
          <th>id</th><th>nom</th><th>prenom</th><th>note</th>
        </tr>

      <?
      while ($data=$et->fetch())
      {?>
          <form method="post" action="">
          <?$note=$DB->query("select note,date_note from evaluation,etudiant where evaluation.id_et = etudiant.id and etudiant.id='".$data['id']."' ");?>
        <tr>
          <td><?echo $data['id'];?></td>
          <td><?echo $data['nom'];?></td>
          <td><?echo $data['prenom'];?></td>
          <?while($data2=$note->fetch()) {?>
              <td><?echo $data2['note']."<br><span style='font-size:12px;'>".$data2['date_note'];?></span></td>
          <?}?>
        <td style="width:150px;">
          <input type="hidden" name="id" value=<?php echo htmlspecialchars($data['id']); ?>>
          <input class="note" type="text" name="not" min=0 max=20 required>
          <input class="ok" type="submit" name="oknote" value="OK"></td>
        </tr>
        </form>
      <?}
      include('addnote.php');
      ?>
    </table>
  </div>

  <div class="form1">
    <form method="post" action="">
    <table>
      <caption>Modifier note</caption>
      <tr>
        <th>ID :</th><td><input type="number" name="idet" required></td>
      </tr>
      <tr>
        <th>Date :</th><td><input type="date" name="date" required></td>
      </tr>
      <tr>
        <th>Note :</th><td><input type="text" min=0 max=20 name="newnote"></td>
      </tr>
      <tr>
        <th>supprimer note :</th><td><input type="checkbox" name="suppnote" value=""></td>
      </tr>
      <tr>
        <td></td><td><button type="submit" name="oknewnote">Valider</button></td>
      </tr>

    </table>
  </form>
  </div>
    <button  name="button" onclick="window.location.href='pageens.php'">Retour</button>
  </center>

    </div>

  </body>
</html>
