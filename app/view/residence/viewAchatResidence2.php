<!-- ----- début viewAchatResidence2 -->
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.php';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';

    echo "<h2 style='color: red;'>Achat de la résidence " . htmlspecialchars($nom_residence) . "</h2>";
    ?>
    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='compteTransfered'>

        <label for="compte_1_id" required>Sélectionnez un compte de l'acheteur</label>
<select class="form-control" id="compte_1_id" name="compte_1_id" style="width: 300px" required>
  <?php if (empty($results[2])): ?>
    <option disabled>Aucun compte disponible. Le transfert est impossible.</option>
  <?php else: ?>
    <?php foreach ($results[2] as $element): ?>
      <option value="<?= $element->getId() ?>"><?= $element->getLabel() ?></option>
    <?php endforeach; ?>
  <?php endif; ?>
</select><br>

<label for="compte_2_id" required>Sélectionnez un compte du vendeur</label>
<select class="form-control" id="compte_2_id" name="compte_2_id" style="width: 300px" required>
  <?php if (empty($results[1])): ?>
    <option disabled>Aucun compte disponible. Le transfert est impossible.</option>
  <?php else: ?>
    <?php foreach ($results[1] as $element): ?>
      <option value="<?= $element->getId() ?>"><?= $element->getLabel() ?></option>
    <?php endforeach; ?>
  <?php endif; ?>
</select><br>

        <label for="montant">Prix de la résidence :</label>
        <input type="number" class="form-control" id="montant" name="montant" value="<?php echo htmlspecialchars($prix_residence); ?>" readonly required><br>

        <button class="btn btn-primary" type="submit">Valider</button>
      </div>
    </form>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</body>
<!-- ----- fin viewAchatResidence2 -->
