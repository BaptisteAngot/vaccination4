<?php
include 'inc/pdo.php';
include 'inc/function.php';
include 'inc/request.php';
// include 'config.php';

//$adresse = cheminURL();
$header="MIME-Version: 1.0\r\n";
$header.='From:"InfosVaccins.com"<support@infosvaccins.com>'."\n";
$header.='Content-Type:text/html; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';

$success = '';
$error = array();

if (!empty($_POST['submitted']))
{
  $mail = trim(strip_tags($_POST['mail']));
  if (!empty($mail)){

    // Requête SQL des pseudos
    $user=sqlpseudo($mail);

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $error['mail'] = 'E-mail invalide';
    }
    else {
      if (!empty($user)) {
         $body = '<p>Cliquez <a href="http://localhost/vaccination4/new_password.php?email='.urlencode($user['email']).'&token='.urlencode($user['token']).'">ICI<?php"></a></p>';
        // echo $body;
        mail($mail, "Réinitialisation mot de passe!", $body, $header);
        $success = '<div class="alert-success" role="alert">
                Réussi! Veuillez consulter vos mails!
              </div>';
        // header('Location: new_password.php');
      }
      else {
        $error['mail'] = 'Pas de pseudo à cette adresse';
      }
    }
    }

}

include 'inc/header.php';
 ?>

<form class="form_password_forget"  method="post">
  <label for="mail">Adresse mail :</label>
  <input type="email" name="mail" value="<?php if (!empty($_POST['email'])) {
    echo $_POST['email'];
  } ?>">
  <input type="submit" name="submitted" value="Envoyer">
  <?php
  afficherErreur($error, 'mail');
  echo $success;
  br(); ?>

</form>

<?php
include 'inc/footer.php';
