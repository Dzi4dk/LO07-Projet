<!-- ----- début fragmentCaveMenu -->
<?php 
if(session_status() == PHP_SESSION_NONE){
    // Start Session it is not started yet
    session_start();
}?>

<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #ffc107;">
  <div class="container-fluid">
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
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Banques</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=compteReadAllUser">Vos comptes</a></li>
            <li><a class="dropdown-item" href="router2.php?action=compteCreate">Ajouter un compte</a></li>
            <li><a class="dropdown-item" href="router2.php?action=compteTransfert">Transférer entre les comptes</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Résidences</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=residenceReadAllUser">Liste des résidences</a></li>
            <li><a class="dropdown-item" href="router2.php?action=personneReadAllAdmins">Liste des administrateurs</a></li>
            <li><a class="dropdown-item" href="router2.php?action=compteReadAll">Liste des comptes</a></li>
            <li><a class="dropdown-item" href="router2.php?action=residenceReadAll">Liste des résidences</a></li>
          </ul>
        </li>';?>
          
        
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=vinReadAll">Nous contacter</a></li>
            <li><a class="dropdown-item" href="router2.php?action=vinReadId&target=vinReadOne">2 ----------- 2</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Connexion</a>
          <ul class="dropdown-menu">
              <?php if ($_SESSION['statut'] == 3) echo 
                  '<li><a class="dropdown-item" href="router2.php?action=personneShowLogin">Login</a></li>
                   <li><a class="dropdown-item" href="router2.php?action=personneShowRegister">Register</a></li>'; ?>
              <?php if ($_SESSION['statut'] == 0 or $_SESSION['statut'] == 1) echo
                  '<li><a class="dropdown-item" href="router2.php?action=personneDisconnect">Déconnexion</a></li>'; ?>            
 
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">DOCUMENTATION</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=mesPropositions">Propositions d'améliorations</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav> 

<!-- ----- fin fragmentCaveMenu -->