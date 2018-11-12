<?php
$pagename="statistique";
include 'inc/pdo.php';
include 'inc/function.php';
include 'inc/request.php';
isLogged();
if(isAdmin()){

}
else{
  die('403');
}

include ('inc/header_back.php');
 ?>

<div class="content">
  <div class="container-fluid">
    <div class="row">

      <!-- Carte statistique global user -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-header card-chart card-header-warning text-center">
            <div class="ct-chart"><i class="material-icons">accessibility_new</i>Utilisateurs</div>
          </div>
          <div class="card-body">
            <h4 class="card-title ">Nombre d'utilisateurs en temps réel</h4>
            <p class="card-category"><span class="text-success"><i class="material-icons text-warning">account_circle</i></span> <?php echo countinscrit(); ?> compte(s) inscrit(s).</p>
            <p class="card-category"><span class="text-success"><i class="material-icons text-danger">gavel</i></span><?php echo countadmin(); ?> Administrateur(s).</p>
            <p class="card-category"><span class="text-success"><i class="material-icons text-sucess">face</i></span><?php echo countuser(); ?> Utilisateur(s).</p>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">access_time</i>dernière utilisateur créée le <span class="text-success"> <?php echo lastsign(); ?></span>
            </div>
          </div>
        </div>
      </div>

      <!-- Carte statistique global vaccins -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-header card-chart card-header-success text-center">
            <div class="ct-chart"><i class="material-icons">healing</i>Vaccins</div>
          </div>
          <div class="card-body">
            <h4 class="card-title ">Nombre de vaccins en temps réel</h4>
            <p class="card-category"><span class="text-success"><i class="material-icons text-info">healing</i></span><?php echo countvaccins(); ?> Vaccins en base de données.</p>
            <p class="card-category"><span class="text-success"><i class="material-icons text-sucess">healing</i></span><?php echo countmandatoryvaccins(); ?> Vaccins obligatoire en base de données.</p>
            <p class="card-category"><span class="text-success"><i class="material-icons text-warning">healing</i></span><?php echo countrecommendedvaccins(); ?> Vaccins recommandé en base de données.</p>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">access_time</i>dernier vaccins mise en base de données le: <span class="text-success"> <?php echo lastvaccin(); ?></span>
            </div>
          </div>
        </div>
      </div>

      <!-- Carte statistique modération global -->
      <div class="col-md-6">
        <div class="card">
          <div class="card-header card-chart card-header-danger text-center">
            <div class="ct-chart"><i class="material-icons">gavel</i>Modération</div>
          </div>
          <div class="card-body">
            <h4 class="card-title ">Modération en temps réel</h4>
            <p class="card-category"><span class="text-success"><i class="material-icons text-green">account_circle</i></span><?php echo countconnect() ?> Utilisateurs connecté(s).</p>
            <p class="card-category"><span class="text-success"><i class="material-icons text-danger">clear</i></span><?php echo countdisconnect(); ?> Utilisateurs déconnecté(s).</p>
            <p class="card-category"><span class="text-success"><i class="material-icons text-warning">gavel</i></span><?php echo countbanned(); ?> Utilisateurs banni(s).</p>
          </div>
        </div>
      </div>

    </div>
  </div>


<?php
include 'inc/footer_back.php';
 ?>
