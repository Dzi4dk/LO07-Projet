<!-- ----- début viewInsertedBanque -->
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
    <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.php';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>

    <!-- Affichage du message de confirmation -->
    <?php
    if ($results[0]) {
        echo "<h2 style='color: green;'>Le nouveau compte a été crée avec succès !</h2>";
        echo "<table class='table table-striped table-bordered'>";
        echo "<thead><tr>";
        echo "<th scope='col'>Banque</th>";
        echo "<th scope='col'>Pays de la banque</th>";
        echo "<th scope='col'>Nom du compte</th>";
        echo "</tr></thead>";
        echo "<tbody>";
        
        foreach ($results[1] as $element){
            printf("<tr><td>%s</td><td>%s</td><td>%s</td></tr>", $element->getLabel(), 
             $element->getPays(), $_GET['label']);         
        }           
        

        echo "</tbody></table>";
    } else {
        echo "<h2 style='color: red;'>Erreur lors de l'insertion du nouveau compte.</h2>";
    }
    ?>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</body>
<!-- ----- fin viewInsertedBanque -->
