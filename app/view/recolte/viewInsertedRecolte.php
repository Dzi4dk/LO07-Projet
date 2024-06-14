
<!-- ----- début viewInserted -->
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.php';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
    if (count($results) == 0) {
     echo ("<h3>La nouvelle récolte a été ajoutée </h3>");
     echo("<ul>");
     echo ("<li>Vin id = " . $_GET['vin'] . "</li>");
     echo ("<li>producteur id = " . $_GET['producteur'] . "</li>");
     echo ("<li>Quantite = " . $_GET['quantite'] . "</li>");
     echo("</ul>");
    } elseif (count($results) > 0)  {
     echo ("<h3>La récolte a été mise à jour</h3>");
     echo("<ul>");
      foreach ($results as $element) {
        printf("<li>Vin id = ". $_GET['vin'] . "</li>"
                . "<li>producteur id = ". $_GET['producteur'] . "</li>"
                . "<li>Quantite = Ancienne valeur : ". $element['quantite'] ." -> Nouvelle valeur : " . $_GET['quantite'] . "</li>");
      }
     echo("</ul>");
    } elseif ($results == -1)  {
     echo ("<h3>Problème d'insertion d'une récolte</h3>");
     echo("<ul>");
     echo ("<li>Vin id = " . $_GET['vin'] . "</li>");
     echo ("<li>producteur id = " . $_GET['producteur'] . "</li>");
     echo ("<li>Quantite = " . $_GET['quantite'] . "</li>");
     echo("</ul>");
    } 

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentCaveFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    