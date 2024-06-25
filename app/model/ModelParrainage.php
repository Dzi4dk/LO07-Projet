
<!-- ----- debut ModelCompte -->
<?php
if(session_status() == PHP_SESSION_NONE){
    // Start Session it is not started yet
    session_start();
}
require_once 'Model.php';

class ModelParrainage {
 private $id_compte_parrain, $code;
 

 // pas possible d'avoir 2 constructeurs
 public function __construct($id_compte_parrain = NULL, $code = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id_compte_parrain)) {
   $this->id_compte_parrain = $id_compte_parrain;
   $this->code = $code;
  }
 }
 
 
//Setters
 


//getters

  function getIdCompteParrain() {
  return $this->id_compte_parrain;
 }
 

 //Function
 

      // Ajouter un nouveau parrain
 public static function createParrain($id_compte_parrain) {
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
   
   $query = "INSERT INTO parrainage value (:id_compte_parrain, :code)";
   $statement = $database->prepare($query);
   $statement->execute([
       'id_compte_parrain' => $id_compte_parrain,
       'code' => $code
   ]);
   return $code;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
  // Prrainer un compte
 public static function parrainer($parrainage) {
  try {     
   $database = Model::getInstance();
   
   //Verfier le code
   $query = "SELECT id_compte_parrain FROM parrainage where code = :parrainage";
   $statement = $database->prepare($query);
   $statement->execute([
       'parrainage' => $parrainage
   ]);
   $id_compte_parrain = $statement->fetchAll(PDO::FETCH_CLASS, "ModelParrainage");
   
   
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
       'id_compte_parrain' => $id_compte_parrain,
       'montant' => 50
           ]);
   
   //On va chercher les infos du parrain
   $query = "SELECT personne_id FROM compte where id = :id_compte_parrain";
   $statement = $database->prepare($query);
   $statement->execute([
       'id_compte_parrain' => $id_compte_parrain
   ]);
   $id_parrain = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCompte");
   
   $query = "SELECT * FROM personne where id = :id_parrain";
   $statement = $database->prepare($query);
   $statement->execute([
       'id_parrain' => $id_parrain
   ]);
   $info_parrain = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");

   
   
   return $info_parrain;
   
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 

}
 ?>
<!-- ----- fin ModelCompte -->
