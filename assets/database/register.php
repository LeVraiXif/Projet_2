<?php
session_start();
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
            $new_user_id = $stmt->insert_id;

            // Récupérez les informations de l'utilisateur inscrit
            $stmt = $conn->prepare("SELECT id, email, first_name, last_name, role, banned FROM clients WHERE id = ?");
            $stmt->bind_param("i", $new_user_id);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id, $email_db, $first_name, $last_name, $role, $banned);
                $stmt->fetch();

                // Créez une session pour l'utilisateur
                $_SESSION["id"] = $id;
                $_SESSION["email"] = $email_db;
                $_SESSION["first_name"] = $first_name;
                $_SESSION["last_name"] = $last_name;
                $_SESSION["role"] = $role;

                // Redirigez l'utilisateur vers la page d'accueil ou la page de profil
                header("Location: ../../index");
                exit();
            } else {
                // Gestion des erreurs ou redirection en cas d'échec
                $_SESSION["error_message"] = "Une erreur est survenue lors de la création de votre compte.";
                header("Location: ../../register");
                exit();
            }
        }

        // Fermez la requête préparée
        $stmt->close();
    }
}

// N'oubliez pas de fermer la connexion lorsque vous avez terminé.
$conn->close();
?>
