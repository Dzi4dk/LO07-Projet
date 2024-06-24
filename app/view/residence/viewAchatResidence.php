<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.php';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

    <h2 style="color: red;">Formulaire pour l'achat d'une résidence</h2>

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='achatEffectue'>        
        <label for="compte_select" required>Sélectionner une résidence</label>
        <select class="form-control" id="residence" name="residence" style="width: 300px">
          <?php
          foreach ($results as $element) {
            printf("<option value='%d'>%s, Ville : %s</option>",
              $element->getId(), $element->getLabel(), $element->getVille());
            }
          ?>
          
        </select><br>
      <p/>
      <button class="btn btn-primary" type="submit">Suivant</button>
    </form>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</body>