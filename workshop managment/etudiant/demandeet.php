<?php
try{
$DB= new PDO('mysql:host=localhost;dbname=atelier;charset=utf8','root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}catch(Exception $e)
{
die('erreur :'.$e->getMessage());
}

if(isset($_POST['nom'],$_POST['prenom'],$_POST['groupe'],$_POST['email'],
         $_POST['password'],$_POST['atelier'],$_POST['classement'],$_POST['telephone'],$_POST['adresse']))
{
$req=$DB->prepare("INSERT INTO demandeet
                  values(:nom,:prenom,:groupe,:psw,:clsmt,:email,:atelier,:tel,:addr)");
$req->execute(array('nom'=>$_POST['nom'] , 'prenom'=>$_POST['prenom'] , 'groupe'=>$_POST['groupe'] ,
                    'email'=>$_POST['email'] , 'psw'=>$_POST['password'] , 'clsmt'=>$_POST['classement'] ,
                    'atelier'=>$_POST['atelier'] , 'tel'=>$_POST['telephone'] , 'addr'=>$_POST['adresse']));
}


header("Location:etudiant.php");
 ?>
