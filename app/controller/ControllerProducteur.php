
<!-- ----- debut ControllerProducteur -->
<?php
require_once '../model/ModelProducteur.php';

class ControllerProducteur {
 // --- page d'acceuil
 public static function caveAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewCaveAccueil.php';
  if (DEBUG)
   echo ("ControllerProducteur : caveAccueil : vue = $vue");
  require ($vue);
 }

 // --- Liste des vins
 public static function prodReadAll() {
  $results = ModelProducteur::getAll();
  $deleted = 0;
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/prod/viewAllProd.php';
  if (DEBUG)
   echo ("ControllerProducteur : prodReadAll : vue = $vue");
  require ($vue);
 }

 // Affiche un formulaire pour sélectionner un id qui existe
 public static function prodReadId($args) {
  $results = ModelProducteur::getAllId();

  $target = $args['target'];
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/prod/viewIdProd.php';
  require ($vue);
 }

 // Affiche un producteur particulier (nom)
 public static function prodReadOne() {
  $prod_id = $_GET['id'];
  $results = ModelProducteur::getOne($prod_id);
  $deleted = 0;
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/prod/viewAllProd.php';
  require ($vue);
 }

 // Affiche le formulaire de creation d'un vin
 public static function prodCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/prod/viewInsertProd.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau producteur.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function prodCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelProducteur::insert(
      htmlspecialchars($_GET['nom']), htmlspecialchars($_GET['prenom']), htmlspecialchars($_GET['region'])
  );
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/prod/viewInsertedProd.php';
  require ($vue);
 }
 
  // --- Liste des vins
 public static function prodReadAllRegion() {
  $results = ModelProducteur::getAllRegion();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/prod/viewAllProdRegion.php';
  if (DEBUG)
   echo ("ControllerProducteur : prodReadAllRegion : vue = $vue");
  require ($vue);
 }
 
 public static function prodReadAllRegionProd() {
  $results = ModelProducteur::getAllRegionProd();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/prod/viewAllProdRegionProd.php';
  if (DEBUG)
   echo ("ControllerProducteur : prodReadAllRegionProd : vue = $vue");
  require ($vue);
 }
 
 // Supprime et affiche un vin particulier (id)
 public static function prodDeleted() {
  $prod_id = $_GET['id'];
  $results = ModelProducteur::getOne($prod_id);
  $deleted = ModelProducteur::delete($prod_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/prod/viewAllProd.php';
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerProducteur -->


