
<!-- ----- debut ControllerCompte -->
<?php
if(session_status() == PHP_SESSION_NONE){
    // Start Session it is not started yet
    session_start();
}
require_once '../model/ModelParrainage.php';
require_once '../model/ModelCompte.php';

class ControllerParrainage {

     // --- Formulaire pour créer un parrain
    public static function parrainCreate() {
        $results = ModelCompte::getAllUserId2($_SESSION['user_id']);
        include 'config.php';
        $vue = $root . '/app/view/parrainage/viewCreateParrain.php';
        require ($vue);
    }
    
     // --- Formulaire pour créer un parrain
    public static function parrainCreated() {
        $results = ModelParrainage::createParrain($_GET['compte_id']);
        include 'config.php';
        $vue = $root . '/app/view/parrainage/viewCreatedParrain.php';
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerCompte -->


