<!-- ----- début viewAll -->
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
<<<<<<< Updated upstream
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
=======
      <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.php';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      ?>
>>>>>>> Stashed changes

    echo "<h2 style='color: red;'>Liste des résidences avec leurs propriétaires</h2>";

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
            echo "<td>" . htmlspecialchars($residence->getNom()) . "</td>";
            echo "<td>" . htmlspecialchars($residence->getPrenom()) . "</td>";
            echo "<td>" . htmlspecialchars($residence->getResidenceLabel()) . "</td>";
            echo "<td>" . htmlspecialchars($residence->getVille()) . "</td>";
            echo "<td style='text-align:right;'>" . number_format($residence->getPrix(), 2, ',', ' ') . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<h3 style='color: red;'>Aucun compte trouvé.</h3>";
    }
    ?>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</body>
  <!-- ----- fin viewAll -->
  
  
  
  
  
  