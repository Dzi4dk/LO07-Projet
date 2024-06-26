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

      <h4>Amélioration 1</h4><br/>
      
      On ne pouvait pas guet une valeur au sein d'un même model ce qui nous a posé quelques problèmes même si on a pu les contourner<br/>
      
      <h4>Amélioration 2</h4><br/>
      
      Les mots de passe ne sont pas hashés ce qui augmentent très fortement les failles de sécurité. Cette amélioration ne concerne pas forcément notre modèle MVC mais plutôt notre projet en général.<br/><br/>
      
      <h4>Amélioration 3</h4><br/>
      
      Lors de l'achat des résidences par exemple on a du faire plusieurs aller retour entre les vues, les contrôleur et les modèles en donnant des input caché pour récupérer et garder les informations du premier formulaire ce qui fait perdre beaucoup de temps puisqu'on doit refaire plusieurs vues, plusieurs méthodes par contrôleur/modèles. On aurait pu utiliser des sessions pour stocker les variables mais on a pas trouvé utile de la faire dans ce cas la.<br/><br/>
      
      <h4>Amélioration 4</h4><br/>
      
      On aurait pu réutiliser des vues probablement. Dans notre projet c'était pas forcément très intéressant, mais pour des projets beaucoup plus gros, où on print plus de fois la même chose (une liste de comptes par exemple) il est intéressant d'utiliser des vues partielles (fragments) comme on a fait avec fragmentCaveFooter...<br/><br/>
      
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewAll -->