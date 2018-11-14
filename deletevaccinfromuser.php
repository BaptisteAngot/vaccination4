<?php
include('inc/pdo.php');
include('inc/function.php');
include('inc/request.php');
if(!empty($_SESSION['user']['id'])){
  if(!empty($_GET['id'])){
    deletevaccinuser($_GET['id']);
    header('Location: user_log.php');
  }
  else {
    header('Location: page403.php');
  }
}
else{
  header('Location: page403.php');
}
 ?>
