<?php
session_start();
try{
$DB= new PDO('mysql:host=localhost;dbname=atelier;charset=utf8','root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}catch(Exception $e)
{
die('erreur :'.$e->getMessage());
}
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
        <p class="info">Programme d'atelier : </p>

      <table class="infos" width=60%>
        <tr >
          <th>Atelier</th><th style="text-align: center;">Theme</th><th>Salle</th><th>Duree</th>
        </tr>
        <?
        $at=$DB->query('select * from atelier ');
        while ($data = $at->fetch()) {
        ?>
        <tr>
          <th><?echo $data['id_atelier'];?> :</th><td><?echo $data['theme'];?></td><td><?echo $data['salle'];?></td><td><?echo $data['duree'];?> h</td>
        </tr>
        <?
        }
        $at->closeCursor();
        ?>


      </table>

      <p class="info">Professeur d'atelier :</p>

      <table class="infos" width=60%>
        <tr>
          <th>Atelier</th><th style="text-align: center;">Professeur</th>
        </tr>

          <?
          $at=$DB->query('select * from atelier ');

          while ($a = $at->fetch()) {
          ?>
          <tr>
          <th><?echo $a['id_atelier']." :";?></th>

            <?$atp=$DB->query("SELECT nom,prenom from atelier a,enseignant e
                        where a.id_atelier = '".$a['id_atelier']."' AND a.id_atelier=e.id_atelier ");
            while ($b = $atp->fetch()) {?>
              <td><?php echo $b['nom']." ".$b['prenom']; ?></td>
            <?}

            ?>


          </tr>
          <?

          }
          ?>

      </table>
        <button type="button" name="button" onclick="window.location.href='pageens.php'">Retour</button>
    </center>

    </div>

  </body>
</html>
