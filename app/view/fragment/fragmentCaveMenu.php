<!-- ----- début fragmentCaveMenu -->
<?php 
if(session_status() == PHP_SESSION_NONE){
    // Start Session it is not started yet
    session_start();
}?>

<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #cc66ff">
  <div class="container-fluid">
    <img src="../../public/documentation/logo.png" alt="Logo" width="40" height="40" style="margin-right: 10px;">
    <a class="navbar-brand" href="router2.php?action=CaveAccueil">CHABANNES - DELHOMME | <?php if ($_SESSION['statut'] == 0) echo "Admin | " . $_SESSION['nom'] . " " . $_SESSION['prenom'];?> <?php if ($_SESSION['statut'] == 1) echo "Client | " . $_SESSION['nom'] . " " . $_SESSION['prenom'];?> <?php if ($_SESSION['statut'] == 3) echo "Utilisateur non connecté | ";?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
          <?php if ($_SESSION['statut'] == 0) echo '<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Banques</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=banqueReadAll">Liste des banques</a></li>
            <li><a class="dropdown-item" href="router2.php?action=banqueCreate">Ajouter une banque</a></li>
            <li><a class="dropdown-item" href="router2.php?action=banqueReadName&target=banqueReadOne">Liste des comptes dans une banque</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Clients</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=personneReadAllClients">Liste des clients</a></li>
            <li><a class="dropdown-item" href="router2.php?action=personneReadAllAdmins">Liste des administrateurs</a></li>
            <li><a class="dropdown-item" href="router2.php?action=compteReadAll">Liste des comptes</a></li>
            <li><a class="dropdown-item" href="router2.php?action=residenceReadAll">Liste des résidences</a></li>
          </ul>
        </li>';?>
          
          <?php if ($_SESSION['statut'] == 1) echo '<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mes comptes bancaires</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=compteReadAllUser">Vos comptes</a></li>
            <li><a class="dropdown-item" href="router2.php?action=compteCreate">Ajouter un nouveau compte</a></li>
            <li><a class="dropdown-item" href="router2.php?action=compteTransfert">Transfert inter-comptes</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mes résidences</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=residenceReadAllUser">Liste de mes résidences</a></li>
            <li><a class="dropdown-item" href="router2.php?action=achatResidence">Achat de nouvelle résidence</a></li>
          </ul>
        </li>
        

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mon patrimoine</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=patrimoineReadAllUser">Bilan patrimoine</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Parrainer un proche</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=parrainCreate">Je parraine un proche</a></li>
          </ul>
        </li>';?>
          
        
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=">Parrainer un proche (connectez vous en tant qu'utilisateur)</a></li>
            <li><a class="dropdown-item" href="router2.php?action=mesPropositions">Amélioration du code MVC</a></li>
          </ul>
        </li>
        
        <div class="d-flex justify-content-end">
            <li class="nav-item">
                <?php if ($_SESSION['statut'] == 3) { ?>
                    <button type="button" class="btn btn-primary me-2" onclick="window.location.href='router2.php?action=personneShowLogin'">Login</button>
                    <button type="button" class="btn btn-secondary" onclick="window.location.href='router2.php?action=personneShowRegister'">Register</button>
                <?php } else if ($_SESSION['statut'] == 0 || $_SESSION['statut'] == 1) { ?>
                    <button type="button" class="btn btn-danger" onclick="window.location.href='router2.php?action=personneDisconnect'">Déconnexion</button>
                <?php } ?>
            </li>
        </div>

<style>
.d-flex {
    position: fixed;
    right: 10px;
    z-index: 1000;
}
</style>

      </ul>
    </div>
  </div>
</nav> 

<!-- ----- fin fragmentCaveMenu -->