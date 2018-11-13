<?php
// Fonction pour compter le nombre total d'inscrit
function countinscrit(){
  global $pdo;

  $sql = "SELECT COUNT(id) FROM v4_user";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $nbid=$query->fetch();
  return $nbid['COUNT(id)'];
}

// Fonction pour compter le nombre total d'admin
function countadmin(){
  global $pdo;

  $sql= "SELECT COUNT(role) FROM v4_user WHERE role='admin'";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $nbidadmin=$query->fetch();
  return $nbidadmin['COUNT(role)'];
}

// Fonction pour compter le nombre total d'utilisateur
function countuser(){
  global $pdo;

  $sql= "SELECT COUNT(role) FROM v4_user WHERE role='user'";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $nbiduser=$query->fetch();
  return $nbiduser['COUNT(role)'];
}

//Fonction pour afficher la date du dernier utilisateur inscrit
function lastsign(){
  global $pdo;
  $sql= "SELECT created_at FROM v4_user ORDER BY created_at ASC";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $lastuser=$query->fetch();
  $newdate= date("d-m-Y", strtotime($lastuser['created_at']));
  return $newdate;
}

//Fonction pour compter le nombre de vaccins dans la BDD
function countvaccins(){
  global $pdo;
  $sql = "SELECT COUNT(id) FROM v4_vaccin";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $nbvaccins=$query->fetch();
  return $nbvaccins['COUNT(id)'];
}
//Fonction pour compter le nombre de vaccins obligatoire
function countmandatoryvaccins(){
  global $pdo;
  $sql= "SELECT COUNT(status) FROM v4_vaccin WHERE status='Obligatoire'";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $nbvaccinsobligatoire=$query->fetch();
  return $nbvaccinsobligatoire['COUNT(status)'];
}

// Fonction pour compter le nombre de vaccins recommandé
function countrecommendedvaccins(){
  global $pdo;
  $sql= "SELECT COUNT(status) FROM v4_vaccin WHERE status='Recommandé'";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $nbvaccinsobligatoire=$query->fetch();
  return $nbvaccinsobligatoire['COUNT(status)'];
}

//Fonction pour afficher la date du dernier vaccins inscrit en BDD
function lastvaccin(){
  global $pdo;
  $sql= "SELECT created_at FROM v4_vaccin ORDER BY created_at ASC";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $lastvaccin=$query->fetch();
  $newdate= date("d-m-Y", strtotime($lastvaccin['created_at']));
  return $newdate;
}


//Fonction qui compte de nombre de personne connecté
function countconnect(){
  global $pdo;
  $sql = "SELECT COUNT(status) FROM v4_user WHERE status='Connecté'";
  $query = $pdo->prepare($sql);
  $query -> execute();
  $nbconnect=$query->fetch();
  return $nbconnect['COUNT(status)'];
}

// Fonction compte le nombre de personne deconnecté
function countdisconnect(){
  global $pdo;
  $sql = "SELECT COUNT(status) FROM v4_user WHERE status='Deconnecté'";
  $query = $pdo->prepare($sql);
  $query -> execute();
  $nbdisconnect=$query->fetch();
  return $nbdisconnect['COUNT(status)'];
}

//Fonction qui compte le nombre d'utilisateurs banni
function countbanned(){
  global $pdo;
  $sql = "SELECT COUNT(status) FROM v4_user WHERE status='Banni'";
  $query = $pdo->prepare($sql);
  $query -> execute();
  $nbban=$query->fetch();
  return $nbban['COUNT(status)'];
}

// Fonction qui retourne la liste de tout les vaccins
function returnvaccins(){
  global $pdo;
  $sql= "SELECT * FROM v4_vaccin";
  $query=$pdo->prepare($sql);
  $query->execute();
  $vaccins=$query->fetchAll();
  return $vaccins;
}



// Fonction pour effacer un vaccin en fonction de son id
function deletevaccin($id){
  global $pdo;

  $sql="DELETE FROM v4_vaccin WHERE id=:id";
  $query = $pdo -> prepare($sql);
  $query ->bindValue(':id',$id, PDO::PARAM_INT);
  $query -> execute();
}
//Fonction pour effacer un utilisateur en fonction de son id
function deleteuser($id){
  global $pdo;

  $sql="DELETE FROM v4_user WHERE id=:id";
  $query = $pdo ->prepare($sql);
  $query -> bindValue(':id',$id,PDO::PARAM_INT);
  $query -> execute();
}

