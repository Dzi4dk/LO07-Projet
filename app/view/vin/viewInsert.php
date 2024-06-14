
<!-- ----- début viewInsert -->
 
<?php 
require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
    <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.php';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
    ?> 

    <form role="form" method='get' action='router2.php'>
      <div class="form-group">
        <input type="hidden" name='action' value='vinCreated'>        
        <label class='w-25' for="id">cru : </label><input type="text" name='cru' size='75' value='Champagne de déconfinement'> <br/>                          
        <label class='w-25' for="id">annee : </label><input type="number" name='annee' value='2021'> <br/> 
        <label class='w-25' for="id">degre : </label><input type="number" step='any' name='degre' value='17.24'>        <br/>
        <label class='w-25' for="id">bio : </label><input type="number" step='any' name='bio' value='0'>        <br/>  
      </div>
      <p/>
       <br/> 
      <button class="btn btn-primary" type="submit">Go</button>
    </form>
    <p/>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

<!-- ----- fin viewInsert -->



