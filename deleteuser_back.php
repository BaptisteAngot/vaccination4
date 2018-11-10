<?php
$pagename="users";
include('inc/pdo.php');
include('inc/function.php');
include('inc/request.php');
?>

<?php

if (!empty($_GET['id']) && is_numeric($_GET['id'])){
  $id = $_GET['id'];
  deleteuser($id);
  header("Location: users_back.php");
}
