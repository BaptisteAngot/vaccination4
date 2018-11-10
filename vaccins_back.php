<?php
$pagename= "vaccins";
include 'inc/pdo.php';
include 'inc/function.php';
include 'inc/request.php';
include ('inc/header_back.php');
 ?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <?php
        $vaccins=returnvaccins();
        Affichertableauvaccin($vaccins,"Liste des vaccins", "Ceci est la liste des vaccins");
       ?>
    </div>
    <a href="addvaccin.php" class="btn btn-success btn-lg" role="button" >Nouveau vaccins</a>
  </div>

<?php include ('inc/footer_back.php'); ?>
