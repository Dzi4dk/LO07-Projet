
<!-- ----- debut ControllerCompte -->
<?php
if(session_status() == PHP_SESSION_NONE){
    // Start Session it is not started yet
    session_start();
}
require_once '../model/ModelCompte.php';
require_once '../model/ModelResidence.php';

class ControllerPatrimoine {


 
  // --- Liste du patrimoine d'un utilisateur
 public static function patrimoineReadAllUser() {
  $id = $_SESSION['user_id'];
  $results[0] = ModelCompte::getAllUserId($id);
  $results[1] = ModelResidence::getAllUserId($id);
  $deleted = 0;
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/patrimoine/viewAllPatrimoineUser.php';
  if (DEBUG)
   echo ("ControllerPatrimoine : patrimoineReadAllUser : vue = $vue");
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerCompte -->


