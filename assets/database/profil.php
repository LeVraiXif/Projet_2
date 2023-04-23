<?php
require_once 'assets/database/database.php';
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['role'])) {
  header("Location: ../index.php");
  exit();
}

$user_id = $_GET['id'];
if ($_SESSION['id'] != $user_id && $_SESSION['role'] != 'admin') {
  header("Location: ../index.php");
  exit();
}
// Récupérer les informations de l'utilisateur depuis la base de données
$user_info_query = $conn->prepare("SELECT first_name, banned FROM clients WHERE id = ?");
$user_info_query->bind_param("i", $user_id);
$user_info_query->execute();
$user_info_result = $user_info_query->get_result();

$banned = 0;

if ($user_info_result->num_rows > 0) {
    $user = $user_info_result->fetch_assoc();
    $first_name = $user['first_name'];
    $banned = $user['banned'];
}
$user_info_query->close();