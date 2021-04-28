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
if(!empty($_POST['nomet']))
{
  $nom=$_POST['nomet'];
  $req=$DB->prepare("UPDATE etudiant set nom = :nom where id=:id");
  $req->execute(array('id'=>$id,'nom'=>$nom));
}
if(!empty($_POST['prenomet']))
{
  $prenom=$_POST['prenomet'];
  $req=$DB->prepare("UPDATE etudiant set prenom = :prenom where id=:id");
  $req->execute(array('id'=>$id,'prenom'=>$prenom));
}
if(!empty($_POST['useret']))
{
  $user=$_POST['useret'];
  $req=$DB->prepare("UPDATE etudiant set user = :user where id=:id");
  $req->execute(array('id'=>$id,'user'=>$user));
}
if(!empty($_POST['passwordet']))
{
  $psw=$_POST['passwordet'];
  $req=$DB->prepare("UPDATE etudiant set password = :psw where id=:id");
  $req->execute(array('id'=>$id,'psw'=>$psw));
}
if(!empty($_POST['atelier']))
{
  $atelier=$_POST['atelier'];
  $req=$DB->prepare("UPDATE etudiant set id_atelier = UPPER(:atelier) where id=:id");
  $req->execute(array('id'=>$id,'atelier'=>$atelier));
}
if(!empty($_POST['emailet']))
{
  $email=$_POST['emailet'];
  $req=$DB->prepare("UPDATE etudiant set email = :email where id=:id");
  $req->execute(array('id'=>$id,'email'=>$email));
}
if(!empty($_POST['telephoneet']))
{
  $tel=$_POST['telephoneet'];
  $req=$DB->prepare("UPDATE etudiant set tel = :tel where id=:id");
  $req->execute(array('id'=>$id,'tel'=>$tel));
}
if(!empty($_POST['adresseet']))
{
  $adr=$_POST['adresseet'];
  $req=$DB->prepare("UPDATE etudiant set adresse = :adr where id=:id");
  $req->execute(array('id'=>$id,'adr'=>$adr));
}
if(!empty($_POST['nbabs']))
{
  $nabs=$_POST['nbabs'];
  $req=$DB->prepare("UPDATE etudiant set nb_abs = :nabs where id=:id");
  $req->execute(array('id'=>$id,'nabs'=>$nabs));
}
header('Location:finalpage2.html');
}

?>

      <div class="choix2">
        <form method="post" action=""  class="form2" >
        <table style="width:470px;">
          <caption style="text-align:right;font-size:45px;text-shadow: #ffffff 1px 1px, #ffffff -1px 1px, #ffffff -1px -1px, #ffffff 1px -1px;">Modifier Etudiant</caption>

          <tr>
            <td><label for="id">ID :</label></td>
            <td><input style="color:#4364b7;font-size:18px;font-weight:bolder;" type="number" name="id" min=1 max=100 placeholder="ex: 1,2,3,..." required></td>
          </tr>
          <tr>
            <td><label for="nomet">Nom :</label></td>
            <td><input type="text" name="nomet" placeholder="ex: hamama"></td>
          </tr>
          <tr>
            <td><label for="prenomet">Prenom :</label></td>
            <td><input type="text" name="prenomet" placeholder="ex: aimen khalil"></td>
          </tr>
          <tr>
            <td><label for="useret">User :</label></td>
            <td><input type="text" name="useret" placeholder="ex: hamamaaimenkhalil95"></td>
          </tr>
          <tr>
            <td><label for="passwordet">Password :</label></td>
            <td><input type="text" name="passwordet" placeholder="votre numero d'etudiant" ></td>
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
            <td><label for="emailet">Email :</label></td>
            <td><input type="email" name="emailet" placeholder="ex: khalil.aymen25@gmail.com" ></td>
          </tr>
          <tr>
            <td><label for="telephoneet">Telephone :</label></td>
            <td><input type="number" name="telephoneet" placeholder="ex: 0559137334"></td>
          </tr>
          <tr>
            <td><label for="adresseet">Adresse :</label></td>
            <td><input type="text" name="adresseet" placeholder="ex: uv17 bt A10 390 nvl ville el khroub constantine"></td>
          </tr>
          <tr>
            <td><label for="nbabs">nb_abscence :</label></td>
            <td><input type="number" name="nbabs" placeholder="ex: 0,1,2,3,4.."></td>
          </tr>
          <tr>
            <td></td><td align=center><button type="submit" name="send" >Valider</buttom></td>
          </tr>
        </table>

      </form>
      <div class="form13">
        <img  style="width:340px;height:340px;margin-right:150px;margin-top:50px;"src="http://localhost:2145/Projects/TP/mini-projet/images/students.png" >
      </div>
      <div class="aceuil">
        <button style="margin-right: 30px;"type="button" name="button" onclick="window.location.href='addpage.php'">Acceuil</button>
      </div>

      </div>
    </div>

  </body>

</html>
