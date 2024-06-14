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
    if ($results) {
      echo "<h2 style='color: green;'>La nouvelle banque a été insérée avec succès !</h2>";
      echo ("<br><br>");
      echo("<ul>");
        echo ("<li>Label = " . $_GET['label'] . "</li>");
        echo ("<li>Pays = " . $_GET['pays'] . "</li>");
      echo("</ul>");
      echo ("<br><br>");
    } else {
      echo "<h2 style='color: red;'>Erreur lors de l'insertion de la nouvelle banque.</h2>";
    }
    ?>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</body>
<!-- ----- fin viewInsertedBanque -->
