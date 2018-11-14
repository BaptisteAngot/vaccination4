<?php
include 'inc/pdo.php';
include 'inc/function.php';
include 'inc/request.php';
include 'inc/header.php';
$error=array();

if(!empty($_SESSION['user']['id'])){
  if(!empty($_GET['id'])){

  }
  else{
    header('Location: page403.php');
  }
}
else{
  header('Location: page403.php');
}

//Récupérer info d'un vaccin à l'id
$infovaccin=selectinfofromidvaccin($_GET['id']);
//récupère la liste de tout les vaccins
$vaccinsexistants= recuperationlistevaccin();

if(!empty($_POST['submitted'])){
  //Faille XSS

  //Date
  $date=trim(strip_tags($_POST['date']));
  $error=validationdate($error,$date,'date');

  //reaction
  $reaction=trim(strip_tags($_POST['reaction']));
  $error=validationText($error,$reaction,0,100,'reaction');

  if(count($error)==0){
    updateinfovaccin($infovaccin['id'],$date,$reaction);
    header('Location: user_log.php');
  }
}

//Récupère le nom du vaccin
$namevaccin= selectnamefromidmesvaccin($_GET['id']);
$nomduvaccin=$namevaccin['nom'];

$date=date("Y-m-d",strtotime($infovaccin['date']));

 ?>
 <div class="wrap">
   <div class="modifvaccin">
     <h1>Modification d'un vaccin réalisé</h1>
     <form class="" method="post">
       <label class="label" for="vaccin"> Nom du vaccin :</label>
       <input type="text" name="vaccin" value="<?php echo $nomduvaccin ; ?>" disabled>
       <label class="label" for="date"> Date de vaccination :</label>
       <input type="date" name="date" value="<?php echo $date; ?>">
       <label class="label" for="reaction"> Une réaction ?</label>
       <input type="text" name="reaction" value="<?php echo $infovaccin['reaction']; ?>">
       <input type="submit" name="submitted" value="Mettre à jour vos informations">
     </form>
   </div>
 </div>
