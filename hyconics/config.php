<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "hyconics";

$mysqli = new mysqli($host, $user, $password, $database);

// Vérifier la connexion
if ($mysqli->connect_error) {
    die("La connexion à la base de données a échoué : " . $mysqli->connect_error);
}
?>
