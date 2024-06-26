 
<!-- ----- debut de la page cave_acceuil -->
<?php include 'fragment/fragmentCaveHeader.html'; ?>
<body>
  <div class="container">
    <?php
    if ($_SESSION['justLogged']){
        include 'fragment/fragmentConnectedPopup.php';
        $_SESSION['justLogged'] = false;
    }
    include 'fragment/fragmentCaveMenu.php';
    if ($_SESSION['prenom_parrain'] and $_SESSION['nom_parrain']){
        include 'fragment/fragmentParrain.php';
    }
    include 'fragment/fragmentCaveJumbotron.html';
    ?>
  </div>   
  
  
  <?php
  include 'fragment/fragmentCaveFooter.html';
  ?>

  <!-- ----- fin de la page cave_acceuil -->

</body>
</html>