<?php
include 'inc/pdo.php';
include 'inc/function.php';
include 'inc/request.php';

$error = array();
if (!empty($_POST['submitted']))
{

  // Vérification pseudo
  $pseudo = trim(strip_tags($_POST['pseudo']));
  validationpseudo($error,$pseudo,3,50);

  //Vérfication email
  $mail = trim(strip_tags($_POST['mail']));
  validationemail($error,$mail);



  $mdp = trim(strip_tags($_POST['mdp']));
  $mdp2 = trim(strip_tags($_POST['mdp2']));
  validationpassword($error,$mdp,$mdp2,3,50);


  if (count($error) == 0) {
    // Inscrire un post dans la BDD
    $hash = password_hash($mdp, PASSWORD_DEFAULT);
    $token = generateRandomString(50);
    register($pseudo,$mail,$hash,$token);

    // redirection
    header('Location: index.php');
  }
  debug($error);
}

include 'inc/header.php';
 ?>
 <section class="form_inscription">


<form class="sub_form" action="" method="post">
  <label for="pseudo">Pseudo :</label>
  <input type="text" name="pseudo" value="">
  <?php
  afficherErreur($error, 'pseudo');
  br(); ?>
  <label for="mail">E-mail :</label>
  <input type="text" name="mail" value="">
  <?php
  afficherErreur($error, 'mail');
  br(); ?>
  <label for="mdp">Mot de passe :</label>
  <input type="password" name="mdp" value="">
  <?php
  afficherErreur($error, 'mdp');
  br(); ?>
  <label for="mdp2">Vérifiez votre mot de passe :</label>
  <input type="password" name="mdp2" value="">
  <?php
  afficherErreur($error, 'mdp');
  br(); ?>
  <input type="submit" name="submitted" value="Envoyer">
</form>

 </section>

<?php
include 'inc/footer.php';
