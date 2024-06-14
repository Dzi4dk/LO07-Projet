
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
   echo ("ControllerResidence : residdenceReadAll : vue = $vue");
  require ($vue);
 } 
}
?>
<!-- ----- fin ControllerResidence -->


