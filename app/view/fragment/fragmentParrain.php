<!-- ===== debut fragmentCaveJumbotron -->

<!-- Les jumbotrons de BT3 n'existe plus et sont remplacés par de simple div -->       

<div class="mt-4 p-5 text-white rounded" style="background-color: #ffc107;">
  <h1>Votre parrain : </h1>
  <p><?php echo($_SESSION['parrain']->getNom() . $_SESSION['parrain']->getPrenom())?></p>
</div>
<p/>


<!-- ===== fin fragmentCaveJumbotron -->