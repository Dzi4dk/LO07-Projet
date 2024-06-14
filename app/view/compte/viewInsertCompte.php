<!-- ----- début viewInsertBanque -->
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.php';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

    <h2 style="color: red;">Formulaire pour l'ajout d'une banque par un administrateur</h2>

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='compteCreated'>        
        <label for="id">Label :</label><input type="text" name='label' class="form-control" placeholder="Entrez le label du compte" required><br>
        <label for="vin_select" required>Banque : </label>
        <select class="form-control" id="banque_id" name="banque_id" style="width: 300px">
          <option value="">Sélectionnez une banque</option>
          <?php
          foreach ($results as $element) {
            printf("<option value='%d'>%d : %s : %s</option>",
              $element->getId(), $element->getId(), $element->getLabel(), $element->getPays());
          }
          ?>
        </select>
      </div><br>
      <p/>
      <button class="btn btn-primary" type="submit">Ajouter</button>
    </form>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</body>
<!-- ----- fin viewInsertBanque -->