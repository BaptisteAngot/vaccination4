<?php
  include 'inc/pdo.php';
  include 'inc/function.php';
  include 'inc/request.php';

  $id = $_SESSION['user']['id'];
  $error = array();
  $resultat = array();
  if(!empty($id) && is_numeric($id)){
    if($_SESSION['user']['id'] == $id){
      $resultat = recoveruserdata($id);
      if (!empty($resultat)) {
        if (!empty($_POST['submitted']))
        {
          $pseudo = trim(strip_tags($_POST['pseudo']));
          $error = validationpseudoProfil($error,$pseudo,3,100);
          $email = trim(strip_tags($_POST['email']));
          $error = validationemailProfil($error,$email);
          $password1 = trim(strip_tags($_POST['password1']));
          $password2 = trim(strip_tags($_POST['password2']));
          $error = validationpassword($error,$password1,$password2,3,50);
          $nom = trim(strip_tags($_POST['nom']));
          $error = validationTexte($error, $nom, 3, 50, 'nom');
          $prenom = trim(strip_tags($_POST['prenom']));
          $error = validationTexte($error, $prenom, 3, 50, 'prenom');
          $age = trim(strip_tags($_POST['age']));
          $error = validationChiffre($error,$age,'age');
          if (count($error) == 0) {
            $hash = password_hash($password1, PASSWORD_DEFAULT);
            updateUserDataProfil($id,$pseudo,$email, $nom, $prenom, $age, $hash);
            // redirection
            header('Location: user_profil.php');
          }
        }
      }
    } else{
      header('Location: page404.php');
    }
  } else{
    header('Location: page404.php');
  }

  include 'inc/header.php';
 ?>
 <h3>Modifer votre profil</h3>
 <form class="" method="post">
   <?php
      labelText('pseudo', 'Pseudo :', $resultat);
      afficherErreur($error, 'pseudo');
      br();
      labelEmail('email', 'Email :', $resultat);
      afficherErreur($error, 'email');
      br();
      labelPassword('password1', 'Mot de passe :', $resultat);
      afficherErreur($error, 'password1');
      br();
      labelPassword('password2', 'Confirmer mot de passe :', $resultat);
      afficherErreur($error, 'password1');
      br();
      labelText('nom', 'Nom :', $resultat);
      afficherErreur($error, 'nom');
      br();
      labelText('prenom', 'Prenom :', $resultat);
      afficherErreur($error, 'prenom');
      br();
      labelText('age', 'Age :', $resultat);
      afficherErreur($error, 'age');
      br();
   ?>
   <input type="submit" name="submitted" value="Modifier">
 </form>

<?php
  include 'inc/footer.php';