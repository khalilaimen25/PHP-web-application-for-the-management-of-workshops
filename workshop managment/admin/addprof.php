<?include('add.php');
$atelier=$bdd->query('select * from atelier');
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="http://localhost:2145/Projects/TP/mini-projet/index.css">
    <link rel="stylesheet" href="http://localhost:2145/Projects/TP/mini-projet/admin/addboth.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


      <header>
      		<h1>Universite Constantine 2</h1>
      		<h2>Gestionaire d'atelier 3emeLI</h2><br>
      </header>

<div id="body1" >

  <div class="choix1">

      <form method="post" action="" class="form" >
      <table style="width:450px;">
        <caption style="text-align:right;font-size:45px;text-shadow: #ffffff 1px 1px, #ffffff -1px 1px, #ffffff -1px -1px, #ffffff 1px -1px;">Ajouter Enseignant</caption>
        <tr>
          <td><label for="nomen">Nom :</label></td>
          <td><input type="text" name="nomen" placeholder="ex: hamama" required></td>
        </tr>
        <tr>
          <td><label for="prenomen">Prenom :</label></td>
          <td><input type="text" name="prenomen" placeholder="ex: aimen khalil" required></td>
        </tr>
        <tr>
          <td><label for="useren">User :</label></td>
          <td><input id="idet" type="text" name="useren" placeholder="ex: hamama.aimen25" required></td>
        </tr>
        <tr>
          <td><label for="passworden">Password :</label></td>
          <td><input id="pswet" type="password" name="passworden" placeholder="votre numero d'etudiant" required></td>
        </tr>
        <tr>
          <td><label for="grade">Grade :</label></td>
          <td><input type="text" name="grade" placeholder="ex: docteur,chercher,chef departement.." required></td>
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
          <td><input id="emet" type="email" name="emailen" placeholder="ex: khalil.aymen25@gmail.com" required></td>
        </tr>
        <tr>
          <td><label for="telephoneen">Telephone :</label></td>
          <td><input type="number" name="telephoneen" placeholder="ex: 0559137334" required></td>
        </tr>
        <tr>
          <td><label for="adresseen">Adresse :</label></td>
          <td><input type="text" name="adresseen" placeholder="ex: uv17 bt A10 390 nvl ville el khroub constantine" required></td>
        </tr>
        <tr>
          <td></td><td align=center><button type="submit" name="send" >Valider</buttom></td>
        </tr>
      </table>
      <?if(isset($x) and isset($y,$z,$w)) {echo $x;echo $y,$z,$w;}?>
    </form>
    <div class="form13">
      <img  style="border-radius: 50%;background-color: rgba(79, 84, 91, 0.5);width:350px;height:350px;margin-right:100px;margin-top:50px;"src="http://localhost:2145/Projects/TP/mini-projet/images/prof.png" >
    </div>
    <div class="aceuil">
      <button type="button" name="button" onclick="window.location.href='addpage.php'">Acceuil</button>
    </div>

</div>
</div>
</body>
</html>
