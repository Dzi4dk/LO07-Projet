<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.php';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';


    echo "<h2 style='color: red;'>Achat de la résidence " . $nom_residence . "</h2>";
?>
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='compteTransfered'>        
        <label for="compte_select" required>Compte d'où part le transfert :</label>
        <select class="form-control" id="compte_1_id" name="compte_1_id" style="width: 300px">
          <option value="">Sélectionnez un compte</option>
          <?php
          foreach ($results as $element) {
            printf("<option value='%d'>%s : Montant : %s €</option>",
              $element->getId(), $element->getLabel(), $value_montant = $element->getMontant());
            }
          ?>
          
        </select><br>
        
        <label for="compte_select" required>Compte où arrive le transfert : </label>
        <select class="form-control" id="compte_2_id" name="compte_2_id" style="width: 300px">
          <option value="">Sélectionnez un compte</option>
          <?php
          foreach ($results as $element) {
            printf("<option value='%d'>%s : Montant : %s €</option>",
              $element->getId(), $element->getLabel(), $element->getMontant());  
            }
          ?>
      </select><br>
      <label for="id">Prix de la résidence :</label><input type="number" name="montant"<?php $prix_residence ?>" class="form-control" required><br>
      <p/>
      <button class="btn btn-primary" type="submit">Valider</button>
    </form>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</body>