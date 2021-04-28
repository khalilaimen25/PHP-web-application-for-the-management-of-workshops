<?
session_start();
if(!isset($_SESSION['user'])){
      header("location:admin.php");
   }
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="http://localhost:2145/Projects/TP/mini-projet/index.css">
    <link rel="stylesheet" href="http://localhost:2145/Projects/TP/mini-projet/admin/admin.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


      <header>
      		<h1>Universite Constantine 2</h1>
      		<h2>Gestionaire d'atelier 3emeLI</h2><br>
      </header>
      <? include('nbredemet.php');
         include('nbredemen.php');
         $sum=$n+$m;
         $txt = "<span style='color:red;'>".$sum."</span>" ;  ?>
  <div id="body2" >
    <div id="menu">

          <ul class="menu">

            <li>
              <a style="width:120px;" class="demande" href="#">Demande(<?echo $txt;?>)</a>
             <ul>
              <li><a style="margin-top:3px;" class="demande" href="http://localhost:2145/Projects/TP/mini-projet/admin/request/requestet.php"><? echo $l;?></a></li>
              <li><a class="demande" href="http://localhost:2145/Projects/TP/mini-projet/admin/request/requesten.php"><? echo $k;?></a></li>
             </ul>
            </li>

          <li>
          <a class="aaa" style="width:120px;" href="#">List</a>
          <ul>
            <li><a style="margin-top:3px;width:120px;" href="consulteet.php">etudiants</a></li>
            <li><a style="width:120px;"href="consulteen.php">enseignants</a></li>
          </ul>
         </li>

         <li>
           <a class="aaa" style="width:120px;" href="#">Mode table</a>
           <ul>
            <li><a style="margin-top:3px;" href="http://localhost:2145/Projects/TP/mini-projet/admin/ajout/modetableet.php">Mode table etudiant</a></li>
            <li><a href="http://localhost:2145/Projects/TP/mini-projet/admin/ajout/modetableen.php">Mode table enseignant</a></li>
          </ul>
        </li>
        <li><a class="aaa" href="atelierinfo.php">Atelier info</a></li>
            <li><a class="deconexion" href="logout.php">deconnexion</a></li>

          </ul>

        </div>
    <div class="text1">
    <h1 style="text-shadow: #1d7726 1px 1px, #1d7726 -1px 1px, #1d7726 -1px -1px, #1d7726 1px -1px;">Ajouter un Etudiant ou un Enseignant</h1>
    </div>
    <div class="choix1">
        <div id="zone"><a href="edit.html"><img id="image" src="http://localhost:2145/Projects/TP/mini-projet/images/edit1.ico"></a><h3 style="text-align:center;text-shadow: #ffffff 1px 1px, #ffffff -1px 1px, #ffffff -1px -1px, #ffffff 1px -1px;">Modifier</h3></div>
        <div id="zone"><a href="atelier.php"><img id="image" src="http://localhost:2145/Projects/TP/mini-projet/images/atelier.png"></a><h3 style="text-align:center;text-shadow: #ffffff 1px 1px, #ffffff -1px 1px, #ffffff -1px -1px, #ffffff 1px -1px;">Atelier</h3></div>
        <div id="zone"><a href="addprof.php"><img id="image" src="http://localhost:2145/Projects/TP/mini-projet/images/prof.png"></a><h3 style="text-align:center;text-shadow: #ffffff 1px 1px, #ffffff -1px 1px, #ffffff -1px -1px, #ffffff 1px -1px;">Enseignant</h3></div>
        <div id="zone"><a href="addetud.php"><img id="image" src="http://localhost:2145/Projects/TP/mini-projet/images/students.png"></a><h3 style="text-align:center;text-shadow: #ffffff 1px 1px, #ffffff -1px 1px, #ffffff -1px -1px, #ffffff 1px -1px;">Etudiant</h3></div>
    </div>

    <div class="text2">
    <h1 style="text-shadow: #5b1111 1px 1px, #5b1111 -1px 1px, #5b1111 -1px -1px, #5b1111 1px -1px;">Supprimer un Etudiant ou un Enseignant</h1>
    </div>
    <div class="choix2">
        <div id="zone"><a href="suppe.php"><img id="image2" src="http://localhost:2145/Projects/TP/mini-projet/images/prof.png"></a><h3 style="text-align:center;text-shadow: #ffffff 1px 1px, #ffffff -1px 1px, #ffffff -1px -1px, #ffffff 1px -1px;">Enseignant</h3></div>
        <div id="zone"><a href="supp.php"><img id="image2" src="http://localhost:2145/Projects/TP/mini-projet/images/students.png"></a><h3 style="text-align:center;text-shadow: #ffffff 1px 1px, #ffffff -1px 1px, #ffffff -1px -1px, #ffffff 1px -1px;">Etudiant</h3></div>
    </div>


  </div>

  </body>
</html>
