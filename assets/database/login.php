<?php
session_start();
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, password, first_name, last_name FROM clients WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password, $first_name, $last_name);
        $stmt->fetch();

        // Vérifiez si le mot de passe correspond au mot de passe haché stocké
        if (password_verify($password, $hashed_password)) {
            $_SESSION["id"] = $id;
            $_SESSION["email"] = $email;
            $_SESSION["first_name"] = $first_name;
            $_SESSION["last_name"] = $last_name;

            echo "Connexion réussie !";
        } else {
            echo "Mot de passe incorrect.";
        }
    } else {
        echo "Aucun utilisateur trouvé avec cet e-mail.";
    }

    $stmt->close();
}

$conn->close();
?>