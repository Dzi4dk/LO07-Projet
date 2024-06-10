
<!-- ----- debut ControllerVin -->
<?php
require_once '../model/ModelVin.php';

class ControllerVin {
 // --- page d'acceuil
 public static function caveAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewCaveAccueil.php';
  if (DEBUG)
   echo ("ControllerVin : caveAccueil : vue = $vue");
  require ($vue);
 }

 // --- Liste des vins
 public static function vinReadAll() {
  $results = ModelVin::getAll();
  $deleted = 0;
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vin/viewAll.php';
  if (DEBUG)
   echo ("ControllerVin : vinReadAll : vue = $vue");
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un id qui existe
 public static function vinReadId($args) {     
  //if (DEBUG) echo ("ControllerVin:vinReadIdbegin</br>");   
  $results = ModelVin::getAllId();

 
  $target = $args['target'];
  //if (DEBUG) echo ("ControllerVin:vinReadId : target = $target</br>");
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vin/viewId.php';
  require ($vue);
 }

 // Affiche un vin particulier (id)
 public static function vinReadOne() {
  $vin_id = $_GET['id'];
  $results = ModelVin::getOne($vin_id);
  $deleted = 0;

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vin/viewAll.php';
  require ($vue);
 }
 
  // Supprime et affiche un vin particulier (id)
 public static function vinDeleted() {
  $vin_id = $_GET['id'];
  $results = ModelVin::getOne($vin_id);
  $deleted = ModelVin::delete($vin_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vin/viewAll.php';
  require ($vue);
 }


 // Affiche le formulaire de creation d'un vin
 public static function vinCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vin/viewInsert.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau vin.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function vinCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelVin::insert(
      htmlspecialchars($_GET['cru']), htmlspecialchars($_GET['annee']), htmlspecialchars($_GET['degre']), htmlspecialchars($_GET['bio'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/vin/viewInserted.php';
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerVin -->


