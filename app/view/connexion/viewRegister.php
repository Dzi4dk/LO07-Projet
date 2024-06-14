
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.php';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      
      if ($erreur == true){
          echo("Erreur dans l'enregistrement, veuillez recommencer.");
      }
    ?> 

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='personneRegisterIn'>        
        <label class='w-25' for="id">Nom : </label><input type="text" name='nom' size='75' value='Theo'> <br/>                          
        <label class='w-25' for="id">Prénom : </label><input type="text" name='prenom' value='Koehler'> <br/> 
        <label class='w-25' for="id">Login : </label><input type="text" name='login' value='TK78'> <br/> 
        <label class='w-25' for="id">Mot de passe : </label><input type="password" name='password' value='leKcleS'> <br/>          
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Register</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->



