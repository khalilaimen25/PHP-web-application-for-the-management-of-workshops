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
  <div class="choix2">

    <form method="post" action=""  class="form2" >
    <table style="width:470px;">
      <caption style="text-align:right;font-size:45px;text-shadow: #ffffff 1px 1px, #ffffff -1px 1px, #ffffff -1px -1px, #ffffff 1px -1px;">Ajouter Etudiant</caption>

      <tr>
        <td><label for="nomet">Nom :</label></td>
        <td><input type="text" name="nomet" required placeholder="ex: hamama" required></td>
      </tr>
      <tr>
        <td><label for="prenomet">Prenom :</label></td>
        <td><input type="text" name="prenomet" placeholder="ex: aimen khalil" required></td>
      </tr>
      <tr>
        <td><label for="useret">User :</label></td>
        <td><input id="idet" type="text" name="useret" placeholder="ex: hamamaaimenkhalil95" required></td>
      </tr>
      <tr>
        <td><label for="passwordet">Password :</label></td>
        <td><input id="pswet" type="password" name="passwordet" placeholder="votre numero d'etudiant" required></td>
      </tr>
      <tr>
        <td><label for="classement">Classement :</label></td>
        <td><input type="number" name="classement" placeholder="ex:1,2,3,4,5,6..." required></td>
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
        <td><label for="email">Email :</label></td>
        <td><input id="emet"type="email" name="emailet" placeholder="ex: khalil.aymen25@gmail.com" required></td>
      </tr>
      <tr>
        <td><label for="telephoneet">Telephone :</label></td>
        <td><input id="telet" type="number" name="telephoneet" placeholder="ex: 0559137334" required></td>
      </tr>
      <tr>
        <td><label for="adresseet">Adresse :</label></td>
        <td><input type="text" name="adresseet" placeholder="ex: uv17 bt A10 390 nvl ville el khroub constantine" required></td>
      </tr>
      <tr>
        <td><label for="nbabs">nb_abscence :</label></td>
        <td><input type="number" name="nbabs" placeholder="ex: 0,1,2,3,4.." required></td>
      </tr>
      <tr>
        <td></td><td align=center><button type="submit" name="send" >Valider</buttom></td>
      </tr>
    </table>
<?if(isset($x) and isset($y,$z,$w)) {echo $x;echo $y,$z,$w;}?>
  </form>
  <div class="form13">
    <img  style="border-radius: 50%;background-color: rgba(79, 84, 91, 0.5);width:380px;height:380px;margin-right:150px;margin-top:50px;"src="http://localhost:2145/Projects/TP/mini-projet/images/students.png" >
  </div>
  <div class="aceuil">
    <button style="margin-right: 30px;"type="button" name="button" onclick="window.location.href='addpage.php'">Acceuil</button>
  </div>

  </div>
</div>


</body>
</html>
