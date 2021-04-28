<?php
   session_start();

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://localhost:2145/Projects/TP/mini-projet/etudiant/etudiant.css" type="text/css">
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
    $atelier=$DB->query('select * from atelier');
    ?>
    <header>
    		<h1>Universite Constantine 2</h1>
    		<h2>Gestionaire d'atelier 3emeLI</h2><br>
    </header>

    <div id="body1" >
      <div class="log">

      <form class="form2"  method="post" action="">
      <table>
      <tr>
        <td><label style="font-size:15px;" for="id" required>ID:</label></td>
        <td><input type="text" name="id" placeholder="votre nom,prenom" id="id"required></td>
        <td><label style="font-size:15px;" for="password" >Password:</label></td>
        <td><input type="password" name="passwd" placeholder="votre password" id="psw" required></td>
        <td><input type="submit" name="connexion" value="connexion" id="conex" ></td>

      </tr>
      </table>
      </form>
      <?php

  if(isset($_POST['id'],$_POST['passwd']))
      {
        $id=$_POST['id'];$psw=$_POST['passwd'];
        $_SESSION['id']=$id;$_SESSION['psw']=$psw;
        $res=$DB->query("SELECT user,password FROM etudiant WHERE user='".$id."' and password='".$psw."'");
        while($result=$res->fetch())
            {  if($result >0)

              {
                echo $id,$psw;$_SESSION['login_user'] = $id;
                header( "Location: pageet.php" );
              }
            }
            echo "<script>document.getElementById('id').style.boxShadow = '0px 0px 2px 1px  red'; </script>";
            echo "<script>document.getElementById('psw').style.boxShadow = '0px 0px 2px 1px  red'; </script>";
  }

      ?>

      </div>

      <div class="text">
        <p>Remplire le formulaire si vous n'etes pas inscrit encore</p>
      </div>

      <form id="formreg" method="post" action="demandeet.php" onsubmit="return myFunction()" class="form" >
      <table style="width:455px;">
        <tr>
          <td><label for="nom">Nom :</label></td>
          <td><input type="text" name="nom" placeholder="ex: hamama" required></td>
        </tr>
        <tr>
          <td><label for="prenom">Prenom :</label></td>
          <td><input type="text" name="prenom" placeholder="ex: aimen khalil" required></td>
        </tr>
        <tr>
          <td><label for="groupe">Groupe :</label></td>
          <td><input type="number" name="groupe" placeholder="ex: 1,2,3,.." min="1" max="3" required></td>
        </tr>
        <tr>
          <td><label for="email">Email :</label></td>
          <td><input type="email" name="email" placeholder="ex: khalil.aymen25@gmail.com" required></td>
        </tr>
        <tr>
          <td><label for="password">Password :</label></td>
          <td><input id="psw1" type="password" name="password" placeholder="votre numero d'etudiant" required></td>
        </tr>
        <tr>
          <td><label for="confirmpassword">Confirmer password :</label></td>
          <td><input id="psw2" type="password" name="confirmpassword" placeholder="confirmer votre numero " required></td>
        </tr>
        <tr>
          <td><label for="atelier">Atelier :</label></td>
          <td>
            <select class="specialite" name="atelier">
            <optgroup label="Atelier">
              <?while ($data=$atelier->fetch()) {
                echo "<option value=".$data['id_atelier'].">".$data['id_atelier']."</option>";
              }?>
            </optgroup>
          </select>
        </td>
        </tr>
        <tr>
          <td><label for="classement">Classement :</label></td>
          <td><input type="number" name="classement" placeholder="ex:1,2,3,4,5,6..." required></td>
        </tr>
        <tr>
          <td><label for="telephone">Telephone :</label></td>
          <td><input type="number" name="telephone" placeholder="ex: 0559137334" required></td>
        </tr>
        <tr>
          <td><label for="adresse">Adresse :</label></td>
          <td><input type="text" name="adresse" placeholder="ex: uv17 bt A10 390 nvl ville el khroub constantine" required></td>
        </tr>
        <tr>
          <script type="text/javascript">

              function myFunction() {
                var pass1 = document.getElementById("psw1").value;
                var pass2 = document.getElementById("psw2").value;
                var ok = true;
                if (pass1 != pass2) {
                  //alert("Passwords Do not match");
                    document.getElementById("psw2").style.boxShadow = "0px 0px 10px 3px  red";
                    ok = false;
                  }
                  else {
                    alert("formulaire envoyer,votre inscription sera faite en max 2 jour");
                  }
                  return ok;
                }


          </script>
        <td></td><td align=center><button type="submit" name="send" >Valider</button></td>
        </tr>
      </table>
    </form>

    <img src="http://localhost:2145/Projects/TP/mini-projet/images/students.png">
    <button style="margin-left:240px;"  name="button" onclick="window.location.href='http://localhost:2145/Projects/TP/mini-projet/indexpage.html'">Quitter</button>

    </div>

  </body>
</html>
