<!-- ----- début viewAll -->
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
          <th scope = "col">Client_nom</th>
          <th scope = "col">Client_prénom</th>
          <th scope = "col">Banque_label</th>
          <th scope = "col">Banque_pays</th>
          <th scope = "col">Compte_label</th>
          <th scope = "col">Compte_montant</th>
        </tr>
      </thead>
      <tbody>
          <?php             
          foreach ($results as $element) {
           printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element->getNom(), 
             $element->getPrenom(), $element->getRegion());
          }
          if ($deleted == 1){
              echo ("Le producteur ci dessus a bien été supprimé");
          } 
          elseif ($deleted == 2) {
              echo ("Le producteur ci dessus n'a pas été supprimé, il est présent dans une récolte");          
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  
  
  
  