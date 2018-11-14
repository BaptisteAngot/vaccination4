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

  //Nom vaccin
  $title=trim(strip_tags($_POST['vaccin']));
  $error=validationText($error,$title,2,50,'titrevaccin');

  //Date
  $date=trim(strip_tags($_POST['date']));
  $error=validationdate($error,$date,'date');

  //reaction
  $reaction=trim(strip_tags($_POST['reaction']));
  $error=validationText($error,$reaction,0,100,'reaction');

  if(count($error)==0){
    updateinfovacinn($infovaccin,$date,$reaction);
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
       <input type="text" name="vaccin" value="<?php echo $nomduvaccin ; ?>" disabled>
       <input type="date" name="date" value="<?php echo $date; ?>">.
       <input type="text" name="reaction" value="<?php echo $infovaccin['reaction']; ?>">
       <input type="submit" name="submitted" value="Mettre à jour vos informations">
     </form>
   </div>
 </div>
