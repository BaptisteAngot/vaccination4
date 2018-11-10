<?php
$pagename="vaccins";
include('inc/pdo.php');
include('inc/function.php');
include('inc/request.php');
include('inc/header_back.php');

$select=array(
  'Obligatoire' => 'Obligatoire',
  'Recommandé' => 'Recommandé'
);
$error=array();
if(!empty($_POST['submitted'])){
  //faille XSS

  //Champ nom
  $name=trim(strip_tags($_POST['nomvaccin']));
  $error=validationText($error,$name,2,50,'nomvaccin');

  //Champ description
  $desc=trim(strip_tags($_POST['description']));
  $error=validationText($error,$desc,2,255,'description');

  //age
  $age=trim(strip_tags($_POST['age']));
  $error=validationChiffre($error,$age,'age');

  //dosage
  $dosage=trim(strip_tags($_POST['dosage']));
  $error=validationChiffre($error,$dosage,'dosage');

  $status=trim(strip_tags($_POST['status']));
  $error=validationText($error,$status,2,50,'status');

  //status
  $condition=trim(strip_tags($_POST['condition']));
  $error=validationText($error,$condition,2,50,'condition');

  if(count($error)==0){
    envoyerinfovaccin($name,$desc,$age,$dosage,$status,$condition);
    header('Location: vaccins_back.php');
  }
}
?>

<div class="content">
  <div class="container-fluid">
      <div class="card">
        <div class="card-header card-header-info text-center">
          <h4>Insertion d'un nouveau vaccin:</h4>
        </div>
          <div class="card-body">
            <!-- Formulaire d'ajout d'un nouveau vaccin -->
            <form class="" method="post">
                <!-- Champs nom du vaccin -->
                <div class="form-group label-floating">
                 <label for="nomvaccin" class="bmd-label-floating">Nom du vaccin</label>
                 <input type="text" class="form-control" id="exampleInput1" name="nomvaccin" value="<?php if(!empty($_POST['nomvaccin'])){echo $_POST['nomvaccin'];} ?>">
                 <span class="bmd-help"><?php if(!empty($error['nomvaccin'])){echo $error['nomvaccin'];}else echo "Veuillez saisir un nom à votre vaccin."?></span>
                </div>
                <!-- Champs description du vaccin -->
                <div class="form-group">
                  <label for="description">Saisir une description à ce vaccin</label>
                  <textarea class="form-control" id="description" rows="3" name="description"><?php if(!empty($_POST['description'])){echo $_POST['description'];}?></textarea>
                  <span class="bmd-help"><?php if(!empty($error['nomvaccin'])){echo $error['description'];}else echo "Veuillez saisir une description."?></span>
              </div>
              <!-- Champs age pour faire le vaccin -->
              <div class="form-group">
                 <label for="age" class="bmd-label-floating">Veuillez saisir l'age où l'on doit faire le vaccin</label>
                 <input type="number" class="form-control" id="age" name="age" value="<?php if(!empty($_POST['age'])){echo $_POST['age'];}?>"
                 <span class="bmd-help"><?php if(!empty($error['nomvaccin'])){echo $error['age'];}else echo "Veuillez saisir un age sous forme de chiffre."?></span>
              </div>
              <!-- Champs dosage de ce vaccin -->
              <div class="form-group">
                 <label for="dosage" class="bmd-label-floating">Dosage du vaccin</label>
                 <input type="float" class="form-control" id="dosage" name="dosage" value="<?php if(!empty($_POST['dosage'])){echo $_POST['dosage'];}?>"
                 <span class="bmd-help"><?php if(!empty($error['nomvaccin'])){echo $error['dosage'];}else echo "Veuillez saisir un dosage sous forme de chiffre."?></span>
              </div>
              <!-- Champ status -->
              <div class="form-group">
                <label for="status">Statut:</label>
                <select class="form-control" id="status" name="status">
                  <?php
                  foreach ($select as $sel) {
                      echo '<option>' . $sel . '</option>';
                    }
                   ?>
                </select>
              </div>
              <!-- Condition requise -->
              <div class="form-group">
                 <label for="condition" class="bmd-label-floating">Condition requise pour faire le vaccin</label>
                 <input type="text" class="form-control" id="condition" name="condition" value="<?php if(!empty($_POST['condition'])){echo $_POST['condition'];}?>">
                 <span class="bmd-help"><?php if(!empty($error['condition'])){echo $error['condition'];}else echo "Veuillez saisir une condition."?></span>
              </div>
              <!-- Submit -->
              <div class="form-group text-center">
                <input type="submit" class="btn btn-info" name="submitted" value="Envoyer">
              </div>
            </form>
        </div>
      </div>
  </div>
</div>

<?php include('inc/footer_back.php') ?>
