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
    echo '<td>' . $vaccin['age'] . '</td>';
    echo '<td>' . $vaccin['dosage'] . '</td>';
    echo '<td>' . transformdate($vaccin) . '</td>';
    echo '<td>' . $vaccin['status'] . '</td>';
    echo '<td class="text-info">' . $vaccin['condition_requise'] . '</td>';
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
              echo '<th> Date </th>';
              echo '<th> Status </th>';
              echo '<th> condition_requise </th>';
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
