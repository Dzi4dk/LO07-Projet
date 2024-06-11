
<!-- ----- debut ModelBanque -->

<?php
require_once 'Model.php';

class ModelBanque {
 private $id, $label, $pays;
 

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $label = NULL, $pays = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->label = $label;
   $this->pays = $pays;
  }
 }
 
 
//Setters
 
 function setLabel($label) {
  $this->label = $label;
 }

 function setPays($pays) {
  $this->pays = $pays;
 }
 
 function setId($id) {
  $this->id = $id;
 }


//getters
 
 function getLabel() {
  return $this->label;
 }

  function getId() {
  return $this->id;
 }
 
 function getPays() {
  return $this->pays;
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
   $query = "select * from banque";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelBanque");
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

 public static function insert($nom, $prenom, $region) {
  try {
   $database = Model::getInstance();

   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from producteur";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   // ajout d'un nouveau tuple;
   $query = "insert into producteur value (:id, :nom, :prenom, :region)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'nom' => $nom,
     'prenom' => $prenom,
     'region' => $region
   ]);
   return $id;
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
<!-- ----- fin ModelBanque -->
