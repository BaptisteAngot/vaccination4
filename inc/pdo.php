<?php
session_start();
    try {
<<<<<<< HEAD
        $pdo = new PDO('mysql:host=localhost;dbname=vaccination4', "root", "", array(
=======
        $pdo = new PDO('mysql:host=localhost;dbname=vaccins4', "root", "", array(
>>>>>>> 6e261585019c12be4262cf484fa9d9e5f2051b4e
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ));
    }
    catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
