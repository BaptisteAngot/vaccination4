<?php
include 'inc/pdo.php';
include 'inc/function.php';
include 'inc/request.php';

$error = array();
if (!empty($_POST['submitted']))
{
  $login_mail = trim(strip_tags($_POST['login_mail']));
  $password = trim(strip_tags($_POST['password']));

  $user=connect($login_mail,$password);

  if (!empty($user)) {
    if (!password_verify($password, $user['password'])) {
      $error['password'] = 'Mot de passe incorrect';
    }
  }
  else {
    $error['login_mail'] = 'Identifiant incorrect';
  }
  if(count($error) == 0)
  {
    if($user['status']== "banni"){
      $_SESSION['user'] = array('status' => "banni");
      header('Location: index.php?ban=ban');
    }
    else {
      // Met le user en connecté
      changestatus($user,"connecte");

      $_SESSION['user'] = array(
        // Clé unique pour eviter les problèmes de connexion
        'id' => $user['id'],
        'pseudo' => $user['pseudo'],
        'email' => $user['email'],
        'role' => $user['role'],
        'ip' => $_SERVER['REMOTE_ADDR'],
        'status' => "connecte"
      );
      header('Location: user_log.php');
    }
  }
 }

 // lien vers une page mdp oublié

include 'inc/header.php';
 ?>
 <div class="wrap">
   <div class="form-connexion">
     <form method="post">
       <label for="login_mail">Login ou e-mail :</label>
       <input type="text" name="login_mail" value="">
       <?php
       afficherErreur($error, 'login_mail');
       br(); ?>
       <label for="password">Mot de passe :</label>
       <input type="password" name="password" value="">
       <?php
       afficherErreur($error, 'password');
       br(); ?>
       <a href="password_forget.php">Mot de passe oublié?</a>
       <input type="submit" name="submitted" value="Envoyer">
     </form>
   </div>
 </div>
 <?php
include 'inc/footer.php';
