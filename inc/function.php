<?php

function pre($array){
  echo '<pre>';
  print_r($array);
  echo '</pre>';
}

function afficherelement($element,$pagename){
  echo '<li ';
  if($element[0] == $pagename ){
    echo 'class= "nav-item active">';
  }
  else{
    echo 'class= "nav-item">';
  }
  echo '<a class= "nav-link" href='.$element[1].'>';
  echo '<i class="material-icons">' .$element[2]. '</i>';
  echo '<p>' . $element[3] . '</p>';
  echo '</a>';
  echo '</li>';
}
function Afficherinfovaccins($vaccin){
  echo '<tr>';
    echo '<td>' . $vaccin['nom'] . '</td>';
    echo '<td>' . $vaccin['description'] . '</td>';
    echo '<td>' . $vaccin['limit_age'] . '</td>';
    echo '<td>' . $vaccin['dosage'] . '</td>';
    echo '<td>' . $vaccin['status'] . '</td>';
    echo '<td class="text-info">' . $vaccin['condition_requise'] . '</td>';
    echo '<td>' . date("d-m-Y",strtotime($vaccin['created_at'])) . '</td>';
    echo '<td>'. date("d-m-Y",strtotime($vaccin['updated_at'])) . '</td>';
    echo '<td><a href="editvaccin.php?id=' . $vaccin['id'] . '"><i class="material-icons">edit</i></a></td>';
    echo '<td><a href="deletevaccin.php?id=' . $vaccin['id'] . '"><i class="material-icons">delete</i></a></td>';
  echo '</tr>';
}

function Affichertableauvaccin($vaccins,$title,$description){
  echo '<div class="col-md-12">';
    echo '<div class="card">';
      echo '<div class="card-header card-header-info">';
        echo '<h4 class="card-title ">' . $title . '</h4>';
        echo '<p class="card-category">' . $description . '</p>';
      echo '</div>';
      echo '<div class="card-body">';
        echo '<div class="table-responsive">';
          echo '<table class="table">';
            echo '<thead class=" text-info">';
              echo '<th> Nom </th>';
              echo '<th> Description </th>';
              echo '<th> Age </th>';
              echo '<th> Dosage </th>';
              echo '<th> Status </th>';
              echo '<th> Condition requise </th>';
              echo '<th> Créer le: </th>';
              echo '<th> Modifier le: </th>';
              echo '<th> Edit </th>';
              echo '<th> Delete </th>';
            echo '</thead>';
            echo '<tbody>';
              foreach ($vaccins as $vaccin) {
                Afficherinfovaccins($vaccin);
              }
            echo '</tbody>';
          echo '</table>';
        echo '</div>';
      echo '</div>';
    echo '</div>';
  echo '</div>';

}

function br()
{
  echo '<br />';
}

function debug($array)
{
  echo '<pre>';
    print_r($array);
  echo '</pre>';
}
function labelText($name, $title, $resultat)
{
  echo '<label for="'.$name.'">'.$title.'</label>';
  br();
  echo '<input type="text" name="'.$name.'" value="';
  if(!empty($resultat[$name])){
    echo $resultat[$name];
    // foreach ($resultat as $key) {
    //   echo $key[$name];
    // }
  }
  echo '">';
}

function labelEmail($name, $title, $resultat)
{
  echo '<label for="'.$name.'">'.$title.'</label>';
  br();
  echo '<input type="email" name="'.$name.'" value="';
  if(!empty($resultat[$name])){
    echo $resultat[$name];

  }
  echo '">';
}

function labelPassword($name, $title, $resultat)
{
  echo '<label for="'.$name.'">'.$title.'</label>';
  br();
  echo '<input type="password" name="'.$name.'" value="';
  if(!empty($resultat[$name])){
    echo $resultat[$name];

  }
  echo '">';
}

function afficherErreur($error, $name)
{
  echo '<span class="error">';
    if (!empty($error[$name])) {
        echo $error[$name];
     }
  echo '</span>';

}



function labelTextArea($name, $title, $rows, $cols)
{
  echo '<label for="'.$name.'">'.$title.'</label>';
  br();
  echo '<textarea name="'.$name.'" rows="'.$rows.'" cols="'.$cols.'"></textarea>';
}
function inputButton($value)
{
  echo '<input type="submit" name="submitted" value="'.$value.'">';
}
function validationTexte($error, $data, $min, $max, $key, $empty = true){
if (!empty($data)){
    if(strlen($data) < $min ) {
      $error[$key] = 'trop court.';
    } elseif(strlen($key) > $max) {
      $error[$key] = 'trop long.';
    }
} else {
  if ($empty) {
    $error[$key] = 'Veuillez renseignez ce champ';
  }
}
  return $error;
}

//Fonction pour vérifier une date
function validationdate($error,$date,$key,$empty = true){
  $newdate  = explode('-', $date);
  if (count($newdate) == 3) {
    if (!checkdate($newdate[1], $newdate[2], $newdate[0])) {
      //problem
      $error[$key]='Probleme de date';
    }
  }
  else {
    // problem with input ...
    $error[$key]='Probleme de format';
  }
  return $error;
}

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function validationpseudo($error,$pseudo,$min,$max,$empty = true){
  if (!empty($pseudo)) {
    if(strlen($pseudo)<$min){
      $error['pseudo']= 'minimum '.$min .' caractères';
    }
    elseif (strlen($pseudo)>$max) {
      $error['pseudo']= 'maximum '.$max.' caractères';
    }
    else{
      //Verification si idverif existe déjà
        //Selection de $idverif de $table de la $bdd
        $resultat=verifuser($pseudo);
        if(!empty($resultat)){
          $error['pseudo']='Pseudo déjà utilisé';
        }
    }
  }
  else{
    if($pseudo){
      $error['pseudo']='veuillez renseigner ce champ';
    }
  }
    return $error;
}

