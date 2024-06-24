
<!-- ----- debut ControllerResidence -->
<?php
require_once '../model/ModelResidence.php';

class ControllerResidence {

 // --- Liste des vins
 public static function residenceReadAll() {
  $results = ModelResidence::getAll();
  $deleted = 0;
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/residence/viewAllResidence.php';
  if (DEBUG)
   echo ("ControllerResidence : residenceReadAll : vue = $vue");
  require ($vue);
 }

  // --- Liste des résidences d'un utilisateur
 public static function residenceReadAllUser() {
  $id = $_SESSION['user_id'];
  $results = ModelResidence::getAllUserId($id);
  $deleted = 0;
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/residence/viewAllResidenceUser.php';
  if (DEBUG)
   echo ("ControllerResidence : residenceReadAllUser : vue = $vue");
  require ($vue);
 } 
}
?>
<!-- ----- fin ControllerResidence -->


