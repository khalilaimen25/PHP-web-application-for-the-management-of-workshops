<?php
try{
$DB= new PDO('mysql:host=localhost;dbname=atelier;charset=utf8','root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}catch(Exception $e)
{
die('erreur :'.$e->getMessage());
}

if(isset($_POST['nom'],$_POST['prenom'],$_POST['email'],
         $_POST['password'],$_POST['atelier'],$_POST['grade'],$_POST['telephone'],$_POST['adresse']))
{
$req=$DB->prepare("INSERT INTO demandeen
                  values(:nom,:prenom,:grade,:psw,:email,:atelier,:tel,:addr)");
$req->execute(array('nom'=>$_POST['nom'] , 'prenom'=>$_POST['prenom'] , 'grade'=>$_POST['grade'] ,
                    'email'=>$_POST['email'] , 'psw'=>$_POST['password'] ,
                    'atelier'=>$_POST['atelier'] , 'tel'=>$_POST['telephone'] , 'addr'=>$_POST['adresse']));
}


header("Location:enseignant.php");
 ?>
