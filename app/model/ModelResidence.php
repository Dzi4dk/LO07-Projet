
<!-- ----- debut ModelResidence -->

<?php
require_once 'Model.php';

class ModelResidence {
 private $id, $label, $ville, $prix, $personne_id, $residence_id, $residence_label, $nom, $prenom;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $label = NULL, $prix = NULL, $ville = NULL, $personne_id = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->label = $label;
   $this->prix = $prix;
   $this->ville = $ville;
   $this->personne_id = $personne_id;
  }
 }
 
 
public function getId() {
        return $this->id;
    }

    public function getLabel() {
        return $this->label;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getPersonneId() {
        return $this->personne_id;
    }
    public function getResidenceId() {
        return $this->residence_id;
    }

    public function getResidenceLabel() {
        return $this->residence_label;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setLabel($label) {
        $this->label = $label;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function setPersonneId($personne_id) {
        $this->personne_id = $personne_id;
    }

 //Functions
 public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "SELECT 
                    residence.id AS residence_id, 
                    residence.label AS residence_label, 
                    residence.ville, 
                    residence.prix, 
                    personne.nom, 
                    personne.prenom 
                  FROM residence 
                  INNER JOIN personne ON residence.personne_id = personne.id
                  ORDER BY residence.prix ASC";
            $statement = $database->query($query);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelResidence");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
     public static function getAllUserId($id) {
        try {
        $database = Model::getInstance();
        $query = "SELECT 
                    residence.id AS residence_id, 
                    residence.label AS residence_label, 
                    residence.ville, 
                    residence.prix
                  FROM residence 
                  WHERE personne_id = :id
                  ORDER BY residence.prix ASC";
        $statement = $database->prepare($query);
        $statement->execute(['id' => $id]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelResidence");
        return $results;
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
    }
    
    public static function getAllNotUserResidence($id) {
    try {
        $database = Model::getInstance();
        $query = "SELECT * FROM residence WHERE personne_id != :id";
        $statement = $database->prepare($query);
        $statement->execute(['id' => $id]);
        $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelResidence");
        return $results;
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
}

public static function getIdForResidence($residenceId){
    try {
        $database = Model::getInstance();
        $query = "SELECT personne_id FROM residence WHERE id = :residence_id";
        $statement = $database->prepare($query);
        $statement->execute(['residence_id' => $residenceId]);
        $id_vendeur = $statement->fetch(PDO::FETCH_ASSOC);
        return $id_vendeur['personne_id'] ?? null;
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
}

public static function getLabelForResidence($residenceId){
    try {
        $database = Model::getInstance();
        $query = "SELECT label FROM residence WHERE id = :residence_id";
        $statement = $database->prepare($query);
        $statement->execute(['residence_id' => $residenceId]);
        $label = $statement->fetch(PDO::FETCH_ASSOC);
        return $label['label'] ?? null;
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
}

public static function getPrixForResidence($residenceId){
    try {
        $database = Model::getInstance();
        $query = "SELECT prix FROM residence WHERE id = :residence_id";
        $statement = $database->prepare($query);
        $statement->execute(['residence_id' => $residenceId]);
        $prix = $statement->fetch(PDO::FETCH_ASSOC);
        return $prix['prix'] ?? null;
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return NULL;
    }
}

public static function updateProprietaire($residence_id, $new_proprietaire_id) {
    try {
        $database = Model::getInstance();
        $query = "UPDATE residence SET personne_id = :new_proprietaire_id WHERE id = :residence_id";
        $statement = $database->prepare($query);
        $statement->bindValue(':residence_id', $residence_id);
        $statement->bindValue(':new_proprietaire_id', $new_proprietaire_id);
        $statement->execute();
        return $statement->rowCount() > 0;
    } catch (PDOException $e) {
        printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
        return false;
    }
}


}
?>
<!-- ----- fin ModelResidence -->
