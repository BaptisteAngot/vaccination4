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
              <div class="form-group">
               <label for="nomvaccin" class="bmd-label-floating">Nom du vaccin</label>
               <input type="text" class="form-control" id="exampleInput1">
               <span class="bmd-help">Veuillez saisir un nom à votre vaccin.</span>
              </div>
              <!-- Champs description du vaccin -->
              <div class="form-group">
                <label for="description">Saisir une description à ce vaccin</label>
                <textarea class="form-control" id="description" rows="3"></textarea>
            </div>
            <!-- Champs age pour faire le vaccin -->
            <div class="form-group">
               <label for="age" class="bmd-label-floating">Veuillez saisir l'age où l'on doit faire le vaccin</label>
               <input type="number" class="form-control" id="age">
            </div>
            <!-- Champs dosage de ce vaccin -->
            <div class="form-group">
               <label for="dosage" class="bmd-label-floating">Dosage du vaccin</label>
               <input type="float" class="form-control" id="dosage">
            </div>
            <!-- Champ status -->
            <div class="form-group">
              <label for="status">Statut:</label>
              <select class="form-control" id="status">
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
               <input type="text" class="form-control" id="exampleInput1">
            </div>
            <!-- Submit -->
            <div class="form-group text-center">
              <input type="submit" class="btn btn-info" onclick="md.showNotification('top','right')" name="submitted" value="Envoyer">
            </div>
            </form>
        </div>
      </div>
  </div>
</div>

<?php include('inc/footer_back.php') ?>
