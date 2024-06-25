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

    <h2 style="color: green;">Sélectionnez le compte qui recevra la gratification du parrainage</h2>
    <h4 style="color: grey;">Une gratification de 50€ est offerte pour chaque filleul se créant un compte sur notre plateforme.</h4>

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='parrainCreated'>        
        <label for="compte_select" required>Compte parrain : </label>
        <select class="form-control" id="compte_id" name="compte_id" style="width: 300px">
          <option value="">Sélectionnez un compte</option>
          <?php
          foreach ($results as $element) {
            printf("<option value='%d'>%s : Montant : %s €</option>",
              $element->getId(), $element->getLabel(), $value_montant = $element->getMontant());
            }
          ?>
          
      </select><br>
      <p/>
      <button class="btn btn-primary" type="submit">Confirmer</button>
    </form>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</body>
<!-- ----- fin viewInsertBanque -->