<?php

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

function labelText($name, $title)
{
  echo '<label for="'.$name.'">'.$title.'</label>';
  br();
  echo '<input type="text" name="'.$name.'" value="';
  if(!empty($_POST[$name])){
    echo $_POST[$name];
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
