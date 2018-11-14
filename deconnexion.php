<?php
include('inc/function.php');
include('inc/pdo.php');
include('inc/request.php');
session_start();

//Deconnecte le user dans la BDD
changestatus($_SESSION['user'],"deconnecte");

$_SESSION = array();
session_destroy();
header('Location: index.php');

 ?>
