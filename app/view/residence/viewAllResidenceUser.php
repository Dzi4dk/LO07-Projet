<!-- ----- début viewAll -->
<?php
if(session_status() == PHP_SESSION_NONE){
    // Start Session it is not started yet
    session_start();
}
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">

    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.php';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';


    echo "<h2 style='color: red;'>Liste de tous les résidences de " . $_SESSION['nom'] . " " . $_SESSION['prenom'] . "</h2>";


    if ($results) {
        echo "<table class='table table-striped table-bordered'>";
        echo "<thead><tr>";
        echo "<th scope='col'>Nom</th>";
        echo "<th scope='col'>Prénom</th>";
        echo "<th scope='col'>Résidence</th>";
        echo "<th scope='col'>Ville de la résidence</th>";
        echo "<th scope='col'>Prix</th>";
        echo "</tr></thead>";
        echo "<tbody>";

        foreach ($results as $residence) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($residence->getResidenceLabel()) . "</td>";
            echo "<td>" . htmlspecialchars($residence->getVille()) . "</td>";
            echo "<td style='text-align:right;'>" . number_format($residence->getPrix(), 2, ',', ' ') . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<h3 style='color: red;'>Aucune résidence trouvée.</h3>";
    }
    ?>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</body>
  <!-- ----- fin viewAll -->
  
  
  
  
  
  