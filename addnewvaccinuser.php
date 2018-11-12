<?php
include('inc/pdo.php');
include('inc/function.php');
include('inc/request.php');
include('inc/header.php');

$vaccinsexistants= recuperationlistevaccin();
 ?>

<?php
  if(!empty($_GET['id']) && is_numeric($_GET['id'])){
    if($_SESSION['user']['id'] == $_GET['id']){
    }
    else{
      header('Location: page403.php');
    }
  }
  else{
    header('Location: page404.php');
  }


?>
<form class="" method="post">
  <h1>Ajout d'un nouveau vaccin</h1>
  <label for="vaccin">Votre vaccin a ajouté: </label>
  <select class="" name="vaccin">
    <?php foreach ($vaccinsexistants as $vaccinexistant) {
      echo '<option>' . $vaccinexistant['nom'] . '</option>';
    } ?>
  </select>
  <input type="submit" name="submitted" value="Ajouter à ma liste des vaccins">
</form>
<?php include('inc/footer.php'); ?>
