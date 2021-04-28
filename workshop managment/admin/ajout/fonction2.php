
<?php


//include('ajoutetsupp.php');
try{
$DB= new PDO('mysql:host=localhost;dbname=atelier;charset=utf8','root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}catch(Exception $e)
{
die('erreur :'.$e->getMessage());
}

if(!empty($_POST['id']))
{
$x=$_POST['id']. "</br>";
$delet=$DB->query("DELETE  from enseignant where id='".$x."'");
$m=$DB->query("select count(*) from enseignant")->fetchColumn();
$y=$m+1;
$ai=$DB->query("alter table enseignant AUTO_INCREMENT=$y");
header('Location:modetableen.php');
}
////////////////////////////////////////////////////////


if(!empty($_POST['nomen']) and !empty($_POST['prenomen']) and !empty($_POST['useren'])
 and !empty($_POST['passworden']) and !empty($_POST['adresseen']) and !empty($_POST['atelier'])
 and !empty($_POST['emailen']) and !empty($_POST['telephoneen']) and !empty($_POST['grade']))
{try{
  $req=$DB->prepare('INSERT INTO enseignant (id,nom,prenom,user,password,grade,adresse,email,tel,id_atelier)
  VALUES(default,:nom,:prenom,:user,:password,:grade,:adresse,:email,:tel,:atelier)');
$req->execute(array('nom'=>$_POST['nomen'],'prenom'=>$_POST['prenomen'],'user'=>$_POST['useren'],'password'=>$_POST['passworden'],
'atelier'=>$_POST['atelier'],'adresse'=>$_POST['adresseen'],
'email'=>$_POST['emailen'],'tel'=>$_POST['telephoneen'],'grade'=>$_POST['grade']));
header('Location:modetableen.php');
}catch(Exception $e)
{
  $n=$bdd->query("select count(*) from enseignant")->fetchColumn();
  $x=$n+1;
  $ai=$bdd->query("alter table enseignant AUTO_INCREMENT=$x ");
  $x="<p class='alert' style='color:red;font-size:20px;'>Ajout echoue il se peut que votre username,password,email ou telephone exist deja
  entrez a nouveau stp</p>";
  $y= "<script>document.getElementById('idet').style.boxShadow = '0px 0px 2px 1px  red'; </script>";
  $z= "<script>document.getElementById('pswet').style.boxShadow = '0px 0px 2px 1px  red'; </script>";
  $w= "<script>document.getElementById('emet').style.boxShadow = '0px 0px 2px 1px  red'; </script>";
}
}


?>
