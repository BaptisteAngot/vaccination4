<?php
$pagename="vaccins";
include('inc/pdo.php');
include('inc/function.php');
include('inc/request.php');
include('inc/header_back.php');

$error=array();
$status=array(
  'Obligatoire' => 'Obligatoire',
  'Recommandé' => 'Recommandé'
);
if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $data=recovervaccindata($id);
    if(!empty($data)){
      if ( !empty($_POST['submitted']) ){
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

        //status
        $status=trim(strip_tags($_POST['status']));
        $error=validationText($error,$status,2,50,'status');

        //Condition
        $condition=trim(strip_tags($_POST['condition']));
        $error=validationText($error,$condition,2,50,'condition');

        if(count($error)==0){
          updatevaccindata($id,$name,$desc,$age,$dosage,$status,$condition);
          header("Location: vaccins_back.php");
        }
      }
    }
}
?>

<div class="content">
  <div class="container-fluid">
      <div class="card">
        <div class="card-header card-header-info text-center">
          <h4>Modification d'un vaccin:</h4>
        </div>
          <div class="card-body">
            <!-- Formulaire d'edit d'un vaccin -->
            <form class="" method="post">
                <!-- Champs nom du vaccin -->
                <div class="form-group label-floating">
                 <label for="nomvaccin" class="bmd-label-floating">Nom du vaccin</label>
                 <input type="text" class="form-control" id="exampleInput1" name="nomvaccin" value="<?php if(!empty($data['nom'])){echo $data['nom'];} ?>">
                 <span class="bmd-help"><?php if(!empty($error['nomvaccin'])){echo $error['nomvaccin'];}else echo "Nom de votre vaccin à modifier."?></span>
                </div>
                <!-- Champs description du vaccin -->
                <div class="form-group">
                  <label for="description">Saisir une description à ce vaccin</label>
                  <textarea class="form-control" id="description" rows="3" name="description"><?php if(!empty($data['description'])){echo $data['description'];} ?></textarea>
                  <span class="bmd-help"><?php if(!empty($error['nomvaccin'])){echo $error['description'];}else echo "Veuillez saisir une description."?></span>
              </div>
              <!-- Champs age pour faire le vaccin -->
              <div class="form-group">
                 <label for="age" class="bmd-label-floating">Veuillez saisir l'age où l'on doit faire le vaccin</label>
                 <input type="number" class="form-control" id="age" name="age" value="<?php if(!empty($data['age'])){echo $data['age'];} ?>"
                 <span class="bmd-help"><?php if(!empty($error['nomvaccin'])){echo $error['age'];}else echo "Veuillez saisir un age sous forme de chiffre."?></span>
              </div>
              <!-- Champs dosage de ce vaccin -->
              <div class="form-group">
                 <label for="dosage" class="bmd-label-floating">Dosage du vaccin</label>
                 <input type="float" class="form-control" id="dosage" name="dosage" value="<?php if(!empty($data['dosage'])){echo $data['dosage'];} ?>"
                 <span class="bmd-help"><?php if(!empty($error['nomvaccin'])){echo $error['dosage'];}else echo "Veuillez saisir un dosage sous forme de chiffre."?></span>
              </div>
              <!-- Champ status -->
              <div class="form-group">
                <label for="status">Statut:</label>
                <select class="form-control" id="status" name="status">
                  <?php
                  foreach ($status as $statu) {
                      echo '<option>' . $statu . '</option>';
                    }
                   ?>
                </select>
              </div>
              <!-- Condition requise -->
              <div class="form-group">
                 <label for="condition" class="bmd-label-floating">Condition requise pour faire le vaccin</label>
                 <input type="text" class="form-control" id="condition" name="condition" value="<?php if(!empty($data['condition_requise'])){echo $data['condition_requise'];} ?>">
                 <span class="bmd-help"><?php if(!empty($error['condition'])){echo $error['condition'];}else echo "Veuillez saisir une condition.";?></span>
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
<?php include('inc/footer_back.php'); ?>
