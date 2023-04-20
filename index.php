<?php
include "assets/languages/lang.php";
session_start();
?>
<!DOCTYPE html>
<html lang="<?php echo $browser_lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang['welcome']; ?></title>
    <link rel="stylesheet" href="assets/css/styles.css">  
</head>
<body>
<header>
        <nav>
            <?php

            if (isset($_SESSION["id"])) {
                echo '<a href="logout.php">Déconnexion</a>';
            } else {
                echo "<a href='login.php'>{$lang['login']}</a>";
            }
            ?>
        </nav>
    </header>
    <main>
        <h1><?php echo $lang['welcome']; ?></h1>
        <div id="canvas-container"></div>
    </main>
    <footer>
        <p>© 2023 - Mon Site Web</p>
    </footer>

    <script src="assets/js/background.js"></script>
</body>
</html>
