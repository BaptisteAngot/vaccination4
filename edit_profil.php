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
          validationpseudo($error,$pseudo,3,100);
          $email = trim(strip_tags($_POST['email']));
          validationemail($error,$email);
          $password1 = trim(strip_tags($_POST['password1']));
          $password2 = trim(strip_tags($_POST['password2']));
          validationpassword($error,$password1,$password2,3,50);
          $nom = trim(strip_tags($_POST['nom']));
          validationTexte($error, $nom, 3, 50, 'nom');
          $prenom = trim(strip_tags($_POST['prenom']));
          validationTexte($error, $prenom, 3, 50, 'nom');
          $age = trim(strip_tags($_POST['age']));
          validationChiffre($error,$age,'age');
          if (count($error) == 0) {
            updateUserDataProfil($id,$pseudo,$email, $nom, $prenom, $age);
            // redirection
            //header('Location: user_profil.php?id='.$id.'');
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
      br();
      afficherErreur($error, 'password1');
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
