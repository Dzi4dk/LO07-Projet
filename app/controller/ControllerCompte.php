
<!-- ----- debut ControllerCompte -->
<?php
require_once '../model/ModelCompte.php';

class ControllerCompte {

 // --- Liste des vins
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
}
?>
<!-- ----- fin ControllerCompte -->


