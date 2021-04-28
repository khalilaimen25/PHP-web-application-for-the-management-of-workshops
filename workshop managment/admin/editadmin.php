<?php
session_start();
if(!isset($_SESSION['user'])){
      header("location:admin.php");
   }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://localhost:2145/Projects/TP/mini-projet/etudiant/etudiant.css">
    <link rel="stylesheet" href="http://localhost:2145/Projects/TP/mini-projet/admin/admin.css">
    <title>Etudiant</title>
  </head>
  <body>

    <?php
    try{
    $DB= new PDO('mysql:host=localhost;dbname=atelier;charset=utf8','root','',
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    }catch(Exception $e)
    {
    die('erreur :'.$e->getMessage());
    }

    ?>

    <header>
    		<h1>Universite Constantine 2</h1>
    		<h2>Gestionaire d'atelier 3emeLI</h2><br>
    </header>

      <div id="body1">
      <h1 style="text-align:center;">Entrer votre user et password actuel</h1>
    <div class="formulaire" style="margin-right:260px;margin-top:50px;">
      <form method="post" class="form" action="" >
      <table  cellspacing=10>
        <tr>
          <td><label for="nom">Identifiant :</label></td>
          <td><input type="text" name="nomad" placeholder="ex: ID" id="id"required></td>
        </tr>
        <tr>
          <td><label for="password">Password :</label></td>
          <td><input type="password" name="passwordad" placeholder="ex: PASSWORD" id="psw"required></td>
        </tr>
        <tr>
          <td></td><td align=center><button style="margin-right:20px;" type="submit" name="send" >Valider</button><button onclick="window.location.href = 'addpage.php'" >Retour</button></td>


        </tr>
      </table>


    </form>
    <?php

if(isset($_POST['nomad'],$_POST['passwordad']))
    {
      $id=$_POST['nomad'];$psw=$_POST['passwordad'];
      $res=$DB->query("SELECT id,password FROM admin WHERE id='".$id."' and password='".$psw."'");
      while($result=$res->fetch())
          {  if($result >0)
            $_SESSION['user'] = $id;
            header( "Location: editadmin2.php" );
          }
          echo "<script>document.getElementById('id').style.boxShadow = '0px 0px 2px 1px  red'; </script>";
          echo "<script>document.getElementById('psw').style.boxShadow = '0px 0px 2px 1px  red'; </script>";

}

    ?>



    </div>
  </div>

  </body>
</html>
