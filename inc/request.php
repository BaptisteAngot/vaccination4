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

  $sql="DELETE * FROM vaccin WHERE id=:id";
  $query = $pdo -> prepare($sql);
  $query ->bindValue(':id',$id, PDO::PARAM_INT);
  $query -> execute();
}
//Fonction pour effacer un utilisateur en fonction de son id
function deleteuser($id){
  global $pdo;

  $sql="DELETE * FROM user WHERE id=:id";
  $query = $pdo ->prepare($sql);
  $query -> bindValue(':id',$id,PDO::PARAM_INT);
  $query -> execute();
}

//Fonction pour récupérer les données d'un vaccin en fonction d'un id
function recovervaccindata($id){
  global $pdo;

  $sql ="SELECT id,nom, description, age, dosage, created_at, status, condition_requise FROM vaccin WHERE id=$id";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $resultat = $query -> fetch();
  return $resultat;
}

//Fonction pour récupérer les données d'un user en fonction de son id
function recoveruserdata($id){
  global $pdo;

  $sql="SELECT id,login,status,role,email FROM user WHERE id=$id";
  $query= $pdo->prepare($sql);
  $query -> execute();
  $resultat = $query ->fetch();
  return $resultat;
}

//Envois toutes les infos d'un vaccin
function envoyerinfovaccin($name,$desc,$age,$dosage,$status,$condition){
  global $pdo;
  $sql= "INSERT INTO vaccin(nom,description,age,dosage,created_at,status,condition_requise) VALUES (:name,:description,:age,:dosage,NOW(),:status,:condition_requise)";

  $query=$pdo->prepare($sql);
  $query->bindValue(':name',$name,PDO::PARAM_STR);
  $query->bindValue(':description',$desc,PDO::PARAM_STR);
  $query->bindValue(':age',$age,PDO::PARAM_INT);
  $query->bindValue(':dosage',$dosage,PDO::PARAM_INT);
  $query->bindValue(':status',$status,PDO::PARAM_STR);
  $query->bindValue(':condition_requise',$condition,PDO::PARAM_STR);
  $query->execute();
}

//fonction qui met à jour la table vaccin en fonction d'un id
function updatevaccindata($id,$name,$desc,$age,$dosage,$status,$condition){
  global $pdo;

  $sql ="UPDATE vaccin SET nom=:name,description=:desc,age=:age,dosage=:dosage,status=:status, condition_requise=:condition, updated_at=NOW() WHERE id=:id";

  $query = $pdo->prepare($sql);
  $query ->bindValue(':name',$name, PDO::PARAM_STR);
  $query ->bindValue(':desc',$desc, PDO::PARAM_STR);
  $query ->bindValue(':age',$age, PDO::PARAM_INT);
  $query ->bindValue(':dosage',$dosage, PDO::PARAM_INT);
  $query ->bindValue(':status',$status, PDO::PARAM_STR);
  $query ->bindValue(':condition',$condition, PDO::PARAM_STR);
  $query ->bindValue(':id',$id, PDO::PARAM_INT);
  $query->execute();
}

//fonction qui met à jour la table user en fonction d'un id d'utlisateur
function updateuserdata($id,$login,$status,$role,$mail){
  global $pdo;

  $sql="UPDATE user SET login=:login,status=:status,role=:role,mail=:mail,updated_at=NOW() WHERE id=:id";
  $query=$pdo->prepare($sql);
  $query -> bindValue(':login',$login,PDO::PARAM_STR);
  $query -> bindValue(':status',$status,PDO::PARAM_STR);
  $query -> bindValue(':role',$role,PDO::PARAM_STR);
  $query -> bindValue(':mail',$mail,PDO::PARAM_STR);
  $query ->bindValue(':id',$id, PDO::PARAM_INT);
  $query->execute();
}


//Fonction qui retourne la liste de tout les users
function returnusers(){
  global $pdo;

  $sql= "SELECT * FROM user";
  $query=$pdo->prepare($sql);
  $query->execute();
  $users=$query->fetchAll();
  return $users;
}
