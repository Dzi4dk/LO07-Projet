<!-- ----- début viewAllPatrimoine -->
<?php
if(session_status() == PHP_SESSION_NONE){
    // Start Session it is not started yet
    session_start();
}
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
$totalPatrimoine = 0;
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.php';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';

    echo "<h2 style='color: red;'>Patrimoine de " . $_SESSION['nom'] . " " . $_SESSION['prenom'] . "</h2>";

    if ($results[0] or $results[1]) {
        echo "<table class='table table-striped table-bordered'>";
        echo "<thead><tr>";
        echo "<th scope='col'>Catégorie</th>";
        echo "<th scope='col'>Label</th>";
        echo "<th scope='col'>Valeur</th>";
        echo "</tr></thead>";
        echo "<tbody>";

        foreach ($results[0] as $compte) {
            echo "<tr>";
            echo "<td>" . "Compte" . "</td>";
            echo "<td>" . htmlspecialchars($compte->getCompteLabel()) . "</td>";
            echo "<td style='text-align: right;'>" . number_format($compte->getCompteMontant(), 2, ',', ' ') . "</td>";
            echo "</tr>";
            $totalPatrimoine += $compte->getCompteMontant();
        }
        
        foreach ($results[1] as $residence) {
            echo "<tr>";
            echo "<td>" . "Résidence" . "</td>";
            echo "<td>" . htmlspecialchars($residence->getResidenceLabel()) . "</td>";
            echo "<td style='text-align:right;'>" . number_format($residence->getPrix(), 2, ',', ' ') . "</td>";
            echo "</tr>";
            $totalPatrimoine += $residence->getPrix();
        }

        echo "</tbody></table>";
        
        echo "<h2 style='color: green;'>Capital total = " . number_format($totalPatrimoine, 2, ',', ' ') . " €</h2>";
        
    } else {
        echo "<h3 style='color: red;'>Votre patrimoine est nul.</h3>";
    }
    ?>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</body>
<!-- ----- fin viewAllPatrimoine -->

  
  