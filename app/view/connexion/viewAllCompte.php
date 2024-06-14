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
          <th scope = "col">id</th>
          <th scope = "col">label</th>
          <th scope = "col">montant</th>
          <th scope = "col">banque id</th>
          <th scope = "col">personne id</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des vins est dans une variable $results             
          foreach ($results as $element) {
           printf("<tr><td>%d</td><td>%s</td><td>%d</td><td>%d</td><td>%d</td></tr>", $element->getId(), $element->getLabel(), 
             $element->getMontant(), $element->getBanqueId(), $element->getPersonneId());
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
  
  
  
  
  
  