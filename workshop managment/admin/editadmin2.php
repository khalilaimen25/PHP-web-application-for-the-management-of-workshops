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

      <div id="body1" >
      <h1 style="text-align:center;">Entrer votre nouveau user et password</h1>
    <div class="formulaire" style="margin-right:260px;margin-top:50px;">
      <form method="post" class="form" action="" onsubmit="return myFunction()" >
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
        <td><label for="confirmpassword">Confirmer password :</label></td>
        <td><input id="psw2" type="password" name="confirmpassword" placeholder="confirmer votre password " required></td>
       </tr>

        <tr>
          <td></td><td align=center><button style="margin-right:20px;" type="submit" name="send" >Valider</button><button onclick="window.location.href = 'addpage.php'" >Retour</button></td>

        </tr>
      </table>
      <script type="text/javascript">

          function myFunction() {
            var pass1 = document.getElementById("psw").value;
            var pass2 = document.getElementById("psw2").value;
            var ok = true;
            if (pass1 != pass2) {
              //alert("Passwords Do not match");
                document.getElementById("psw2").style.boxShadow = "0px 0px 10px 3px  red";
                ok = false;
              }
              else {
                alert("user et password ete changer avec succes");
              }
              return ok;
            }
      </script>


    </form>
    <?php

if(isset($_POST['nomad'],$_POST['passwordad']))
    {
      $id=$_POST['nomad'];$psw=$_POST['passwordad'];
      $res=$DB->prepare("UPDATE admin set  id=:id , password=:psw");
      $res->execute(array('id'=>$id , 'psw'=>$psw ));
      header('Location:admin.php');
    }

    ?>



    </div>
  </div>

  </body>
</html>
<? session_destroy();?>
