<?php
try{
$DB= new PDO('mysql:host=localhost;dbname=atelier;charset=utf8','root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}catch(Exception $e)
{
die('erreur :'.$e->getMessage());
}
$n=$DB->query("select count(*) from demandeet")->fetchColumn();
$l = "demande etudiant (<span>".$n."</span>)";
?>
<style>
  span{
    color: red;
  }
</style>
