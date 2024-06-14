<!-- ----- début viewAllCompte -->
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';

    echo "<h2>Liste de tous les comptes</h2>";

    if ($results) {
        echo "<table class='table table-striped table-bordered'>";
        echo "<thead><tr>";
        echo "<th scope='col'>Nom</th>";
        echo "<th scope='col'>Prénom</th>";
        echo "<th scope='col'>Banque</th>";
        echo "<th scope='col'>Pays de la banque</th>";
        echo "<th scope='col'>Nom du compte</th>";
        echo "<th scope='col'>Montant</th>";
        echo "</tr></thead>";
        echo "<tbody>";

        foreach ($results as $compte) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($compte->getPersonneNom()) . "</td>";
            echo "<td>" . htmlspecialchars($compte->getPersonnePrenom()) . "</td>";
            echo "<td>" . htmlspecialchars($compte->getBanqueLabel()) . "</td>";
            echo "<td>" . htmlspecialchars($compte->getBanquePays()) . "</td>";
            echo "<td>" . htmlspecialchars($compte->getCompteLabel()) . "</td>";
            echo "<td style='text-align: right;'>" . number_format($compte->getCompteMontant(), 2, ',', ' ') . "</td>";
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
<!-- ----- fin viewAllCompte -->

  
  