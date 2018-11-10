<?php
// Fonction pour compter le nombre total d'inscrit
function countinscrit(){
  global $pdo;

  $sql = "SELECT COUNT(id) FROM user";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $nbid=$query->fetch();
  return $nbid['COUNT(id)'];
}

// Fonction pour compter le nombre total d'admin
function countadmin(){
  global $pdo;

  $sql= "SELECT COUNT(role) FROM user WHERE role='admin'";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $nbidadmin=$query->fetch();
  return $nbidadmin['COUNT(role)'];
}

// Fonction pour compter le nombre total d'utilisateur
function countuser(){
  global $pdo;

  $sql= "SELECT COUNT(role) FROM user WHERE role='user'";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $nbiduser=$query->fetch();
  return $nbiduser['COUNT(role)'];
}

//Fonction pour afficher la date du dernier utilisateur inscrit
function lastsign(){
  global $pdo;
  $sql= "SELECT created_at FROM user ORDER BY created_at ASC";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $lastuser=$query->fetch();
  $newdate= date("d-m-Y", strtotime($lastuser['created_at']));
  return $newdate;
}

//Fonction pour compter le nombre de vaccins dans la BDD
function countvaccins(){
  global $pdo;
  $sql = "SELECT COUNT(id) FROM vaccin";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $nbvaccins=$query->fetch();
  return $nbvaccins['COUNT(id)'];
}
//Fonction pour compter le nombre de vaccins obligatoire
function countmandatoryvaccins(){
  global $pdo;
  $sql= "SELECT COUNT(status) FROM vaccin WHERE status='Obligatoire'";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $nbvaccinsobligatoire=$query->fetch();
  return $nbvaccinsobligatoire['COUNT(status)'];
}

// Fonction pour compter le nombre de vaccins recommandé
function countrecommendedvaccins(){
  global $pdo;
  $sql= "SELECT COUNT(status) FROM vaccin WHERE status='Recommandé'";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $nbvaccinsobligatoire=$query->fetch();
  return $nbvaccinsobligatoire['COUNT(status)'];
}

//Fonction pour afficher la date du dernier vaccins inscrit en BDD
function lastvaccin(){
  global $pdo;
  $sql= "SELECT created_at FROM vaccin ORDER BY created_at ASC";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $lastvaccin=$query->fetch();
  $newdate= date("d-m-Y", strtotime($lastvaccin['created_at']));
  return $newdate;
}


//Fonction qui compte de nombre de personne connecté
function countconnect(){
  global $pdo;
  $sql = "SELECT COUNT(status) FROM user WHERE status='Connecté'";
  $query = $pdo->prepare($sql);
  $query -> execute();
  $nbconnect=$query->fetch();
  return $nbconnect['COUNT(status)'];
}

// Fonction compte le nombre de personne deconnecté
function countdisconnect(){
  global $pdo;
  $sql = "SELECT COUNT(status) FROM user WHERE status='Deconnecté'";
  $query = $pdo->prepare($sql);
  $query -> execute();
  $nbdisconnect=$query->fetch();
  return $nbdisconnect['COUNT(status)'];
}

//Fonction qui compte le nombre d'utilisateurs banni
function countbanned(){
  global $pdo;
  $sql = "SELECT COUNT(status) FROM user WHERE status='Banni'";
  $query = $pdo->prepare($sql);
  $query -> execute();
  $nbban=$query->fetch();
  return $nbban['COUNT(status)'];
}

// Fonction qui retourne la liste de tout les vaccins
function returnvaccins(){
  global $pdo;
  $sql= "SELECT * FROM vaccin";
  $query=$pdo->prepare($sql);
  $query->execute();
  $vaccins=$query->fetchAll();
  return $vaccins;
}

// Fonction pour effacer un vaccin en fonction de son id
function deletevaccin($id){
  global $pdo;

  $sql="DELETE FROM vaccin WHERE id=:id";
  $query = $pdo -> prepare($sql);
  $query ->bindValue(':id',$id, PDO::PARAM_INT);
  $query -> execute();
}
