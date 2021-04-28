<?php

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
$delet=$DB->query("DELETE  from etudiant where id='".$x."'");
$m=$DB->query("select count(*) from etudiant")->fetchColumn();
$y=$m+1;
$ai=$DB->query("alter table etudiant AUTO_INCREMENT=$y");
header('Location:modetableet.php');
}
////////////////////////////////////////////////////////


if(!empty($_POST['nomet']) and !empty($_POST['prenomet']) and !empty($_POST['useret'])
 and !empty($_POST['passwordet']) and !empty($_POST['adresseet']) and !empty($_POST['atelier'])
 and !empty($_POST['emailet']) and !empty($_POST['telephoneet']) and !empty($_POST['classement']) and !empty($_POST['nbabs']))
{try{
  $req=$DB->prepare('INSERT INTO etudiant (id,nom,prenom,user,password,adresse,email,tel,classement,id_atelier,nb_abs)
  VALUES(default,:nom,:prenom,:user,:password,:adresse,:email,:tel,:clsm,:atelier,:nbabs)');
$req->execute(array('nom'=>$_POST['nomet'],'prenom'=>$_POST['prenomet'],'user'=>$_POST['useret'],'password'=>$_POST['passwordet'],
'atelier'=>$_POST['atelier'],'adresse'=>$_POST['adresseet'],
'email'=>$_POST['emailet'],'tel'=>$_POST['telephoneet'],'clsm'=>$_POST['classement'],'nbabs'=>$_POST['nbabs']));
header('Location:modetableet.php');
}catch(Exception $e)
{
  $n=$DB->query("select count(*) from etudiant")->fetchColumn();
  $x=$n+1;
  $ai=$DB->query("alter table etudiant AUTO_INCREMENT=$x");
  $x="<p class='alert' style='color:red;font-size:20px;'>Ajout echoue il se peut que votre username,password,email ou telephone exist deja
  entrez a nouveau stp</p>";
  $y= "<script>document.getElementById('idet').style.boxShadow = '0px 0px 2px 1px  red'; </script>";
  $z= "<script>document.getElementById('pswet').style.boxShadow = '0px 0px 2px 1px  red'; </script>";
  $w= "<script>document.getElementById('emet').style.boxShadow = '0px 0px 2px 1px  red'; </script>";
}
}



?>
