<?php

$host = "localhost";
$db = "gestions_tache";
$root = "root";
$pwd = "";
try {
    $conne = new PDO("mysql:host=$host; dbname=$db", $root, $pwd);

    $conne->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Vous êtes connectés sur l'applis de la gestion des tâches<br><br>";
} catch (PDOException $e) {
    die("Seu connexion baakhoul   " . $e->getMessage());
}
