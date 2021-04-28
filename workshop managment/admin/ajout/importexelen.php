<?php

if(isset($_FILES['file']['tmp_name']))
{
if(file_exists($_FILES['file']['tmp_name']))
  {
  $infos=pathinfo($_FILES['file']['name']);
  $ext=$infos['extension'];
  $ext_valide = array('csv');
  if(in_array($ext,$ext_valide)){
  $file= $_FILES['file']['tmp_name'];
  $handle=fopen($file,"r");
  $c=0;
  while (($filesop=fgetcsv($handle,1000,","))!==false) {
    $nom=$filesop[0];
    $prenom=$filesop[1];
    $user=$filesop[2];
    $psw=$filesop[3];
    $grade=$filesop[4];
    $adresse=$filesop[5];
    $email=$filesop[6];
    $tel=$filesop[7];
    $atelier=$filesop[8];
    try{
    $sql=$DB->prepare("insert into enseignant (nom,prenom,user,password,grade,adresse,email,tel,id_atelier)
                    values(:nom,:prenom,:user,:psw,:grade,:adr,:email,:tel,:atelier)");
    $sql->execute(array('nom'=>$nom , 'prenom'=>$prenom , 'user'=>$user , 'psw'=>$psw , 'adr'=>$adresse ,
                  'email'=>$email , 'tel'=>$tel , 'grade'=>$grade , 'atelier'=>$atelier));
     $r= "<span style='margin-left:10px;color:green;font-size:18px;font-weight:bold;'>import reussi</span>";
   }catch(Exception $e){
      //header('location:modetableet.php');
      $r= "<span style='margin-left:10px;color:red;font-size:18px;font-weight:bold;'>import echoue...il se peut q'une donnee exist deja verfier votre donnees sur ce fichier svp</span>";
    }
    $c = $c+1;
  }
}else{$r = "<span style='margin-left:10px;font-size:18px;font-weight:bold;'>selectionner un fichier format exel (.csv) svp</span>";}
}else {
  $r = "<span style='margin-left:10px;font-size:18px;font-weight:bold;'>selectionner un fichier svp</span>";
}
}
else {
  $r = "<span style='margin-left:10px;font-size:18px;font-weight:bold;'>selectionner un fichier svp</span>";
}


?>
