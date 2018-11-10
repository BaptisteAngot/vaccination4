<?php
$pagename= "users";
include 'inc/pdo.php';
include 'inc/function.php';
include 'inc/request.php';
include ('inc/header_back.php');
 ?>

<div class="content">
  <div class="container-fluid">
    <div class="row">
      <?php
        $users=returnusers();
        Affichertableauuser($users,"Liste des utilisateurs", "Ceci est la liste des utilisateurs");
       ?>
    </div>
  </div>

<?php include ('inc/footer_back.php'); ?>