//Fonction pour récupérer les données d'un vaccin en fonction d'un id
function recovervaccindata($id){
  global $pdo;

  $sql ="SELECT id,nom, description, limit_age, dosage, created_at, status, condition_requise FROM v4_vaccin WHERE id=$id";
  $query = $pdo -> prepare($sql);
  $query -> execute();
  $resultat = $query -> fetch();
  return $resultat;
}

//Fonction pour récupérer les données d'un user en fonction de son id
function recoveruserdata($id){
  global $pdo;

  $sql="SELECT id,pseudo,status,role,email, created_at,modified_at,age,nom,prenom FROM v4_user WHERE id=$id";
  $query= $pdo->prepare($sql);
  $query -> execute();
  $resultat = $query ->fetch();
  return $resultat;
}

//Envois toutes les infos d'un vaccin
function envoyerinfovaccin($name,$desc,$age,$dosage,$status,$condition){
  global $pdo;
  $sql= "INSERT INTO v4_vaccin(nom,description,limit_age,dosage,created_at,status,condition_requise) VALUES (:name,:description,:age,:dosage,NOW(),:status,:condition_requise)";

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

  $sql ="UPDATE v4_vaccin SET nom=:name,description=:desc,age=:age,dosage=:dosage,status=:status, condition_requise=:condition, updated_at=NOW() WHERE id=:id";

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

  $sql="UPDATE v4_user SET login=:login,status=:status,role=:role,email=:mail,modified_at=NOW() WHERE id=:id";
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

  $sql= "SELECT * FROM v4_user";
  $query=$pdo->prepare($sql);
  $query->execute();
  $users=$query->fetchAll();
  return $users;
}

//Fonction pour select user bdd
function connect($login_mail,$password){
  global $pdo;

  $sql = "SELECT * FROM v4_user WHERE pseudo = :login_mail OR email = :login_mail";
  $query = $pdo -> prepare($sql);
  $query -> bindValue(':login_mail',$login_mail);
  $query -> execute();
  $user = $query -> fetch();
  return $user;
}

//Fonction pour se register
function register($pseudo,$email,$hash,$token){
  global $pdo;

  $sql = "INSERT INTO v4_user(pseudo, email, password, created_at, token) VALUES (:pseudo, :email, :password, NOW(), :token)";
  $query = $pdo -> prepare($sql);
  $query -> bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
  $query -> bindValue(':email', $email, PDO::PARAM_STR);
  $query -> bindValue(':password', $hash, PDO::PARAM_STR);
  $query -> bindValue(':token', $token, PDO::PARAM_STR);
  $query -> execute();
}

//Fonction pour vérifier si l'idverif est dans la BDD
function verifuser($pseudo){
  global $pdo;
  $sql="SELECT pseudo FROM v4_user WHERE pseudo = :pseudo";
  $query=$pdo->prepare($sql);
  $query->bindValue(':pseudo',$pseudo,PDO::PARAM_STR);
  $query->execute();
  $resultat = $query->fetch();
  return $resultat;
}

//Vérification mail existant bdd
function verifmail($mail){
  global $pdo;
  $sql="SELECT email FROM v4_user WHERE email = :email";
  $query=$pdo->prepare($sql);
  $query->bindValue(':email',$mail,PDO::PARAM_STR);
  $query->execute();
  $resultatmail = $query->fetch();
  return $resultatmail;
}

function verifpassword($password){
  global $pdo;
  $sql="SELECT password FROM v4_user WHERE password = :password";
  $query=$pdo->prepare($sql);
  $query->bindValue(':password',$password,PDO::PARAM_STR);
  $query->execute();
  $resultatpassword = $query->fetch();
  return $resultatpassword;
}

function recuperationlistevaccin(){
  global $pdo;

  $sql="SELECT nom FROM v4_vaccin";
  $query=$pdo->prepare($sql);
  $query->execute();
  $resultat = $query->fetchAll();
  return $resultat;
}



// Insere un vaccin d'un user dans la table mesvaccins
/*
envoyervaccinuser($id,$title,$date,$reaction){
  global $pdo;
}
*/

// // Insere un vaccin d'un user dans la table mesvaccins
// envoyervaccinuser($id,$title,$date,$reaction){
//   global $pdo;
// }
