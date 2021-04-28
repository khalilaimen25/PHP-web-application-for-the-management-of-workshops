<?php
try{
$bdd= new PDO('mysql:host=localhost;dbname=atelier;charset=utf8','root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}catch(Exception $e)
{
die('erreur :'.$e->getMessage());
}

//ajoute etudiant
if(!empty($_POST['nomet']) and !empty($_POST['prenomet']) and !empty($_POST['useret'])
 and !empty($_POST['passwordet']) and !empty($_POST['adresseet']) and !empty($_POST['atelier'])
 and !empty($_POST['emailet']) and !empty($_POST['telephoneet']) and !empty($_POST['classement']))
{try{
$req=$bdd->prepare('INSERT  INTO etudiant (nom,prenom,user,password,adresse,email,tel,classement,id_atelier,nb_abs)
  VALUES(:nom,:prenom,:user,:password,:adresse,:email,:tel,:clsm,:atelier,:nbabs)');

$req->execute(array('nom'=>$_POST['nomet'],'prenom'=>$_POST['prenomet'],'user'=>$_POST['useret'],'password'=>$_POST['passwordet'],
'atelier'=>$_POST['atelier'],'adresse'=>$_POST['adresseet'],'email'=>$_POST['emailet'],'tel'=>$_POST['telephoneet'],'clsm'=>$_POST['classement'],'nbabs'=>$_POST['nbabs']));
header('Location:finalpage.html');
  }catch(Exception $e)
  {
    $n=$bdd->query("select count(*) from etudiant")->fetchColumn();
    $x=$n+1;
    $ai=$bdd->query("alter table etudiant AUTO_INCREMENT=$x ");
    $x="<p class='alert'>Ajout echoue il se peut que votre username,password,email ou telephone exist deja
    entrez a nouveau stp</p>";
    $y= "<script>document.getElementById('idet').style.boxShadow = '0px 0px 2px 1px  red'; </script>";
    $z= "<script>document.getElementById('pswet').style.boxShadow = '0px 0px 2px 1px  red'; </script>";
    $w= "<script>document.getElementById('emet').style.boxShadow = '0px 0px 2px 1px  red'; </script>";
    //$k= "<script>document.getElementById('telet').style.boxShadow = '0px 0px 2px 1px  red'; </script>";
  }
}



//ajoute prof
if(!empty($_POST['nomen']) and !empty($_POST['prenomen']) and !empty($_POST['useren']) and !empty($_POST['passworden']) and !empty($_POST['adresseen'])
 and !empty($_POST['emailen']) and !empty($_POST['emailen']) and !empty($_POST['telephoneen']) and !empty($_POST['grade']))
{try{
$req1=$bdd->prepare('INSERT INTO enseignant (id,nom,prenom,user,password,grade,adresse,email,tel,id_atelier)
  VALUES(default,:nom,:prenom,:user,:password,:grade,:adresse,:email,:tel,:atelier)');
$req1->execute(array('nom'=>$_POST['nomen'],'prenom'=>$_POST['prenomen'],'user'=>$_POST['useren'],'password'=>$_POST['passworden'],
'atelier'=>$_POST['atelier'],'grade'=>$_POST['grade'],'adresse'=>$_POST['adresseen'],'email'=>$_POST['emailen'],'tel'=>$_POST['telephoneen']));
header('Location:finalpage.html');
}catch(Exception $e)
{
  $n=$bdd->query("select count(*) from enseignant")->fetchColumn();
  $x=$n+1;
  $ai=$bdd->query("alter table enseignant AUTO_INCREMENT=$x ");
  $x="<p class='alert'>Ajout echoue il se peut que votre username,password,email ou telephone exist deja
  entrez a nouveau stp</p>";
  $y= "<script>document.getElementById('idet').style.boxShadow = '0px 0px 2px 1px  red'; </script>";
  $z= "<script>document.getElementById('pswet').style.boxShadow = '0px 0px 2px 1px  red'; </script>";
  $w= "<script>document.getElementById('emet').style.boxShadow = '0px 0px 2px 1px  red'; </script>";
}
}


?>
