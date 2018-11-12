<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="en-tête">
    <meta name="author" content="Dufresne TRUPIN ANGOT">
    <meta name="robots" content="all|(no)follow|(no)index|none">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfosVaccins.com</title>
    <link rel="stylesheet" href="./assets/css/style.css">
  </head>

<!-- Le header contient la navbar, le logo, la liste cliquable et l'intro-->
  <header id="header">
    <!-- <h1>InfoVaccins.com</h1> -->
      <div class="navbar">
        <nav>
          <ul>
            <li><a href="index.php" class="active">Acceuil</a></li>
            <li><a href="#FAQ">FAQ</a></li>
            <li><a href="#form_contact">Nous contacter</a></li>
            <?php if (isLogged()) { ?>
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
      <a href="#"><img src="images/IconeVaccinlogo.png" alt="Logo InfosVaccin.com"></a>
      <div class="clear"></div>
    </header>
    <div class="clear"></div>
    <body>
