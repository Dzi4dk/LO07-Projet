
<!-- ----- debut ModelCompte -->
<?php
require_once 'Model.php';

class ModelCompte {
 private $id, $label, $montant, $banque_id, $personne_id;
 

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $label = NULL, $montant = NULL, $banque_id = NULL, $personne_id = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->label = $label;
   $this->montant = $montant;
   $this->banque_id = $banque_id;
   $this->personne_id = $personne_id;
  }
 }
 
 
//Setters
 
 function setLabel($label) {
  $this->label = $label;
 }

 function setMontant($montant) {
  $this->montant = $montant;
 }
 
 function setBanqueId($banque_id) {
  $this->banque_id = $banque_id;
 }

 function setPersonneId($personne_id) {
  $this->personne_id = $personne_id;
 }
 
 function setId($id) {
  $this->id = $id;
 }

//getters

  function getId() {
  return $this->id;
 }
 
 function getMontant() {
  return $this->montant;
 }

 function getLabel() {
  return $this->label;
 }

  function getBanqueId() {
  return $this->banque_id;
 }
 
 function getPersonneId() {
  return $this->personne_id;
 }

 //Function
 
 public static function getByBanqueId($banqueId) {
    try {
        $database = Model::getInstance();
        $query = "SELECT compte.*, personne.prenom, personne.nom 
                  FROM compte 
                  JOIN personne ON compte.personne_id = personne.id 
                  WHERE compte.banque_id = :banqueId";
        $statement = $database->prepare($query);
        $statement->execute(['banqueId' => $banqueId]);
        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $results;
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
}
}
 ?>
<!-- ----- fin ModelCompte -->
