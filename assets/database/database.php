<?php
// Paramètres de connexion à la base de données

$servername = "localhost";
$username = "root";
$password = "drowssap";
$dbname = "databaseWeb";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}
// Vous pouvez maintenant utiliser $conn pour exécuter des requêtes SQL et interagir avec la base de données.
?>
