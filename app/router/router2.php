<!-- ----- debut Router2 -->
<?php
require ('../controller/ControllerCave.php');
require ('../controller/ControllerBanque.php');
require ('../controller/ControllerPersonne.php');
require ('../controller/ControllerCompte.php');
require ('../controller/ControllerResidence.php');
require ('../controller/ControllerEmail.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

// Modif routeur pour prendre en compte l'ensemble des parametres
$action = $param['action'];

// --- On supprime l'élément action de la structure
unset($param['action']);

// -- Tout ce qui reste sont des arguments
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
    // Banque
 case "banqueReadAll":
 case "banqueReadOne":
 case "banqueReadName":
 case "banqueCreate":
 case "banqueCreated":
 case "banqueUpdate":
 case "banqueUpdated":
 case "banqueDelete":
     ControllerBanque::$action($args);
     break;

     //Personne
 case "personneReadAllClients" :
 case "personneReadAllAdmins" :  
 case "personneShowLogin" :
 case "personneLoginVerify" :
 case "personneDisconnect" :
 case "personneShowRegister" :
 case "personneRegisterIn" :

  ControllerPersonne::$action($args);
  break;

     //Compte
 case "compteReadAll" : 
 case "compteReadAllUser" :
 case "compteCreate" :
 case "compteCreated" :    
 case "compteTransfert" :
 case "compteTransfered" :

  ControllerCompte::$action($args);
  break;

     //Residence
 case "residenceReadAll" : 
 case "residenceReadAllUser" :
 case "achatResidence"  :
 case "achatEffectue"  :

  ControllerResidence::$action($args);
  break;
    

    // Tache par défaut
 default:
     $action = "caveAccueil";
     ControllerCave::$action($args);
}
?>
<!-- ----- Fin Router2 -->
