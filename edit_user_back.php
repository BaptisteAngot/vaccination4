<?php
$pagename="users";
include('inc/pdo.php');
include('inc/function.php');
include('inc/request.php');
include('inc/header_back.php');
$error=array();
$status=array(
  'Connecté' => 'Connecté',
  'Déconnecté' => 'Déconnecté',
  'Banni' => 'Banni'
);
$roles=array(
  'admin' => 'admin',
  'user' => 'user'

);

if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];
  $data=recoveruserdata($id);
  if(!empty($data)){
    if ( !empty($_POST['submitted']) ){
      //Faille XSS

      //Champ login
      $login=trim(strip_tags($_POST['nameuser']));
      $error=validationText($error,$login,2,50,'nameuser');

      //Champ status
      $status=trim(strip_tags($_POST['status']));
      $error=validationText($error,$status,2,50,'status');

      //Champ role
      $role=trim(strip_tags($_POST['role']));
      $error=validationText($error,$role,2,50,'role');

      //Champ mail
      $mail=trim(strip_tags($_POST['email']));
      $error=vmail($error,$mail,'email');

      // echo count($error);
      // pre($error);

      if(count($error)==0){
        updateuserdata($id,$login,$status,$role,$mail);
        header("Location: users_back.php");
      }

    }
  }
}
 ?>
<div class="content">
  <div class="container-fluid">
    <div class="card">
      <div class="card-header card-header-info text-center">
        <h4>Modification d'un utilisateur:</h4>
      </div>
      <div class="card-body">
        <!-- Formulaire d'edition d'un utilisateur existant -->
        <form class="" method="post">
          <!-- Champs login -->
          <div class="form-group label-floating">
            <label for="nameuser" class="bmd-label-floating">Login de l'utilisateur</label>
            <input type="text" class="form-control" id="nameuser" name="nameuser" value="<?php if(!empty($data['pseudo'])){echo $data['pseudo'];} ?>">
            <span class="bmd-help"><?php if(!empty($error['login'])){echo $error['login'];}else echo "Nom de votre utilisateurs à modifier."?></span>
          </div>
          <!-- Champs status -->
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
          <!-- Champs role -->
          <div class="form-group">
            <label for="role">Role:</label>
            <select class="form-control" id="role" name="role">
              <?php
              foreach ($roles as $role) {
                  echo '<option>' . $role . '</option>';
                }
               ?>
            </select>
          </div>
          <!-- Champs mail -->
          <div class="form-group label-floating">
             <label for="email" class="bmd-label-floating">Email du l'utilisateur</label>
             <input type="text" class="form-control" id="email" name="email" value="<?php if(!empty($data['email'])){echo $data['email'];} ?>">
             <span class="bmd-help"><?php if(!empty($error['email'])){echo $error['email'];}else echo "Mail de l'utilisateur à modifier."?></span>
          </div>
          <!-- Submit -->
          <!-- <div class="form-group text-center">
            <input type="submit" class="btn btn-info" name="submitted" value="Envoyer">
          </div> -->
          <div class="form-group text-center">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
              Envoyer
            </button>
          </div>

                    <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Êtes vous sûr ?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Êtes vous sûr de vouloir modifier ces différents champs ?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  <input type="submit" class="btn btn-info" name="submitted" value="Envoyer">
                </div>
              </div>
            </div>
          </div>


        </form>
      </div>
    </div>
  </div>
</div>
<?php include('inc/footer_back.php'); ?>
