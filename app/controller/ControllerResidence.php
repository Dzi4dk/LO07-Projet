<?php
if(session_status() == PHP_SESSION_NONE){
    // Start Session it is not started yet
    session_start();
}

require_once '../model/ModelResidence.php';
require_once '../model/ModelCompte.php';

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
        $results = ModelResidence::getAllNotUserResidence($_SESSION['user_id']);
        include 'config.php';
        $vue = $root . '/app/view/residence/viewAchatResidence.php';
        require ($vue);
    }
    
    public static function achatEffectue() {
    $residenceId = $_GET['residence'];
    $nom_residence = ModelResidence::getLabelForResidence($residenceId);
    $prix_residence = ModelResidence::getPrixForResidence($residenceId);
    $id_vendeur = ModelResidence::getIdForResidence($residenceId);

    if (isset($_GET['compte_1_id'], $_GET['compte_2_id'], $_GET['montant'])) {
        $transfert = ModelCompte::transfert($_GET['compte_1_id'], $_GET['compte_2_id'], $_GET['montant']);
        if ($transfert === 0) {
            $results[1] = ModelCompte::getAllCompteIdPersonne($id_vendeur);
            $results[2] = ModelCompte::getAllCompteIdPersonne($_SESSION['user_id']);
            ModelResidence::updateProprietaire($residenceId, $_SESSION['user_id']);
            Model::commit();
        }
    } else {
        echo "Erreur : les paramètres nécessaires ne sont pas définis.";
    }

    

    include 'config.php';
    $vue = $root . '/app/view/residence/viewAchatResidence2.php';
    require ($vue);
}
}
?>
<!-- ----- fin ControllerResidence -->


