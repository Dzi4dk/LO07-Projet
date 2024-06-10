
<!-- ----- debut ModelVin -->

<?php
require_once 'Model.php';

class ModelRecolte {
 private $vin_id, $producteur_id, $quantite, $region, $cru, $annee, $degre, $nom, $prenom, $id, $bio;
 

 // pas possible d'avoir 2 constructeurs
 public function __construct($vin_id = NULL, $producteur_id = NULL, $quantite = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($vin_id)) {
   $this->vin_id = $vin_id;
   $this->producteur_id = $producteur_id;
   $this->quantite = $quantite;
  }
 }
 
 
//Setters
 



//getters
 
 function getQuantite() {
  return $this->quantite;
 }
 
 function getId() {
  return $this->id;
 }

  function getProdId() {
  return $this->producteur_id;
 }
 
 function getVinId() {
  return $this->vin_id;
 }
 
 function getRegion() {
  return $this->region;
 }
 
 function getCru() {
  return $this->cru;
 }
 
 function getNom() {
  return $this->nom;
 }
 
 function getPrenom() {
  return $this->prenom;
 }
 
 function getAnnee() {
  return $this->annee;
 }
 
 function getDegre() {
  return $this->degre;
 }


 //Functions
 
 
// retourne une liste des id
 public static function getAllId() {
  try {
   $database = Model::getInstance();
   $query = "select id from producteur";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getMany($query) {
  try {
   $database = Model::getInstance();
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVin");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getAll() {
  try {     
   $database = Model::getInstance();
   $query = "select * from recolte";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRecolte");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
  public static function  getAllProducteurVin() {
  try {     
   $database = Model::getInstance();
   $query = "select * from vin";
   $statement = $database->prepare($query);
   $statement->execute();
   $results[0] = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRecolte");
   
   $query = "select * from producteur";
   $statement = $database->prepare($query);
   $statement->execute();
   $results[1] = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRecolte");
   
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 
 public static function getAllinfos() {
  try {     
   $database = Model::getInstance();
   $query = "select region, cru, annee, degre, nom, prenom, quantite from vin,
producteur, recolte where recolte.vin_id = vin.id and recolte.producteur_id =
producteur.id order by region";
   $statement = $database->prepare($query);
   $statement->execute();
   $results[0] = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRecolte");
   
   $query = "select vin.id as 'vin_id', producteur.id as 'producteur_id', region, cru, nom, prenom, quantite from vin,
producteur, recolte where recolte.vin_id = vin.id and recolte.producteur_id =
producteur.id order by vin.id, producteur_id";
   $statement = $database->prepare($query);
   $statement->execute();
   $results[1] = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRecolte");
   
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 } 

 public static function getOne($id) {
  try {
   $database = Model::getInstance();
   $query = "select * from producteur where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelProducteur");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function insert($vin, $producteur, $quantite) {
  try {
   $database = Model::getInstance();

   
   // Vérifier si le tuple existe déjà
  $query = "SELECT * FROM recolte WHERE producteur_id = :producteur_id AND vin_id = :vin_id";
  $statement = $database->prepare($query);
  $statement->execute([
    'producteur_id' => $producteur,
    'vin_id' => $vin
  ]);
  $results = $statement->fetchAll(PDO::FETCH_ASSOC);
  
  
  //On modifie ou insère
  if (count($results) > 0) {
      //Si la récolte existe déjà
   $query = "UPDATE recolte SET quantite = :quantite WHERE producteur_id = :producteur_id AND vin_id = :vin_id";
   $statement = $database->prepare($query);
   $statement->execute([
     'producteur_id' => $producteur,
     'vin_id' => $vin,
     'quantite' => $quantite
   ]);
      
  } else {
      //Si la récolte n'est pas existante
   $query = "insert into recolte value (:producteur_id, :vin_id, :quantite)";
   $statement = $database->prepare($query);
   $statement->execute([
     'producteur_id' => $producteur,
     'vin_id' => $vin,
     'quantite' => $quantite
   ]);
  }
   
   
   

   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }

 public static function update() {
  echo ("ModelVin : update() TODO ....");
  return null;
 }

 public static function delete($id) {
  try {
   $database = Model::getInstance();
   
   //Savoir si le producteur est présent dans recolte
   $query = "SELECT COUNT(*) FROM recolte WHERE producteur_id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   $results = $statement->fetchColumn();
   
   //On supprime le producteur ou non
   if ($results == 0){
       //Supprimer le producteur
   $query = "DELETE FROM producteur where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   return 1;
   } 
   else {
       //On ne le supprime pas, il est présent dans une récolte
       return 2;
   }
   
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return 0;
  }
 }

  public static function getAllRegion() {
  try {     
   $database = Model::getInstance();
   $query = "SELECT DISTINCT region FROM `producteur` ";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelProducteur");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function getAllRegionProd() {
  try {     
   $database = Model::getInstance();
   $query = "SELECT region, COUNT(*) AS nombre_producteurs FROM producteur GROUP BY region;` ";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelProducteur");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
}
?>
<!-- ----- fin ModelVin -->
