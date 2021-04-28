<?
session_start();
session_unset();
session_destroy();
header('Location: enseignant.php');
exit;
?>
