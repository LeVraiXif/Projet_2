<?php
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];

    // Vérifiez la longueur du mot de passe (au moins 8 caractères)
    if (strlen($password) < 8) {
        echo "Le mot de passe doit comporter au moins 8 caractères.";
    } else {
        // Hachez le mot de passe avec un sel généré automatiquement
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Préparez et liez les paramètres
        $stmt = $conn->prepare("INSERT INTO clients (email, password, first_name, last_name) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $email, $hashed_password, $first_name, $last_name);

        // Exécutez la requête et vérifiez si l'insertion a réussi
        if ($stmt->execute()) {
            echo "Inscription réussie !";
        } else {
            echo "Erreur : " . $stmt->error;
        }

        // Fermez la requête préparée
        $stmt->close();
    }
}

$conn->close();
?>