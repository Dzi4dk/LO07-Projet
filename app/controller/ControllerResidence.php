<?php
if(session_status() == PHP_SESSION_NONE){
    // Start Session it is not started yet
    session_start();
}

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
 
 // --- Formulaire pour achat residence
    public static function achatResidence() {
        $results = ModelResidence::getAllUserResidence($_SESSION['user_id']);
        include 'config.php';
        $vue = $root . '/app/view/residence/viewAchatResidence.php';
        require ($vue);
    }
    
    public static function achatEffectue() {
        $nom_residence = ModelResidence::getLabelForResidence(isset($_GET['residence']));
        $prix_residence = ModelResidence::getPrixForResidence(isset($_GET['residence']));
        $id_vendeur = ModelResidence::getIdForResidence(isset($_GET['residence']));
        $results[0] = ModelCompte::transfert($_GET['compte_1_id'], $_GET['compte_2_id'], $_GET['montant']);
        $results[1] = ModelCompte::getAllCompteId($id_vendeur);
        $results[2] = ModelCompte::getAllCompteId($_SESSION['user_id']);
        
        include 'config.php';
        $vue = $root . '/app/view/residence/viewAchatResidence2.php';
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerResidence -->


