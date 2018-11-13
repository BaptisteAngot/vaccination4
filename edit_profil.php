<?php
  include 'inc/pdo.php';
  include 'inc/function.php';
  include 'inc/request.php';

  $error = array();
  $resultat = array();
  if(!empty($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    if($_SESSION['user']['id'] == $_GET['id']){
      $resultat = recoveruserdata($_GET['id']);
      if (!empty($resultat)) {
        if (!empty($_POST['submitted']))
        {
          $pseudo = trim(strip_tags($_POST['pseudo']));
          $error = validationpseudo($error,$pseudo,3,100);
          $email = trim(strip_tags($_POST['email']));
          $error = validationemail($error,$email);
          $password1 = trim(strip_tags($_POST['password1']));
          $password2 = trim(strip_tags($_POST['password2']));
          $error = validationpassword($error,$password1,$password2,3,50);
          $nom = trim(strip_tags($_POST['nom']));
          $error = validationTexte($error, $nom, 3, 50, 'nom');
          $prenom = trim(strip_tags($_POST['prenom']));
          $error = validationTexte($error, $prenom, 3, 50, 'nom');
          $age = trim(strip_tags($_POST['age']));
          $error = validationChiffre($error,$age,'age');
          if (count($error) == 0) {
            updateUserDataProfil($id,$pseudo,$email, $nom, $prenom, $age);
            // redirection
            //  header('Location: user_profil.php');
          }
        }
        // Modifier un post dans la BDD
      }
    } else{
      header('Location: page404.php');
    }
  } else{
    header('Location: page404.php');
  }

  include 'inc/header.php';
 ?>
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
      afficherErreur($error, 'password2');
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
