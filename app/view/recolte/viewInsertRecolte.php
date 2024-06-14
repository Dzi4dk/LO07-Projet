
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.php';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 
      
    <form role="form" method='get' action='router2.php'>
  <div class="form-group">
    <input type="hidden" name='action' value='recolteCreated'>
    <label for="vin_select">Vin : </label>
    <select class="form-control" id="vin_select" name="vin" style="width: 300px">
      <option value="">Sélectionnez un vin</option>
      <?php
      foreach ($results[0] as $element) {
        printf("<option value='%d'>%d : %s : %d</option>",
          $element->getId(), $element->getId(), $element->getCru(), $element->getAnnee());
      }
      ?>
    </select>

    <label for="producteur_select">Producteur : </label>
    <select class="form-control" id="producteur_select" name="producteur" style="width: 300px">
      <option value="">Sélectionnez un producteur</option>
      <?php
      foreach ($results[1] as $element) {
        printf("<option value='%d'>%d : %s : %s : %s</option>",
          $element->getId(), $element->getId(), $element->getNom(), $element->getPrenom(), $element->getRegion());
      }
      ?>
    </select>

    <label for="quantite_input">Quantite : </label><br/>
    <input type="number" name="quantite" id="quantite_input" size="20" value="10"> <br/>
  </div>

  <p/><br/>
  <button class="btn btn-primary" type="submit">Submit form</button>
</form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->



