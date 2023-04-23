<?php
include_once dirname(__FILE__) . '/../database/database.php';

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

    // Vérifier si l'utilisateur est déjà banni
    $check_ban_status_query = $conn->prepare("SELECT banned FROM clients WHERE id = ?");
    $check_ban_status_query->bind_param("i", $user_id);
    $check_ban_status_query->execute();
    $check_ban_status_result = $check_ban_status_query->get_result();
    if ($check_ban_status_result->num_rows > 0) {
        $user = $check_ban_status_result->fetch_assoc();
        $banned = $user['banned'];
    } else {
        // Gérer le cas où l'utilisateur n'est pas trouvé
    }
    $check_ban_status_query->close();

    // Inverser le statut de bannissement
    $new_ban_status = $banned ? 0 : 1;

    // Mettre à jour le statut de bannissement de l'utilisateur
    $toggle_ban_query = $conn->prepare("UPDATE clients SET banned = ? WHERE id = ?");
    $toggle_ban_query->bind_param("ii", $new_ban_status, $user_id);
    $result = $toggle_ban_query->execute(); // Ajout d'une variable $result pour vérifier si la requête a réussi

    if ($result) {
        echo " Mise à jour réussie"; // Ajout d'un message de débogage
    } else {
        echo " Échec de la mise à jour"; // Ajout d'un message de débogage
    }

    $toggle_ban_query->close();
}

$conn->close();
header("Location: ../../profil.php?id=" . $user_id);
exit();
?>
