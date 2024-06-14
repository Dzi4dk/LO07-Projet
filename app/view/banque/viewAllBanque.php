<!-- ----- début viewAllBanque -->
<?php

require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.php';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      ?>

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">id</th>
          <th scope = "col">label</th>
          <th scope = "col">pays</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des banques est dans une variable $results             
          foreach ($results as $element) {
           printf("<tr><td>%d</td><td>%s</td><td>%s</td></tr>", $element->getId(), $element->getLabel(), 
             $element->getPays());
          }
          
          // Affichage des messages de suppression si nécessaire
          if (isset($deleted)) {
              if ($deleted == 1) {
                  echo ("<tr><td colspan='3'>La banque ci-dessus a bien été supprimée.</td></tr>");
              } elseif ($deleted == 2) {
                  echo ("<tr><td colspan='3'>La banque ci-dessus n'a pas été supprimée, elle est associée à une récolte.</td></tr>");
              }
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewAllBanque -->

  
  
  
  
  
  