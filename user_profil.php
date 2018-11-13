<?php
  include 'inc/pdo.php';
  include 'inc/function.php';
  include 'inc/request.php';

  $id = $_SESSION['user']['id'];
  $resultat = array();
  if(!empty($id) && is_numeric($id)){
    if($_SESSION['user']['id'] == $id){
      $resultat = recoveruserdata($id);
    }
    else{
      header('Location: page403.php');
    }
  }
else{
  header('Location: page404.php');
}
  // $adresse = "http://".$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
  // echo basename($adresse, ".php").PHP_EOL;
  // br();
  // echo $adresse;
  // br();
  // $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  // echo $actual_link;


  include 'inc/header.php';
?>
<h3>Votre profil</h3>
<div class="profil">
  <p>Pseudo : <?php echo $resultat['pseudo']?></p>
  <p>Email : <?php echo $resultat['email']?></p>
  <p>Nom : <?php echo $resultat['nom']?></p>
  <p>Prénom : <?php echo $resultat['prenom']?></p>
  <p>Age : <?php echo $resultat['age']?></p>
  <button  type="button" name="button"><a href="edit_profil.php">Modifer</a></button>
</div>
<?php
  include 'inc/footer.php';
