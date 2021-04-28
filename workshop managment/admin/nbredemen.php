<?php
try{
$DB= new PDO('mysql:host=localhost;dbname=atelier;charset=utf8','root','',
array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

}catch(Exception $e)
{
die('erreur :'.$e->getMessage());
}
$m=$DB->query("select count(*) from demandeen")->fetchColumn();
$k = "demande enseignant (<span>".$m."</span>)";
?>
<style>
  span{
    color: red;
  }
</style>
