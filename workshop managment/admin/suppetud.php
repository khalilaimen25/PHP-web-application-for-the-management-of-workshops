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
}
if(!empty($_POST['suppall']))
{
  $delet=$DB->query("DELETE  from etudiant");
  $ai=$DB->query("alter table etudiant AUTO_INCREMENT=1 ");
}
header('Location:supp.php');
?>
