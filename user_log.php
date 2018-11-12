<?php
include 'inc/pdo.php';
include 'inc/function.php';
include 'inc/request.php';
include 'inc/header.php';
$vaccinsexistants= recuperationlistevaccin();
$error=array();
//Vérification USER exist
$id=$_SESSION['user']['id'];
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


  if(!empty($_POST['submitted'])){
    //FAillE XSS


    //Title vaccin
    $title=trim(strip_tags($_POST['vaccin']));
    $error=validationText($error,$title,2,50,'titrevaccin');

    //Champs date
    $date=trim(strip_tags($_POST['date']));
    $error=validationdate($error,$date,'date');

    //Champs reaction
    $reaction=trim(strip_tags($_POST['reaction']));
    $error=validationText($error,$reaction,2,100,'reaction');

    if(count($error)==0){
      envoyervaccinuser($_SESSION['id'],$title,$date,$reaction);
      header('Location: user_log.php');
    }
  }


 ?>
<div class="userlog">

  <div class="myvaccin">

  </div>
  <div class="newvaccin">
    <form class="" method="post">
      <h1>Ajout d'un nouveau vaccin</h1>
        <label for="vaccin">Votre vaccin a ajouté: </label>
        <!-- Champs select -->
        <div class="select">
          <select class="" name="vaccin">
            <?php foreach ($vaccinsexistants as $vaccinexistant) {
              echo '<option>' . $vaccinexistant['nom'] . '</option>';
            } ?>
          </select>
        </div>
        <br>
        <!-- Champs Date -->
        <label for="date">Date de votre vaccin:</label>
        <input type="date" name="date" value="">
        <br>
        <!-- Champs reaction -->
        <label for="reaction">Une réaction ?</label>
        <input type="text" name="reaction" value="">
        <br>
        <span>Si aucune, veuillez laisser ce champs vide.</span>
      <input type="submit" name="submitted" value="Ajouter à ma liste des vaccins">
    </form>
  </div>

</div>
 <?php include 'inc/footer.php'; ?>
