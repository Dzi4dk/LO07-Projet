<!-- ----- debut ControllerPersonne -->
<?php
if(session_status() == PHP_SESSION_NONE){
    // Start Session it is not started yet
    session_start();
}
require_once '../model/ModelPersonne.php';
require_once '../model/ModelParrainage.php';

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
 
 // --- Affichage de la page de login
 public static function personneShowLogin() {
     $erreur = false;
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/connexion/viewLogin.php';
  if (DEBUG)
      echo ("ControllerPersonne : personneShowLogin : vue = $vue");
  require ($vue);
 }
 
 // --- Affichage de la page de register
 public static function personneShowRegister() {
     $erreur = false;
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/connexion/viewRegister.php';
  if (DEBUG)
      echo ("ControllerPersonne : personneShowregister : vue = $vue");
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
         
         
         $_SESSION['justLogged'] = true;
         
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
 public static function personneRegisterIn() {
     $prenom = $_GET['prenom'];
     $nom = $_GET['nom'];
     $password = $_GET['password'];
     $login = $_GET['login'];
     $parrainage = $_GET['parrainage'];
     $results = ModelPersonne::isRegistered($prenom, $nom, $password, $login);
     
     
     if ($results != NULL) {
         
         $_SESSION['user_id'] = $results;
         $_SESSION['statut'] = 1;
         $_SESSION['prenom'] = $prenom;
         $_SESSION['nom'] = $nom;
         
         //On effectue le parrainage
         $infoParrain = ModelParrainage::parrainer($parrainage);
         
         if ($infoParrain){
             foreach ($infoParrain as $element){
                 $_SESSION['prenom_parrain'] = $element->getPrenomParrain();
                 $_SESSION['nom_parrain'] = $element->getNomParrain();
             }
             
         }
         
         
         $_SESSION['justLogged'] = true;
         
         // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/viewCaveAccueil.php';
        require ($vue);
         
     } else {
         
         $erreur = true;
         
         // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/connexion/viewRegister.php';
        if (DEBUG)
            echo ("ControllerPersonne : personneRegisterIn : vue = $vue");
        require ($vue);
         
     }  
     
     
     
 }
 
 public static function personneDisconnect(){
        $_SESSION['user_id'] = NULL;
        $_SESSION['statut'] = 3; //Statut comme déconnecté         
        $_SESSION['prenom'] = NULL;
        $_SESSION['nom'] = NULL;
        
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/viewCaveAccueil.php';
        require ($vue);
         
     }
}
?>
<!-- ----- fin ControllerPersonne -->


