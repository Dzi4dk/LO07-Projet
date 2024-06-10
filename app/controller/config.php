
<!-- ----- debut config -->
<?php

// Utile pour le débugage car c'est un interrupteur pour les echos et print_r.
if (!defined('DEBUG')) {
    define('DEBUG', FALSE);
}

// ===============
// Configuration de la base de données sur dev-isi
$dsn = 'mysql:dbname=delhomml;host=localhost;charset=utf8';
$username = 'delhomml';
$password = 'P9ej18rL';


//Le fichier config.php permet de travailler avec les deux serveurs (local et dev-isi). Pour travailler
//avec dev-isi, la constante LOCAL doit être égale à FALSE.
if (!defined('LOCAL')) {
    define('LOCAL', FALSE);
}

if (LOCAL) {
    // Configuration de la base de données sur localhost
    $dsn = 'mysql:dbname=CAVE;host=localhost;charset=utf8';
    $username = 'root';
    $password = 'root';
}
 
// chemin absolu vers le répertoire du projet SUR DEV-ISI 
$root = dirname(dirname(__DIR__)) . "/";


if (DEBUG) {
 echo ("<ul>");
 echo (" <li>dsn = $dsn</li>");
 echo (" <li>username = $username</li>");
 echo (" <li>password = $password</li>");
 echo ("<li>---</li>");
 echo (" <li>root = $root</li>");

 echo ("</ul>");
}
?>

<!-- ----- fin config -->



