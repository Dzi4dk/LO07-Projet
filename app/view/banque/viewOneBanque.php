<!-- ----- début viewOneBanque -->
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.php';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    
    if ($banque) {
        echo "<h2 style='color: red;'>Liste des comptes de cette banque : " . htmlspecialchars($banque['label']) . "</h2>";
    } else {
        echo "<h3 style='color: red;'>Erreur : Banque non trouvée.</h3>";
    }
    ?>
    
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th scope="col">Prénom</th>
          <th scope="col">Nom</th>
          <th scope="col">Banque</th>
          <th scope="col">Compte</th>
          <th scope="col">Montant</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($comptes) {
            foreach ($comptes as $compte) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($compte['prenom']) . "</td>";
                echo "<td>" . htmlspecialchars($compte['nom']) . "</td>";
                echo "<td>" . htmlspecialchars($banque['label']) . "</td>";
                echo "<td>" . htmlspecialchars($compte['label']) . "</td>";
                echo "<td style='text-align: right;'>" . number_format($compte['montant'], 2, ',', ' ') . "</td>";
                echo "</tr>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5' style='color: red;'>Aucun compte trouvé pour cette banque.</td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</body>
<!-- ----- fin viewOneBanque -->

