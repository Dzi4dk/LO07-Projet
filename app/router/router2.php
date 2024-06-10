
<!-- ----- debut Router2 -->
<?php
require ('../controller/ControllerVin.php');
require ('../controller/ControllerProducteur.php');
require ('../controller/ControllerCave.php');
require ('../controller/ControllerRecolte.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

//Modif routeur pour prendre en compte l'ensemble des parametres
$action = $param['action'];

// --- On supprime l'élément action de la structure
unset($param['action']);

// -- Tout ce qui reste sont des arguments
$args = $param;

// --- Liste des méthodes autorisées
switch ($action) {
    //Vin
 case "vinReadAll" :
 case "vinReadOne" :
 case "vinReadId" :
 case "vinCreate" :
 case "vinCreated" :
 case "vinDeleted" :
     
  ControllerVin::$action($args);
  break;
  
     //Producteur
 case "prodReadAll" :
 case "prodReadOne" :
 case "prodReadId" :
 case "prodCreate" :
 case "prodCreated" :
 case "prodReadAllRegion" :
 case "prodReadAllRegionProd" :
 case "prodDeleted" :

  ControllerProducteur::$action($args);
  break;

     //Recolte
 case "recolteReadAll" :
 case "recolteReadAllinfos" :    
 case "recolteCreate" :  
 case "recolteCreated" :     

  ControllerRecolte::$action($args);
  break;

     //Propostions
 case "mesPropositions" :
     
  ControllerCave::$action($args);
  break;

 // Tache par défaut
 default:
  $action = "caveAccueil";
  ControllerCave::$action($args);
}
?>
<!-- ----- Fin Router2 -->

