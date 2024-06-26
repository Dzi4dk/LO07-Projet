
<!-- ----- debut ModelCompte -->
<?php
if(session_status() == PHP_SESSION_NONE){
    // Start Session it is not started yet
    session_start();
}
require_once 'Model.php';

class ModelParrainage {
 private $id_compte_parrain, $code, $nom_parrain, $prenom_parrain;
 

 // pas possible d'avoir 2 constructeurs
 public function __construct($id_compte_parrain = NULL, $code = NULL, $nom_parrain = NULL, $prenom_parrain = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id_compte_parrain)) {
   $this->id_compte_parrain = $id_compte_parrain;
   $this->code = $code;
   $this->nom_parrain = $nom_parrain;
   $this->prenom_parrain = $prenom_parrain;
  }
 }
 
 
//Setters
 


//getters

  function getIdCompteParrain() {
  return $this->id_compte_parrain;
 }
 
 function getPrenomParrain() {
  return $this->prenom_parrain;
 }
 
 function getNomParrain() {
  return $this->nom_parrain;
 }

 //Function
 

      // Ajouter un nouveau parrain
 public static function createParrain($id_compte_parrain, $nom_parrain, $prenom_parrain) {
  try {
   $montant = 0;
   $database = Model::getInstance();
   
   $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
    srand((double)microtime()*1000000); 
    $i = 0; 
    $pass = '' ; 

    while ($i <= 7) { 
        $num = rand() % 33; 
        $tmp = substr($chars, $num, 1); 
        $pass = $pass . $tmp; 
        $i++; 
    } 
   
   $code = $pass;
   
   $query = "INSERT INTO parrainage value (:id_compte_parrain, :code, :nom_parrain, :prenom_parrain)";
   $statement = $database->prepare($query);
   $statement->execute([
       'id_compte_parrain' => $id_compte_parrain,
       'code' => $code,
       'nom_parrain' => $nom_parrain,
       'prenom_parrain' => $prenom_parrain
   ]);
   return $code;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
  // Parrainer un compte
 public static function parrainer($parrainage) {
  try {     
   $database = Model::getInstance();
   
   //Verfier le code
   $query = "SELECT * FROM parrainage where code = :parrainage";
   $statement = $database->prepare($query);
   $statement->execute([
       'parrainage' => $parrainage
   ]);
   $info_parrainage = $statement->fetchAll(PDO::FETCH_CLASS, "ModelParrainage");
   
   
   //On crée un compte courant avec 50€ dans la banque partenaire au nouvel utilisateur
   $montant = 50;
   $label = "Compte courant";
   $banque_id = 1;
   $personne_id = $_SESSION['user_id'];
   
   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from compte";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;
   
   
   $query = "INSERT INTO compte value (:id, :label, :montant, :banque_id, :personne_id)";
   $statement = $database->prepare($query);
   $statement->execute([
       'id' => $id,
       'label' => $label,
       'banque_id' => $banque_id,
       'personne_id' => $personne_id,
       'montant' => $montant
   ]);
   
   //On ajoute les 50€ au compte parrain
   $query2 = "UPDATE compte SET montant = montant + :montant WHERE id = :id_compte_parrain;";
   $statement = $database->prepare($query2);
   $statement->execute([
       'id_compte_parrain'  => $info_parrainage[0]->id_compte_parrain,
       'montant' => 50
           ]);
     
   
   return $info_parrainage;
   
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 

}
 ?>
<!-- ----- fin ModelCompte -->