function validationemail($error,$mail,$empty=true){
  global $pdo;
  if(!empty($mail)){
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)){
      $resultatmail= verifmail($mail);
        if(!empty($resultatmail)){
          $error['mail']='Mail déjà utilisé';
        }
    } else {
      $error['mail'] = ' mail invalide';
    }
  }
  else {
    $error['mail'] = 'Erreur : mail vide';
  }
  return $error;
}

function validationpassword($error,$password1,$password2,$min,$max,$empty = true){
    global $pdo;
    if (!empty($password1)) {
      if($password1 != $password2){
        $error['password'] = 'Erreur: Veuillez saisir le même mot de passe';
      }
      elseif(strlen($password1)<$min){
        $error['password']= 'minimum '.$min .' caractères';
      }
      elseif (strlen($password1)>$max) {
        $error['password']= 'maximum '.$max.' caractères';
      }
      else{
        //Verification si idverif existe déjà
          //Selection de $idverif de $table de la $bdd
          $resultatpassword=verifpassword($password1);
          if(!empty($resultatpassword)){
            $error['password']='Pseudo déjà utilisé';
          }
      }
    }
    else {
      $error['password'] = 'Erreur : password vide';
  }
}

function transformdate($date){
  $newdate= date("d-m-Y", strtotime($date['created_at']));
  return $newdate;
}

function validationText($error,$data,$min,$max,$key,$empty = true){
  if(!empty($data)){
    if(strlen($data)<$min){
      $error[$key]= 'Minimum '.$min .' caractères';
    }
    elseif (strlen($data)>$max) {
      $error[$key]= 'Maximum '.$max.' caractères';
    }
  }
  else{
    if($empty){
      $error[$key]='Veuillez renseigner ce champ';
    }
  }
  return $error;
}

function vmail($error,$data,$key){
  if(!empty($data)){
    if(!filter_var($data,FILTER_VALIDATE_EMAIL)){
      $error[$key]= 'Cette adresse mail n\'est pas valide.';
    }
  }
  else{
    if($empty){
      $error[$key]='Veuillez renseigner ce champ';
    }
  return $error;
  }
}
function validationChiffre($error,$data,$key,$empty = true){
  if(!empty($data)){
    if(!is_numeric($data)){
      $error[$key]= 'Ce champ veuillez saisir un chiffre';
    }
  }
  else{
    if($empty){
      $error[$key]='Veillez renseigner ce champ';
    }
  }
  return $error;
}

//Fonction pour afficher des infos d'un user
function Afficherinfo($user){

  echo '<tr>';
    echo '<td>' . $user['id'] . '</td>';
    echo '<td>' . $user['pseudo'] . '</td>';
    echo '<td>' . $user['status'] . '</td>';
    echo '<td>' . $user['email'] . '</td>';
    echo '<td>' . $user['role'] . '</td>';
    echo '<td>' . date("d-m-Y",strtotime($user['created_at'])) . '</td>';
    echo '<td>' . date("d-m-Y",strtotime($user['modified_at'])) . '</td>';
    echo '<td><a class="material-icons" href="edit_user_back.php?id=' . $user['id'] . '"><i class="material-icons">edit</i></a></td>';
    echo '<td><a href="deleteuser_back.php?id=' . $user['id'] . '"><i class="material-icons">delete</i></a></td>';
    echo '</tr>';
}

//Fonction pour afficher le tableau avec tout les utilisateurs
function Affichertableauuser($users,$title,$description){
  echo '<div class="col-md-12">';
    echo '<div class="card">';
      echo '<div class="card-header card-header-info">';
        echo '<h4 class="card-title ">' . $title . '</h4>';
        echo '<p class="card-category">' . $description . '</p>';
      echo '</div>';
      echo '<div class="card-body">';
        echo '<div class="table-responsive">';
          echo '<table class="table">';
            echo '<thead class=" text-info">';
              echo '<th> ID </th>';
              echo '<th> Login </th>';
              echo '<th> Status </th>';
              echo '<th> Email: </th>';
              echo '<th> Rôle </th>';
              echo '<th> Date de création </th>';
              echo '<th> Dernière modification </th>';
              echo '<th> Edit </th>';
              echo '<th> Delete </th>';
            echo '</thead>';
            echo '<tbody>';
              foreach ($users as $user) {
                Afficherinfo($user);
              }
            echo '</tbody>';
          echo '</table>';
        echo '</div>';
      echo '</div>';
    echo '</div>';
  echo '</div>';
}

function isAdmin()
{
  if (isLogged()) {
    if ($_SESSION['user']['role'] == 'admin') {
      return TRUE;
    }
  }
  return FALSE;
}
function isLogged()
{
  if (!empty($_SESSION['user']['id']) && !empty($_SESSION['user']['pseudo']) && !empty($_SESSION['user']['email']) && !empty($_SESSION['user']['role']) && !empty($_SERVER['REMOTE_ADDR'])) {
    if (is_numeric($_SESSION['user']['id'])) {
      if ($_SESSION['user']['ip'] == $_SERVER['REMOTE_ADDR']) {
        return TRUE;
      }
    }
  }
  return FALSE;
}

function cheminURL()
{
  //header('Location: new_password.php');
  $adresse = "http://".$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
  return $adresse;
}

//test
function returnidfromvname($title,$vaccinsexistants){
  foreach ($vaccinsexistants as $vaccin) {
    if($title == $vaccin['nom']){
      return $vaccin['id'];
    }
  }
}
