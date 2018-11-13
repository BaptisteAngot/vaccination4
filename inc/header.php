<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="en-tête">
    <meta name="author" content="vaccination4">
    <meta name="robots" content="all|(no)follow|(no)index|none">
    <title>InfosVaccins.com</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/slicknav/slicknav.css" />
    <link rel="shortcut icon" href="./images/logoOnglet.png">
  </head>

<!-- Le header contient la navbar, le logo, la liste cliquable et l'intro-->
  <header id="header">
    <!-- <h1>InfoVaccins.com</h1> -->
    <div class="menufixed">


      <div class="navbar" id="myTopnav">
        <nav>
<<<<<<< HEAD
          <ul id="menu"><?php if (!isLogged()) { ?>
            <li><a href="index.php" class="active">Accueil</a></li>
=======
          <ul>
            <li><a href="index.php" class="active">Acceuil</a></li>
<<<<<<< HEAD
>>>>>>> be5489e958b6ea9d1a72a7e975340708ef44f41f
          <?php }else{ ?>
            <li><a href="user_log.php?id=<?php echo $_SESSION['user']['id'] ?>" class="active">Acceuil</a></li>
          <?php } ?>
            <li><a href="index.php#FAQ">FAQ</a></li>
            <li><a href="index.php#form_contact">Nous contacter</a></li>
=======
            <li><a href="#FAQ">FAQ</a></li>
            <li><a href="#form_contact">Nous contacter</a></li>
<<<<<<< HEAD
=======
>>>>>>> fcb98224a1ffc010db18d4c65dcde343d591452b
            <a href="javascript:void(0);" class="icon" onclick="menuBurger()">
>>>>>>> be5489e958b6ea9d1a72a7e975340708ef44f41f
            <i class="fa fa-bars"></i> </a>
            <?php if (isLogged()) { ?>
              <li><a href="user_log.php">Mon carnet</a></li>
              <li><a href="user_profil.php?id=<?php echo $_SESSION['user']['id']; ?>">Mon Profil</a></li>
              <li><a href="deconnexion.php">Déconnexion</a></li>
              <?php if (isAdmin()) { ?>
                <li><a href="index_back.php">Admin</a></li>
              <?php } ?>
            <?php } else { ?>
              <li><a href="inscription.php">Inscription</a></li>
              <li><a href="connexion.php">Connexion</a></li>
            <?php } ?>
              <i class="fa fa-bars"></i> </a>
          </ul>
        </nav>
      </div>
        </div>
      <a href="#"><img src="images/IconeVaccinlogo.png" alt="Logo InfosVaccin.com"></a>
      <div class="clear"></div>
    </header>
    <div class="clear"></div>
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
    <script src="./assets/slicknav/jquery.slicknav.min.js"></script>
    <script>
    var $bg;

  $(function(){
    $('#menu').slicknav();
    $bg.css({'background': 'red'});
  });
</script>
    <body>
