
<!-- ----- debut ControllerCompte -->
<?php
if(session_status() == PHP_SESSION_NONE){
    // Start Session it is not started yet
    session_start();
}
require_once '../model/ModelCompte.php';

class ControllerCompte {

 // --- Liste des comptes
 public static function compteReadAll() {
  $results = ModelCompte::getAll();
  $deleted = 0;
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/compte/viewAllCompte.php';
  if (DEBUG)
   echo ("ControllerCompte : compteReadAll : vue = $vue");
  require ($vue);
 }
 
  // --- Liste des comptes d'un utilisateur
 public static function compteReadAllUser() {
  $id = $_SESSION['user_id'];
  $results = ModelCompte::getAllUserId($id);
  $deleted = 0;
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/compte/viewAllCompteUser.php';
  if (DEBUG)
   echo ("ControllerCompte : compteReadAllUser : vue = $vue");
  require ($vue);
 }
}
?>
<!-- ----- fin ControllerCompte -->


