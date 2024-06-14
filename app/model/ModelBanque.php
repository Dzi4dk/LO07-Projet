
<!-- ----- debut ModelBanque -->

<?php
require_once 'Model.php';

class ModelBanque {
 private $id, $label, $pays;

 // Constructeur
 public function __construct($id = NULL, $label = NULL, $pays = NULL) {
  if (!is_null($id)) {
   $this->id = $id;
   $this->label = $label;
   $this->pays = $pays;
  }
 }

 // Setters
 public function setLabel($label) {
  $this->label = $label;
 }

 public function setPays($pays) {
  $this->pays = $pays;
 }
 
 public function setId($id) {
  $this->id = $id;
 }

 // Getters
 public function getLabel() {
  return $this->label;
 }

 public function getId() {
  return $this->id;
 }
 
 public function getPays() {
  return $this->pays;
 }

 // Récupérer toutes les banques
 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "SELECT * FROM banque";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelBanque");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 } 
 
public static function getOne($label) {
  try {
    $database = Model::getInstance();
    $query = "SELECT * FROM banque WHERE label = :label";
    $statement = $database->prepare($query);
    $statement->execute(['label' => $label]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result;
  } catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return NULL;
  }
}

public static function getOneId($id) {
  try {
    $database = Model::getInstance();
    $query = "SELECT * FROM banque WHERE id = :id";
    $statement = $database->prepare($query);
    $statement->execute([
        'id' => $id
            ]);
    $result = $statement->fetchAll(PDO::FETCH_CLASS, "ModelBanque");
    return $result;
  } catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return NULL;
  }
}

public static function getAllName() {
  try {
   $database = Model::getInstance();
   $query = "select label from banque";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 // Ajouter une nouvelle banque
 public static function insert($label, $pays) {
  try {
   $database = Model::getInstance();
   
   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from banque";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;
   
   
   $query = "INSERT INTO banque value (:id, :label, :pays)";
   $statement = $database->prepare($query);
   $statement->execute([
       'id' => $id,
       'label' => $label,
    'pays' => $pays
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 // Mettre à jour une banque
 public static function update($id, $label, $pays) {
  try {
   $database = Model::getInstance();
   $query = "UPDATE banque SET label = :label, pays = :pays WHERE id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
    'id' => $id,
    'label' => $label,
    'pays' => $pays
   ]);
   return $statement->rowCount();
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 // Supprimer une banque
 public static function delete($id) {
  try {
   $database = Model::getInstance();
   $query = "DELETE FROM banque WHERE id = :id";
   $statement = $database->prepare($query);
   $statement->execute(['id' => $id]);
   return $statement->rowCount();
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
}
?>

<!-- ----- fin ModelBanque -->
