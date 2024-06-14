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
          <th scope = "col">region</th>
          <th scope = "col">cru</th>
          <th scope = "col">annee</th>
          <th scope = "col">degre</th>
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">quantité</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des recoltes est dans une variable $results             
          foreach ($results[0] as $element) {
           printf("<tr><td>%s</td><td>%s</td><td>%d</td><td>%d</td><td>%s</td><td>%s</td><td>%d</td></tr>", $element->getRegion(), $element->getCru(), 
             $element->getAnnee(), $element->getDegre(), $element->getNom(), $element->getPrenom(), $element->getQuantite());
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
      
      <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">vin id</th>
          <th scope = "col">producteur id</th>
          <th scope = "col">region</th>
          <th scope = "col">cru</th>
          <th scope = "col">nom</th>
          <th scope = "col">prenom</th>
          <th scope = "col">quantité</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des recoltes est dans une variable $results             
          foreach ($results[1] as $element) {
           printf("<tr><td>%d</td><td>%d</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%d</td></tr>", 
                   $element->getVinId(), $element->getProdId(), $element->getRegion(), $element->getCru(),
                   $element->getNom(), $element->getPrenom(), $element->getQuantite());
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
  
  
  
  
  
  