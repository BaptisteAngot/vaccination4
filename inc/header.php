<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="en-tête">
    <meta name="author" content="vaccination4">
    <meta name="robots" content="all|(no)follow|(no)index|none">
    <title>InfosVaccins.com</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="./images/logoOnglet.png">
  </head>

<!-- Le header contient la navbar, le logo, la liste cliquable et l'intro-->
  <header id="header">
    <!-- <h1>InfoVaccins.com</h1> -->
    <div class="menufixed">


      <div class="navbar" id="myTopnav">
        <nav>
          <ul><?php if (!isLogged()) { ?>
            <li><a href="index.php" class="active">Acceuil</a></li>
          <?php }else{ ?>
            <li><a href="user_log.php?id=<?php echo $_SESSION['user']['id'] ?>" class="active">Acceuil</a></li>
          <?php } ?>
            <li><a href="#FAQ">FAQ</a></li>
            <li><a href="#form_contact">Nous contacter</a></li>

            <a href="javascript:void(0);" class="icon" onclick="menuBurger()">
            <i class="fa fa-bars"></i> </a>
            <?php if (isLogged()) { ?>
              <li><a href="user_profil.php">Mon Profil</a></li>
              <li><a href="deconnexion.php">Déconnexion</a></li>
              <?php if (isAdmin()) { ?>
                <li><a href="index_back.php">Admin</a></li>
              <?php } ?>
            <?php } else { ?>
              <li><a href="inscription.php">Inscription</a></li>
              <li><a href="connexion.php">Connexion</a></li>
            <?php } ?>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
              <i class="fa fa-bars"></i> </a>
          </ul>
        </nav>
      </div>
        </div>
      <a href="#"><img src="images/IconeVaccinlogo.png" alt="Logo InfosVaccin.com"></a>
      <div class="clear"></div>
    </header>
    <div class="clear"></div>
    <body>
