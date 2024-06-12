<!-- ----- début viewInsertBanque -->
<?php
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentCaveMenu.html';
    include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

    <h2 style="color: red;">Formulaire pour l'ajout d'une banque par un administrateur</h2>

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='banqueCreated'>        
        <label for="label">Label :</label><input type="text" name='label' class="form-control" placeholder="Entrez le label de la banque" required><br><br>
        <label for="pays">Pays :</label><input type="text" name='pays' class="form-control" placeholder="Entrez le pays de la banque" required><br><br>
      </div>
      <p/>
      <button class="btn btn-primary" type="submit">Ajouter</button>
    </form>
  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</body>
<!-- ----- fin viewInsertBanque -->