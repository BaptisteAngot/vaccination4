<?php
include 'inc/pdo.php';
include 'inc/function.php';
include 'inc/request.php';
include 'inc/header.php';

if(!empty($_GET['iduser']) && is_numeric($_GET['iduser'])){
  if($_SESSION['user']['id'] == $_GET['iduser']){

  }
  else{
    // header('Location: page403.php');
  }
}
else{
  // header('Location: page404.php');
}

 ?>
