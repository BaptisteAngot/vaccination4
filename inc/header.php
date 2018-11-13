<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="en-tête">
    <meta name="author" content="vaccination4">
    <meta name="robots" content="all|(no)follow|(no)index|none">
    <title>InfosVaccins.com</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="shortcut icon" href="./images/logoOnglet.png">
  </head>

<!-- Le header contient la navbar, le logo, la liste cliquable et l'intro-->
  <header id="header">
    <!-- <h1>InfoVaccins.com</h1> -->
    <div class="menufixed">
      <div class="navbar" id="myTopnav">
        <nav>
          <ul id="menu">
            <li><a href="index.php" class="active">Accueil</a></li>
            <li><a href="index.php#FAQ">FAQ</a></li>
            <li><a href="index.php#form_contact">Nous contacter</a></li>
            <?php if (isLogged()) { ?>
              <li><a href="user_log.php">Mon carnet</a></li>
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
