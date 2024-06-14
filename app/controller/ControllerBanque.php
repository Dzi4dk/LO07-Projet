<!-- ----- debut ControllerBanque -->
<?php
require_once '../model/ModelBanque.php';
require_once '../model/ModelCompte.php';

class ControllerBanque {
    // --- page d'accueil
    public static function caveAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewCaveAccueil.php';
        if (DEBUG)
            echo ("ControllerBanque : caveAccueil : vue = $vue");
        require ($vue);
    }

    // --- Liste des banques
    public static function banqueReadAll() {
        $results = ModelBanque::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewAllBanque.php';
        if (DEBUG)
            echo ("ControllerBanque : banqueReadAll : vue = $vue");
        require ($vue);
    }

    public static function banqueReadName($args) {        
        $results = ModelBanque::getAllName();

        $target = $args['target'];
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewName.php';
        require ($vue);
       }
 
    
    // --- Lire une banque par son Label
    public static function banqueRead($args) {
        $label = $args['label'];
        $results = ModelBanque::getOne($label);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewOneBanque.php';
        if (DEBUG)
            echo ("ControllerBanque : banqueReadOne : vue = $vue");
        require ($vue);
    }
    
    public static function banqueReadOne($args) {
        $label = htmlspecialchars($args['label']);
        $banque = ModelBanque::getOne($label);
        $banqueId = $banque['id'];
        $comptes = ModelCompte::getByBanqueId($banqueId);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewOneBanque.php';
        if (DEBUG)
            echo ("ControllerBanque : banqueReadOne : vue = $vue");
        require ($vue);
    }
    
    // --- Formulaire pour créer une nouvelle banque
    public static function banqueCreate() {
        include 'config.php';
        $vue = $root . '/app/view/banque/viewInsertBanque.php';
        require ($vue);
    }

    // --- Ajouter une nouvelle banque à la base de données
    public static function banqueCreated($args) {
        $results = ModelBanque::insert(htmlspecialchars($_GET['label']), htmlspecialchars($_GET['pays']));
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewInsertedBanque.php';
        require ($vue);
    }

    // --- Formulaire pour mettre à jour une banque
    public static function banqueUpdate($args) {
        $id = $args['id'];
        $results = ModelBanque::getOne($id);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewUpdateBanque.php';
        require ($vue);
    }

    // --- Mettre à jour une banque dans la base de données
    public static function banqueUpdated($args) {
        $id = htmlspecialchars($args['id']);
        $label = htmlspecialchars($args['label']);
        $pays = htmlspecialchars($args['pays']);
        $results = ModelBanque::update($id, $label, $pays);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewUpdatedBanque.php';
        require ($vue);
    }

    // --- Supprimer une banque
    public static function banqueDelete($args) {
        $id = $args['id'];
        $results = ModelBanque::delete($id);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/banque/viewDeletedBanque.php';
        require ($vue);
    }
}
?>
<!-- ----- Fin ControllerBanque -->



