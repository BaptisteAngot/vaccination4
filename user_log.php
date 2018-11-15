<?php
include 'inc/pdo.php';
include 'inc/function.php';
include 'inc/request.php';
include 'inc/header.php';
$vaccinsexistants= recuperationlistevaccin();

$error=array();
//Vérification USER exist
$iduser=$_SESSION['user']['id'];

$listevaccinfromiduser=recupvaccinsfromid($iduser);

if(!empty($_SESSION['user']['id'])){

}
else{
  header('Location page403.php');
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
    $error=validationText($error,$reaction,0,100,'reaction',false);


    $idtitle=returnidfromvname($title,$vaccinsexistants);
    if(count($error)==0){
      insertvaccinfromid($idtitle,$iduser,$date,$reaction);
      header('Location: user_log.php');
    }
  }


 ?>
 <div class="wrap">

   <div class="userlog">

     <div class="myvaccin">
       <h1>Liste de vos différents vaccins</h1>
       <table>
         <thead class="thead">
           <th>Nom du vaccin</th>
           <th>Date de vaccination: </th>
           <th>Commentaire: </th>
           <th>Edit :</th>
           <th align="center">Supprimer :</th>
         </thead>
         <tbody>
           <?php
           foreach ($listevaccinfromiduser as $vaccin) {
             echo '<tr>';
             echo '<td>' .$vaccin['nom'] . '</td>';
             echo '<td align="center">' .date("d-m-Y",strtotime($vaccin['date'])) . '</td>';
             echo '<td align="center">' . $vaccin['reaction'] . '</td>';
             echo '<td align="center"> <a href="editvaccinuser.php?id='.$vaccin['id'].'"> Modifier votre vaccin</a> </td>';
             echo '<td align="center"> <a onclick="return confirm(\'Êtes vous sûr?\')" href="deletevaccinfromuser.php?id='.$vaccin['id'].'">Delete</a> </td>';
             echo '</tr>';
           }
           ?>
         </tbody>
       </table>
     </div>
     <div class="clear"></div>
     <div class="newvaccin">
       <form class="formnewvaccin" method="post">
         <h1>Ajout d'un nouveau vaccin</h1>
         <label class="label" for="vaccin">Votre vaccin a ajouté: </label>
         <!-- Champs select -->
         <div class="select">
           <select class="" name="vaccin">
             <?php foreach ($vaccinsexistants as $vaccinexistant) {
               echo '<option>' . $vaccinexistant['nom'] . '</option>';
             } ?>
           </select>
         </div>
         <!-- Champs Date -->
         <label class="label" for="date">Date de votre vaccin:</label>
         <input type="date" name="date" value="">
         <?php afficherErreur($error,'date') ;?>
         <!-- Champs reaction -->
         <label class="label" for="reaction">Une réaction ?</label>
         <input type="text" name="reaction" value="">
         <br>
         <span>Si aucune, veuillez laisser ce champs vide.</span>
         <input type="submit" name="submitted" value="Ajouter à ma liste des vaccins">
       </form>
     </div>
     <div class="clear"></div>

   <div class="clear"></div>
 </div>
<div class="clear"></div>
 <?php include 'inc/footer.php'; ?>
