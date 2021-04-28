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
    $adresse=$filesop[4];
    $email=$filesop[5];
    $tel=$filesop[6];
    $clsmt=$filesop[7];
    $atelier=$filesop[8];
    try{
    $sql=$DB->prepare("insert into etudiant (nom,prenom,user,password,adresse,email,tel,classement,id_atelier,nb_abs)
                    values(:nom,:prenom,:user,:psw,:adr,:email,:tel,:clsmt,:atelier,0)");
    $sql->execute(array('nom'=>$nom , 'prenom'=>$prenom , 'user'=>$user , 'psw'=>$psw , 'adr'=>$adresse ,
                  'email'=>$email , 'tel'=>$tel , 'clsmt'=>$clsmt , 'atelier'=>$atelier));
     $r= "<span style='margin-left:10px;color:green;font-size:18px;font-weight:bold;'>import reussi</span>";
   }catch(Exception $e){
      //header('location:modetableet.php');
      $r= "<span style='margin-left:10px;color:red;font-size:18px;font-weight:bold;'>import echoue...il se peut q'une donnee exist deja verfier votre donnees sur ce fichier svp</span>";
    }
    $c = $c+1;
  }
}else{$r = "<spanstyle='margin-left:10px;font-size:18px;font-weight:bold;'>selectionner un fichier format exel (.csv) svp</span>";}
}else {
  $r = "<span style='margin-left:10px;font-size:18px;font-weight:bold;'>selectionner un fichier svp</span>";
}
}
else {
  $r = "<span style='margin-left:10px;font-size:18px;font-weight:bold;'>selectionner un fichier svp</span>";
}


?>
