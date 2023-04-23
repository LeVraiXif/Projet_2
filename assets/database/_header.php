<?php
    include 'assets/database/database.php';
        
    $query = "SELECT * FROM clients";
    $result = $conn->query($query);
        
    // Vérifie si des utilisateurs ont été trouvés
    if ($result->num_rows > 0) {
        $users = $result->fetch_all(MYSQLI_ASSOC);
    }
        
    $conn->close();