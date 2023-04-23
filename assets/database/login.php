<?php
session_start();
include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, email, password, first_name, last_name, role, banned FROM clients WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $email_db, $hashed_password, $first_name, $last_name, $role, $banned);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            if (!$banned) {
                $_SESSION["id"] = $id;
                $_SESSION["email"] = $email_db;
                $_SESSION["first_name"] = $first_name;
                $_SESSION["last_name"] = $last_name;
                $_SESSION["role"] = $role;

                header("Location: ../../index");
                exit();
            } else {
                $_SESSION["error_message"] = "Votre compte a été banni.";
                header("Location: ../../login");
                exit();
            }
        } else {
            $_SESSION["error_message"] = "Mot de passe incorrect.";
            header("Location: ../../login");
            exit();
        }
    } else {
        $_SESSION["error_message"] = "Aucun compte trouvé avec cet e-mail.";
        header("Location: ../../login");
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
