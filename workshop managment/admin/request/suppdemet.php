<?php
try{
$DB= new PDO('mysql:host=localhost;dbname=atelier;charset=utf8','root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}catch(Exception $e)
{
die('erreur :'.$e->getMessage());
}
if(isset($_POST['nom'] , $_POST['tel'] , $_POST['psw']))
{
$supp = $DB->prepare("DELETE  FROM demandeet where nom =:nom and tel=:tel and password=:psw");
$supp->execute(array('nom'=>$_POST['nom'] , 'tel'=>$_POST['tel'] , 'psw'=>$_POST['psw']));
}
else {
  echo "error";
}

header("Location:requestet.php");
?>
