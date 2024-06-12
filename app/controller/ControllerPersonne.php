
<!-- ----- debut ControllerPersonne -->
<?php
require_once '../model/ModelPersonne.php';

class ControllerPersonne {

 // --- Liste des clients
 public static function personneReadAllClients() {
  $results = ModelPersonne::getAllClients();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/personne/viewAllClients.php';
  if (DEBUG)
      echo ("ControllerPersonne : personneReadAllClients : vue = $vue");
  require ($vue);
 }


 
}
?>
<!-- ----- fin ControllerPersonne -->


