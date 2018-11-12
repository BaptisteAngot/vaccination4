<?php
  include 'inc/pdo.php';
  include 'inc/function.php';
  include 'inc/request.php';

  echo basename(getcwd());
  $adresse = "http://".$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
  br();
  echo $adresse;
  br();


  include 'inc/header.php';
?>
