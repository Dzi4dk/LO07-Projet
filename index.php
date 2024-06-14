<?php
session_start();
$_SESSION['user_id'] = NULL;
$_SESSION['statut'] = 3; //Statut comme déconnecté         
$_SESSION['prenom'] = NULL;
$_SESSION['nom'] = NULL;
header('Location: app/router/router2.php?action=truc');

?>

