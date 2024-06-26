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

      <h4>Une amélioration</h4><br/>
      
      Il serait intéressant de mieux protéger les mots de passe des utlisateurs.<br/>
      En effet, tout administrateur peut avoir accès aux mots de passe de tout les utlisateurs.<br/>
      Il faudrait donc hacher les mots de passe ou utiliser un autre procédé afin qu'ils ne<br/>
      Ne soient pas disponibles en clair.<br/><br/>
      
      <h4>Une idée géniale</h4><br/>
      
      Une idée géniale<br/>
      Une idée géniale<br/>
      Une idée géniale<br/>
      Une idée géniale<br/><br/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewAll -->