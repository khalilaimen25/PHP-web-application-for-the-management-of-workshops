<?
session_start();
session_unset();
session_destroy();
header('Location: etudiant.php');
exit;
?>
