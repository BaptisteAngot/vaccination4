<?php
  include 'inc/pdo.php';
  include 'inc/function.php';
  include 'inc/request.php';

  $resultat = array();
  if(!empty($_GET['id']) && is_numeric($_GET['id'])){
    if($_SESSION['user']['id'] == $_GET['id']){
      $resultat = recoveruserdata($_GET['id']);
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
<div class="profil">

  <p>Pseudo : <?php echo $resultat['pseudo']?></p>
  <p>Email : <?php echo $resultat['email']?></p>
  <p>Pseudo : <?php echo $resultat['pseudo']?></p>
  <button  type="button" name="button"><a href="edit_profil.php?id="<?php echo $resultat['pseudo']; ?>"">Modifer</a></button>
</div>
<?php
  include 'inc/footer.php';
