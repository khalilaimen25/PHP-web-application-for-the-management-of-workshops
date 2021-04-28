<?include ('atel.php') ;
$atelier=$DB->query('select * from atelier');
?>
<!DOCTYPE HTML>
<html>
	<head><title>Ajouter atelier</title>
  <link rel="stylesheet" href="http://localhost:2145/Projects/TP/mini-projet/index.css">
  <link rel="stylesheet" href="http://localhost:2145/Projects/TP/mini-projet/admin/addboth.css">
	</head>

	<body>
<header>
		<h1>Universite Constantine 2</h1>
		<h2>Gestionaire d'atelier 3emeLI</h2><br>
</header>

<div id="body1">

  <form method="post" action=""  class="form2" >
  <table style="width:470px;">
    <caption style="text-align:center;font-size:40px;text-shadow: #ffffff 1px 1px, #ffffff -1px 1px, #ffffff -1px -1px, #ffffff 1px -1px;">Ajouter Atelier</caption>
    <tr>
      <td><label for="idat">Atelier :</label></td>
      <td><input type="text" name="idat"  maxlength="5" placeholder="ex: DAW,DAM,..." required></td>
    </tr>
    <tr>
      <td><label for="themeat">Theme :</label></td>
      <td><input type="text" name="themeat"  placeholder="entrer theme" required></td>
    </tr>
    <tr>
      <td><label for="salle">Salle :</label></td>
      <td><input type="number" name="salle"  min=1 max=40 placeholder="ex : 1,2,3,..." required></td>
    </tr>
    <tr>
      <td><label for="dure">Dure :</label></td>
      <td><input type="number" name="dure"  min=5 max=80 placeholder="ex : 1h,2h,3h..." required></td>
    </tr>
    <tr>
      <td></td><td align=center><button class="ac" type="button" name="button" onclick="window.location.href='pageens.php'">Acceuil</button><button style="margin-right: 30px;"type="submit" name="send" >Valider</buttom></td>
    </tr>
  </table>
	<?if (isset($x))
	{echo "<p class='at'>$x</p>";}?>
</form>
<style >
.ac{
	background: -moz-linear-gradient(top, #f4efef, #9e9c9c);
	border: 3px solid #4f4f4f;
	color:black;margin-right: 30px;
}
</style>

<form method="post" action=""  class="form2" style="float:right;margin-right:20px;">
<table style="width:470px;">
  <caption style="text-align:center;font-size:40px;text-shadow: #ffffff 1px 1px, #ffffff -1px 1px, #ffffff -1px -1px, #ffffff 1px -1px;">Modifier Atelier</caption>
  <tr>
    <td><label for="id">Atelier :</label></td>
    <td><select class="" name="id">
      <?while ($data=$atelier->fetch()) {
        echo "<option value=".$data['id_atelier'].">".$data['id_atelier']."</option>";
      }?>
    </select></td>
  </tr>
  <tr>
    <td><label for="theme">Theme :</label></td>
    <td><input type="text" name="theme"  placeholder="entrer theme"></td>
  </tr>
  <tr>
    <td><label for="sal">Salle :</label></td>
    <td><input type="number" name="sal"  min=1 max=40 placeholder="entrer theme"></td>
  </tr>
	<tr>
		<td><label for="du">Dure :</label></td>
		<td><input type="number" name="du"  min=5 max=80 placeholder="ex : 1h,2h,3h..." ></td>
	</tr>
	<tr>
		<td><label for="supp">Supprimer :</label></td>
		<td><input type="checkbox" name="supp" value="supp"></td>
	</tr>
  <tr>
    <td><?if (isset($y))
		{echo "<p class='at'>$y</p>";}?></td><td align=center><button style="margin-right:30px;"type="submit" name="send" >Valider</buttom></td>
  </tr>
</table>

</form>

<img  style="border-radius: 50%;background-color: rgba(79, 84, 91, 0.5);width:300px;height:300px;margin-left:400px;margin-top:5px;"src="http://localhost:2145/Projects/TP/mini-projet/images/atelier.png" >


</div>

	</body>
</html>
