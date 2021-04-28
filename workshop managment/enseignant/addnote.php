<?

if(isset($_POST['id']) AND !empty($_POST['not']))
{
$x= "hhhh";
$add=$DB->prepare("INSERT into evaluation VALUES(:id,:note,NOW())");
$add->execute(array('id'=>$_POST['id'] , 'note'=>$_POST['not']));
header('Location:note.php');
}


if(!empty($_POST['idet']) and !empty($_POST['date']) and !empty($_POST['newnote']))
{
$edit=$DB->prepare("UPDATE evaluation set note=:new where id_et= :id and date_note= :dat " );
$edit->execute(array('id'=>$_POST['idet'] , 'dat'=>$_POST['date'] , 'new'=>$_POST['newnote']));

header('Location:note.php');
}
else{
  if(isset($_POST['suppnote']))
  {
  $edit=$DB->prepare("DELETE from evaluation where id_et=:id AND date_note=:d   ");
  $edit->execute(array('id'=>$_POST['idet'] , 'd'=>$_POST['date']) );
  header('Location:note.php');
  }

}


?>
