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
    if ($transfert == 0) {
        echo "<h2 style='color: green;'>Le transfert a bien été effectué</h2>";
        echo "<table class='table table-striped table-bordered'>";
        echo "<thead><tr>";
        echo "<th scope='col'>Mon compte</th>";
        echo "<th scope='col'>Nouveau montant</th>";
        echo "</tr></thead>";
        echo "<tbody>";
        
        foreach ($results[1] as $element){
            printf("<tr><td>%s</td><td>%d</td></tr>", $element->getLabel(), 
                    $element->getMontant());         
        }           

        echo "</tbody></table>";
    } elseif ($transfert == 1) {
        echo "<h2 style='color: red;'>Erreur lors de la transaction.</h2></br>";
    } elseif ($transfert == 2) {
        echo "<h2 style='color: red;'>Erreur lors de la transaction : vous essayez de transférer plus d'argent qu'il n'y a sur le compte.</h2></br>";
    }
    ?>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</body>
<!-- ----- fin viewInsertedBanque -->