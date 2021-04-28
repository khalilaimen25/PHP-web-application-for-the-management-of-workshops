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

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="http://localhost:2145/Projects/TP/mini-projet/index.css">
    <link rel="stylesheet" href="http://localhost:2145/Projects/TP/mini-projet/admin/addboth.css">
    <meta charset="utf-8">
    <title>modifier etudiant</title>
  </head>
  <body>
    <header>
        <h1>Universite Constantine 2</h1>
        <h2>Gestionaire d'atelier 3emeLI</h2><br>
    </header>

    <div id="body1" >

<?php
if(isset($_POST['id']))
{
  $id=$_POST['id'];
if(!empty($_POST['nomen']))
{
  $nom=$_POST['nomen'];
  $req=$DB->prepare("UPDATE enseignant set nom = :nom where id=:id");
  $req->execute(array('id'=>$id,'nom'=>$nom));
}
if(!empty($_POST['prenomen']))
{
  $prenom=$_POST['prenomen'];
  $req=$DB->prepare("UPDATE enseignant set prenom = :prenom where id=:id");
  $req->execute(array('id'=>$id,'prenom'=>$prenom));
}
if(!empty($_POST['useren']))
{
  $user=$_POST['useren'];
  $req=$DB->prepare("UPDATE enseignant set user = :user where id=:id");
  $req->execute(array('id'=>$id,'user'=>$user));
}
if(!empty($_POST['passworden']))
{
  $psw=$_POST['passworden'];
  $req=$DB->prepare("UPDATE enseignant set password = :psw where id=:id");
  $req->execute(array('id'=>$id,'psw'=>$psw));
}
if(!empty($_POST['atelier']))
{
  $atelier=$_POST['atelier'];
  $req=$DB->prepare("UPDATE enseignant set id_atelier = UPPER(:atelier) where id=:id");
  $req->execute(array('id'=>$id,'atelier'=>$atelier));
}
if(!empty($_POST['emailen']))
{
  $email=$_POST['emailen'];
  $req=$DB->prepare("UPDATE enseignant set email = :email where id=:id");
  $req->execute(array('id'=>$id,'email'=>$email));
}
if(!empty($_POST['telephoneen']))
{
  $tel=$_POST['telephoneen'];
  $req=$DB->prepare("UPDATE enseignant set tel = :tel where id=:id");
  $req->execute(array('id'=>$id,'tel'=>$tel));
}
if(!empty($_POST['adresseen']))
{
  $adr=$_POST['adresseen'];
  $req=$DB->prepare("UPDATE enseignant set adresse = :adr where id=:id");
  $req->execute(array('id'=>$id,'adr'=>$adr));
}
if(!empty($_POST['grade']))
{
  $grade=$_POST['grade'];
  $req=$DB->prepare("UPDATE enseignant set grade = :grade where id=:id");
  $req->execute(array('id'=>$id,'grade'=>$grade));
}

header('Location:finalpage2.html');
}
?>

      <div class="choix2">
        <form method="post" action=""  class="form2" >
        <table style="width:470px;">
          <caption style="text-align:right;font-size:45px;text-shadow: #ffffff 1px 1px, #ffffff -1px 1px, #ffffff -1px -1px, #ffffff 1px -1px;">Modifier Enseignant</caption>

          <tr>
            <td><label for="id">ID :</label></td>
            <td><input style="color:#4364b7;font-size:18px;font-weight:bolder;" type="number" name="id" min=1 max=30 placeholder="ex: 1,2,3,..." required></td>
          </tr>
          <tr>
            <td><label for="nomen">Nom :</label></td>
            <td><input type="text" name="nomen" placeholder="ex: hamama"></td>
          </tr>
          <tr>
            <td><label for="prenomen">Prenom :</label></td>
            <td><input type="text" name="prenomen" placeholder="ex: aimen khalil"></td>
          </tr>
          <tr>
            <td><label for="useren">User :</label></td>
            <td><input type="text" name="useren" placeholder="ex: hamamaaimenkhalil95"></td>
          </tr>
          <tr>
            <td><label for="passworden">Password :</label></td>
            <td><input type="text" name="passworden" placeholder="ex: 136548" ></td>
          </tr>
          <tr>
            <td><label for="grade">Grade :</label></td>
            <td><input type="text" name="grade" placeholder="ex: doctor,chercher..." ></td>
          </tr>
          <tr>
              <td><label for="atelier">Atelier :</label></td>
              <td><select class="specialite" name="atelier">
                <optgroup label="Atelier">
                  <?while ($data=$atelier->fetch()) {
                    echo "<option value=".$data['id_atelier'].">".$data['id_atelier']."</option>";
                  }?>
                </optgroup>
              </select></td>
          </tr>
          <tr>
            <td><label for="emailen">Email :</label></td>
            <td><input type="email" name="emailen" placeholder="ex: khalil.aymen25@gmail.com" ></td>
          </tr>
          <tr>
            <td><label for="telephoneen">Telephone :</label></td>
            <td><input type="number" name="telephoneen" placeholder="ex: 0559137334"></td>
          </tr>
          <tr>
            <td><label for="adresseen">Adresse :</label></td>
            <td><input type="text" name="adresseen" placeholder="ex: uv17 bt A10 390 nvl ville el khroub constantine"></td>
          </tr>
          <tr>
            <td></td><td align=center><button type="submit" name="send" >Valider</buttom></td>
          </tr>
        </table>

      </form>
      <div class="form13">
        <img  style="width:340px;height:340px;margin-right:150px;margin-top:50px;"src="http://localhost:2145/Projects/TP/mini-projet/images/prof.png" >
      </div>
      <div class="aceuil">
        <button style="margin-right: 30px;"type="button" name="button" onclick="window.location.href='addpage.php'">Acceuil</button>
      </div>

      </div>
    </div>

  </body>
</html>
