<?
session_start();
//$user_check = $_SESSION['login_user'];
if(!isset($_SESSION['login_user'])){
      header("location:etudiant.php");
   }

$idu = $_SESSION['id'];
$psw = $_SESSION['psw'];

try{
$DB= new PDO('mysql:host=localhost;dbname=atelier;charset=utf8','root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}catch(Exception $e)
{
die('erreur :'.$e->getMessage());
}
$req=$DB->query("select * from etudiant where user='".$idu."' and password='".$psw."'");

 while ($data = $req->fetch()) {
  $id = $data['id'];
  $nom = $data['nom'];
  $prenom = $data['prenom'];
  $user = $data['user'];
  $password = $data['password'];
  $email = $data['email'];
  $tel = $data['tel'];
  $adresse = $data['adresse'];
  $atelier = $data['id_atelier'];
  $class = $data['classement'];

}

$_SESSION['id_e']=$id;
$_SESSION['nom']=$nom;
$_SESSION['prenom']=$prenom;
$_SESSION['atelier']=$atelier;


$abs = $DB->query("select count(*) from evaluation,etudiant where note=0 and id=id_et and id='".$id."'   ");
while ($a = $abs->fetch()) {
  $ab=$a['count(*)'];
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

      <div id="menu" >
            <ul style="padding-left:5%;">
              <li style="margin-left:220px;"><a href="consnote.php">Consulter note</a></li>
              <li><a href="atelierinfo.php">Programme d'atelier</a></li>
              <li>
              <a class="aaa" style="width:120px;" href="#">List</a>
              <ul>
                <li><a style="margin-top:3px;width:120px;" href="consulteet.php">etudiants</a></li>
                <li><a style="width:120px;"href="consulteen.php">enseignants</a></li>
              </ul>
             </li>
              <li ><a class="deconexion" href="logout.php">deconnexion</a></li>
            </ul>
      </div>
      <p class="dat">Le :  <?echo date("d.m.Y");?></p>
       <div class="welcome">Bienvenue <? echo $nom ." ". $prenom;?></div>
       <p class="info" >Voici vos informations : </p>

       <center>
        <table class="infos">
          <tr>
            <th>ID :</th><td><?echo $id?></td>
          </tr>
          <tr>
            <th>Nom :</th><td><?echo $nom?></td>
          </tr>
          <tr>
            <th>Prenom :</th><td><?echo $prenom?></td>
          </tr>
          <tr>
            <th>Atelier :</th><td><?echo $atelier?></td>
          </tr>
          <tr>
            <th>Classement :</th><td><?echo $class?></td>
          </tr>
          <tr>
            <th>User :</th><td><?echo $user?></td>
          </tr>
          <tr>
            <th>Password :</th><td><?echo $psw?></td>
          </tr>
          <tr>
            <th>Email :</th><td><?echo $email?></td>
          </tr>
          <tr>
            <th>Telephone :</th><td><?echo $tel?></td>
          </tr>
          <tr>
            <th>Adresse :</th><td><?echo $adresse?></td>
          </tr>
          <tr>
            <th>Abscence :</th><td><?echo $ab?></td>
          </tr>

        </table>
      </center>

      <button type="button" class="modifier">Modifier</button>


    </div>




 </body>
</html>
