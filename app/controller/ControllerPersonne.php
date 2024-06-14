<!-- ----- debut ControllerPersonne -->
<?php
if(session_status() == PHP_SESSION_NONE){
    // Start Session it is not started yet
    session_start();
}
require_once '../model/ModelPersonne.php';

class ControllerPersonne {
 // --- Liste des clients
 public static function personneReadAllClients() {
  $results = ModelPersonne::getAllClients();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/personne/viewAllPersonne.php';
  if (DEBUG)
      echo ("ControllerPersonne : personneReadAllClients : vue = $vue");
  require ($vue);
 }
 
 // --- Liste des administrateurs
 public static function personneReadAllAdmins() {
  $results = ModelPersonne::getAllAdmins();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/personne/viewAllPersonne.php';
  if (DEBUG)
      echo ("ControllerPersonne : personneReadAllAdmins : vue = $vue");
  require ($vue);
 }
 
 // --- Lecture de tous les utilisateurs
 public static function personneShowLogin() {
     $erreur = false;
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/connexion/viewLogin.php';
  if (DEBUG)
      echo ("ControllerPersonne : personneShowLogin : vue = $vue");
  require ($vue);
 }
 
 public static function personneLoginVerify() {
     $prenom = $_GET['prenom'];
     $nom = $_GET['nom'];
     $password = $_GET['password'];
     $results = ModelPersonne::isVerified($prenom, $nom, $password);
     
     if ($results != NULL) {
         
         foreach ($results as $element) {             
            $_SESSION['user_id'] = $element->getId();
            $_SESSION['statut'] = $element->getStatut();             
         }
         
         $_SESSION['prenom'] = $prenom;
         $_SESSION['nom'] = $nom;
         
         
         $justLogged = true;
         
         // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/viewCaveAccueil.php';
        require ($vue);
         
     } else {
         
         $erreur = true;
         
         // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/connexion/viewLogin.php';
        if (DEBUG)
            echo ("ControllerPersonne : personneLoginVerify : vue = $vue");
        require ($vue);
         
     }
     
     
     
 }

}
?>
<!-- ----- fin ControllerPersonne -->


