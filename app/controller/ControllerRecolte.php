
<!-- ----- debut ControllerRecolte -->
<?php
require_once '../model/ModelRecolte.php';

class ControllerRecolte {
 // --- page d'acceuil
 public static function caveAccueil() {
  include 'config.php';
  $vue = $root . '/app/view/viewCaveAccueil.php';
  if (DEBUG)
   echo ("ControllerProducteur : caveAccueil : vue = $vue");
  require ($vue);
 }

 // --- Liste des récoltes
 public static function recolteReadAll() {
  $results = ModelRecolte::getAll();
  $deleted = 0;
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/recolte/viewAllRecolte.php';
  if (DEBUG)
   echo ("ControllerRecolte : recolteReadAll : vue = $vue");
  require ($vue);
 }

 // --- Liste des récoltes avec infos vins + producteurs
 public static function recolteReadAllinfos() {
  $results = ModelRecolte::getAllinfos();
  $deleted = 0;
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/recolte/viewAllRecolteInfos.php';
  if (DEBUG)
   echo ("ControllerRecolte : recolteReadAllinfos : vue = $vue");
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

 // Affiche le formulaire de creation d'une recolte
 public static function recolteCreate() {
     
  $results = ModelRecolte::getAllProducteurVin();
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/recolte/viewInsertRecolte.php';
  require ($vue);
 }

 // Affiche un formulaire pour récupérer les informations d'un nouveau producteur.
 // La clé est gérée par le systeme et pas par l'internaute
 public static function recolteCreated() {
  // ajouter une validation des informations du formulaire
     $vin = $_GET['vin'];
     
     $producteur = $_GET['producteur'];
     
     $quantite = $_GET['quantite'];
  $results = ModelRecolte::insert($vin, $producteur, $quantite);
  
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/recolte/viewInsertedRecolte.php';
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
<!-- ----- fin ControllerRecolte -->


