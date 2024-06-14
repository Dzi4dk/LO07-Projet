<!-- ----- début fragmentCaveMenu -->
<?php 
if(session_status() == PHP_SESSION_NONE){
    // Start Session it is not started yet
    session_start();
}?>

<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #ffc107;">
  <div class="container-fluid">
    <a class="navbar-brand" href="router2.php?action=CaveAccueil">CHABANNES - DELHOMME | <?php echo($_SESSION['statut']) ?> | <?php echo($_SESSION['nom'] . " " . $_SESSION['prenom']) ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Banques</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=banqueReadAll">Liste des banques</a></li>
            <li><a class="dropdown-item" href="router2.php?action=banqueCreate">Ajout d'une banque</a></li>
            <li><a class="dropdown-item" href="router2.php?action=banqueReadName&target=banqueReadOne">Liste des comptes d'une banque</a></li>
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
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=vinReadAll">Nous contacter</a></li>
            <li><a class="dropdown-item" href="router2.php?action=vinReadId&target=vinReadOne">2 ----------- 2</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=personneShowLogin">Login</a></li>
            <li><a class="dropdown-item" href="router2.php?action=vinReadId&target=vinReadOne">Register</a></li>
            <li><a class="dropdown-item" href="router2.php?action=vinReadId&target=vinReadOne">Déconnexion</a></li>
          </ul>
        </li>
        
        

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">VIN</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=vinReadAll">Liste des vins</a></li>
            <li><a class="dropdown-item" href="router2.php?action=vinReadId&target=vinReadOne">Sélection d'un vin par son id</a></li>
            <li><a class="dropdown-item" href="router2.php?action=vinCreate">Insertion d'un vin</a></li> 
            <li><a class="dropdown-item" href="router2.php?action=vinReadId&target=vinDeleted">Suppression d'un vin</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">PRODUCTEUR</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=prodReadAll">Liste des producteurs</a></li>
            <li><a class="dropdown-item" href="router2.php?action=prodReadId&target=prodReadOne">Sélection d'un producteur par son id</a></li>
            <li><a class="dropdown-item" href="router2.php?action=prodCreate">Insertion d'un producteur</a></li>
            <li><a class="dropdown-item" href="router2.php?action=prodReadId&target=prodDeleted">Suppression d'un producteur</a></li>
            <li><a class="dropdown-item" href="router2.php?action=prodReadAllRegion">Liste sans doublons des régions</a></li>
            <li><a class="dropdown-item" href="router2.php?action=prodReadAllRegionProd">Nombre de producteurs par région</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">RECOLTE</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router2.php?action=recolteReadAll">Liste des récoltes</a></li>
            <li><a class="dropdown-item" href="router2.php?action=recolteReadAllinfos">Liste des récoltes avec infos sur vins et producteurs</a></li>
            <li><a class="dropdown-item" href="router2.php?action=recolteCreate">Insertion d'une récolte</a></li>
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