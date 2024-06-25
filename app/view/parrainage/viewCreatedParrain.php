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

    <h2 style="color: green;">Votre code de parrainage a bien été crée</h2>
    <h4 style="color: grey;">Votre code est le suivant :</h4>
    <h4 style="color: green;"><?php echo($results) ?></h4>

    
  </div>

  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>
</body>
<!-- ----- fin viewInsertBanque -->