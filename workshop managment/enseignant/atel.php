<?php
try{
$DB= new PDO('mysql:host=localhost;dbname=atelier;charset=utf8','root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}catch(Exception $e)
{
die('erreur :'.$e->getMessage());
}

if(isset($_POST['idat'],$_POST['themeat'],$_POST['salle'],$_POST['dure']))
{
  $id=$_POST['idat'];
  $theme=$_POST['themeat'];
  $salle=$_POST['salle'];
  $dure=$_POST['dure'];

  try{
  $req=$DB->prepare('INSERT INTO atelier VALUES(UPPER(:id),:theme,:salle,:dure)');
  $req->execute(array('id'=>$id , 'theme'=>$theme , 'salle'=>$salle , 'dure'=>$dure));
  $x= "atelier ajouter avec succes ";
}catch(Exception $e)
{
  $x="ajout echoue vous aver une erreur "  ;
}
}
//////////////////////////////////////////////////////////////////////////////////
if(isset($_POST['id']))
{
  $id=$_POST['id'];
  if(!empty($_POST['theme']))
  {
    $res=$DB->prepare("UPDATE atelier set theme=:theme where id_atelier=:id");
    $res->execute(array('theme'=>$_POST['theme'] , 'id'=>$id));
  }
  if(!empty($_POST['sal']))
  {
    $res=$DB->prepare("UPDATE atelier set salle=:salle where id_atelier=:id");
    $res->execute(array('salle'=>$_POST['sal'] , 'id'=>$id));
  }
  if(!empty($_POST['du']))
  {
    $res=$DB->prepare("UPDATE atelier set duree=:dure where id_atelier=:id");
    $res->execute(array('dure'=>$_POST['du'] , 'id'=>$id));
  }
  if(!empty($_POST['supp']))
  {
    //echo "<script>";
    //echo "function supp(){";
    //echo "if(confirm(vouler vous supprimer latelier ".$id."))";
    $res=$DB->query("DELETE FROM atelier  where id_atelier='".$id."'");
    //echo "}</script>";
  }
  $y="atelier modifier avec succes";

}



?>
