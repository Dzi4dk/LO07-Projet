
<!-- ----- debut ControllerCompte -->
<?php
if(session_status() == PHP_SESSION_NONE){
    // Start Session it is not started yet
    session_start();
}
require_once '../model/ModelCompte.php';

class ControllerCompte {

 // --- Liste des comptes
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
 
  // --- Liste des comptes d'un utilisateur
 public static function compteReadAllUser() {
  $id = $_SESSION['user_id'];
  $results = ModelCompte::getAllUserId($id);
  $deleted = 0;
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/compte/viewAllCompteUser.php';
  if (DEBUG)
   echo ("ControllerCompte : compteReadAllUser : vue = $vue");
  require ($vue);
 }
 
     // --- Formulaire pour créer un nouveau compte
    public static function compteCreate() {
        $results = ModelBanque::getAll();
        include 'config.php';
        $vue = $root . '/app/view/compte/viewInsertCompte.php';
        require ($vue);
    }

    // --- Ajouter une nouveau compte à la base de données
    public static function compteCreated() {
        $personne_id = $_SESSION['user_id'];
        echo $personne_id . $_GET['label'] . $_GET['banque_id'];
        $results[0] = ModelCompte::insert(htmlspecialchars($_GET['label']), $_GET['banque_id'], $personne_id);
        $results[1] = ModelBanque::getOneId($_GET['banque_id']);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/compte/viewInsertedCompte.php';
        require ($vue);
    }
    
     // --- Formulaire pour transférer un montant entre deux comptes
    public static function compteTransfert() {
        $results = ModelCompte::getAlluserId($_SESSION['user_id']);
        include 'config.php';
        $vue = $root . '/app/view/compte/viewTransfertCompte.php';
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerCompte -->


