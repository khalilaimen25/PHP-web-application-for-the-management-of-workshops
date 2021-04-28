<?php
session_start();


try{
$DB= new PDO('mysql:host=localhost;dbname=atelier;charset=utf8','root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}catch(Exception $e)
{
die('erreur :'.$e->getMessage());
}
$res=$DB->query('SELECT * FROM enseignant');

?>
<html>
<head>
  <link rel="stylesheet" href="http://localhost:2145/Projects/TP/mini-projet/index.css">
  <style>
    button{
      width:25px;height: 25px;
      border-radius: 100%;color: white;font-weight: bold;text-align: center;
      background-color: red;
    }
    table{

      background-color: rgba(190,190,190,0.5);
      font-size: 18px;

    }
    .del{
      border-bottom:none;border-top: none;
      background:hidden;
      height: 30px;
    }
    .tab{
      height:85%;
      margin-top: 20px;
      margin-bottom: 10px;
      overflow: scroll;
    }
    .retour{
      height:35px;
      width:130px;
      margin-top:5px;
      margin-left: 45%;
      background: -moz-linear-gradient(top, #68b12f, #50911e);
      background: linear-gradient(top, #68b12f, #50911e);
        border: 1px solid #509111;
        border-bottom: 1px solid #5b992b;
        border-radius: 3px;
    }
    p{
      color: red;text-align: center;font-size: 20px;
    }
  </style>
</head>
<body class="noprint">
  <header>
      <h1>Universite Constantine 2</h1>
      <h2>Gestionaire d'atelier 3emeLI</h2><br>
  </header>

  <div id="body1" >

<div class="tab">
<p>Suppresion enseignant</p>
<center>
  <form method="post" action="suppen.php" onsubmit="return confirm('Are you sure you want to delete? ')">
<table  border=2 width=60% cellspacing=0 >
<tr align=center>
  <th class="del"></th><th>id</th><th>nom</th><th>prenom</th>
  <!--<td>user</td><td>password</td><td>adresse</td>-->
  <th>email</th><th>telef</th><th>grade</th><th>id_atelier</th>
</tr>

<?php  while($data=$res->fetch())
{
?>

<tr align=center>

<td class="del"><button  type="submit" name="id" value=<?php echo htmlspecialchars($data['id']); ?>>X</button></td>
<td style="width:30px;"><? echo $data['id']; ?></td>
<td><? echo $data['nom']; ?></td>
<td><? echo $data['prenom']; ?></td>
<td><? echo $data['email']; ?></td>
<td><? echo $data['tel']; ?></td>
<td><? echo $data['grade']; ?></td>
<td><? echo $data['id_atelier']; ?></td>
</tr>
<?
}

$res->closeCursor();
?>
</table>
<input type="submit" name="suppall" value="Delete All">
</form>
</center>

</div>
<button class="retour" type="button" onclick="window.location.href='addpage.php'">retour</button>
</div>

</body>
</html>
