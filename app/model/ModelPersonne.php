
<!-- ----- debut ModelPersonne -->

<?php
require_once 'Model.php';

class ModelPersonne {
 private $id, $prenom, $nom, $login, $password, $statut;
 

 public function __construct($id = NULL, $prenom = NULL, $nom = NULL, $login = NULL, $password = NULL, $statut = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->prenom = $prenom;
   $this->nom = $nom;
   $this->login = $login;
   $this->password = $password;
   $this->statut = $statut;
  }
 }
 
 
//Setters
 
 function setNom($nom) {
  $this->nom = $nom;
 }

 function setPrenom($prenom) {
  $this->prenom = $prenom;
 }
 
 function setId($id) {
  $this->id = $id;
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

 
 
}
?>
<!-- ----- fin ModelPersonne -->
