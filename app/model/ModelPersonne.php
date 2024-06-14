
<!-- ----- debut ModelPersonne -->

<?php
require_once 'Model.php';

class ModelPersonne {
 private $id, $prenom, $nom, $login, $password, $statut, $userId, $userPrenom, $userNom;
 

 public function __construct($id = NULL, $prenom = NULL, $nom = NULL, $login = NULL, 
         $password = NULL, $statut = NULL, $userNom = NULL, $userPrenom = NULL, $userId = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->prenom = $prenom;
   $this->nom = $nom;
   $this->login = $login;
   $this->password = $password;
   $this->statut = $statut;
   $this->userPrenomn = $userPrenom;
   $this->userNom = $userNom;
   $this->userId = $userId;
  }
 }
 
 
//Setters
 
 function setUserNom($userNom) {
  $this->userNom = $userNom;
 }

 function setUserPrenom($userPrenom) {
  $this->userPrenom = $userPrenom;
 }
 
 function setUserId($userId) {
  $this->userId = $userId;
 }


//getters
 
 function getNom() {
  return $this->nom;
 }

  function getId() {
  return $this->id;
 }
 
 function getPrenom() {
  return $this->prenom;
 }

 function getLogin() {
  return $this->login;
 }
 
 function getStatut() {
  return $this->statut;
 }
 
 function getUserNom() {
  return $this->userNom;
 }

  function getUserId() {
  return $this->userId;
 }
 
 function getUserPrenom() {
  return $this->userPrenom;
 }
 

 // Pas très sécurisé cette histoire ...
 
 function getPassword() {
  return $this->password;
 }

 //Functions
 

 // Récupérer touts les clients
 public static function getAllClients() {
  try {     
   $database = Model::getInstance();
   $query = "SELECT * FROM personne WHERE statut = 1";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 // Récupérer touts les administrateurs
 public static function getAllAdmins() {
  try {     
   $database = Model::getInstance();
   $query = "SELECT * FROM personne WHERE statut = 0";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 // Vérifier le login
 public static function isVerified($prenom, $nom, $password) {
  try {     
   $database = Model::getInstance();
   $query = "SELECT * FROM personne where prenom = :prenom AND nom = :nom AND password = :password";
   $statement = $database->prepare($query);
   $statement->execute([
       'prenom' => $prenom,
       'nom' => $nom,
       'password' => $password
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
   
   return $results;
   
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 //Register une nouvelle personne dans la base de données
  public static function isRegistered($prenom, $nom, $password, $login) {
  try {     
   $database = Model::getInstance();
   
   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from personne";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;
   
   
   $query = "INSERT INTO personne value (:id, :nom, :prenom, :statut, :login, :password)";
   $statement = $database->prepare($query);
   $statement->execute([
       'id' => $id,
       'prenom' => $prenom,
       'nom' => $nom,
       'password' => $password,
       'login' => $login,
       'statut' => 1
   ]);
   
   
   return $id;   
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }


 
 
}
?>
<!-- ----- fin ModelPersonne -->
