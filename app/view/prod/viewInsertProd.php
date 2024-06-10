
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='prodCreated'>        
        <label class='w-25' for="id">Nom : </label><input type="text" name='nom' size='75' value='Koehler'> <br/>                          
        <label class='w-25' for="id">Prénom : </label><input type="text" name='prenom' value='Théo'> <br/> 
        <label class='w-25' for="id">Région : </label><input type="text" name='region' value='Alsace'>        <br/>          
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->



