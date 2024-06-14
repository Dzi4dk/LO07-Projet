
<!-- ----- debut ModelCompte -->
<?php
require_once 'Model.php';

class ModelCompte {
 private $id, $label, $montant, $banque_id, $personne_id, $compte_label, $compte_montant, $personne_nom, $personne_prenom, $banque_label, $banque_pays;
 

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
    public function getCompteLabel() {
        return $this->compte_label;
    }

    public function getCompteMontant() {
        return $this->compte_montant;
    }

    public function getPersonneNom() {
        return $this->personne_nom;
    }

    public function getPersonnePrenom() {
        return $this->personne_prenom;
    }

    public function getBanqueLabel() {
        return $this->banque_label;
    }

    public function getBanquePays() {
        return $this->banque_pays;
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

public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "SELECT compte.label AS compte_label, compte.montant AS compte_montant, 
                             personne.nom AS personne_nom, personne.prenom AS personne_prenom, 
                             banque.label AS banque_label, banque.pays AS banque_pays 
                      FROM compte
                      JOIN personne ON compte.personne_id = personne.id
                      JOIN banque ON compte.banque_id = banque.id";
            $statement = $database->query($query);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCompte");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
}
 ?>
<!-- ----- fin ModelCompte -->
