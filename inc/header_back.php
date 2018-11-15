<?php
isLogged();
if(isAdmin()){

}
else{
  header("Location: page403.php");
} ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/favicon.ico">
  <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?php echo $pagename ?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />

</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="black">
      <div class="logo">
        <a href="./index_back.php" class="simple-text logo-normal">
          DASHBOARD ADMIN
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
           <?php
           $tableau_element_liste = array(
             array('statistique','./index_back.php','pageview','Statistique'),
             array('users','./users_back.php','person','Utilisateurs'),
             array('vaccins','./vaccins_back.php','healing','Vaccins')
           );
            foreach ($tableau_element_liste as $element) {
              afficherelement($element, $pagename );
              }
            ?>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="./index.php">
                  <i class="material-icons">home</i>Accueil
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="./deconnexion.php">
                  <i class="material-icons">clear</i>Deconnexion
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
