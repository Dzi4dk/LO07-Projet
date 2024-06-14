<!-- ----- debut Router2 -->
<?php
require ('../controller/ControllerVin.php');
require ('../controller/ControllerProducteur.php');
require ('../controller/ControllerCave.php');
require ('../controller/ControllerRecolte.php');
require ('../controller/ControllerBanque.php');
require ('../controller/ControllerPersonne.php');
require ('../controller/ControllerCompte.php');
require ('../controller/ControllerResidence.php');

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
    // Vin
 case "vinReadAll":
 case "vinReadOne":
 case "vinReadId":
 case "vinCreate":
 case "vinCreated":
 case "vinDeleted":
     ControllerVin::$action($args);
     break;

    // Producteur
 case "prodReadAll":
 case "prodReadOne":
 case "prodReadId":
 case "prodCreate":
 case "prodCreated":
 case "prodReadAllRegion":
 case "prodReadAllRegionProd":
 case "prodDeleted":
     ControllerProducteur::$action($args);
     break;

    // Recolte
 case "recolteReadAll":
 case "recolteReadAllinfos":
 case "recolteCreate":
 case "recolteCreated":
     ControllerRecolte::$action($args);
     break;

    // Propositions
 case "mesPropositions":
     ControllerCave::$action($args);
     break;

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

  ControllerPersonne::$action($args);
  break;

     //Compte
 case "compteReadAll" : 

  ControllerCompte::$action($args);
  break;

     //Residence
 case "residenceReadAll" : 

  ControllerResidence::$action($args);
  break;

    // Tache par défaut
 default:
     $action = "caveAccueil";
     ControllerCave::$action($args);
}
?>
<!-- ----- Fin Router2 -->
