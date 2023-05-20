<header>
    <nav>
        <?php
//        include 'assets/database/_header.php';

        if (isset($_SESSION["id"])) {
            echo "<a href='assets/php/logout'>{$lang['logout']}</a>";
            echo "<a href='profil/{$_SESSION['id']}'>Mon profil</a>";
        } else {
            echo "<a href='login'>{$lang['login']}</a>";
        }
        ?>
    </nav>
</header>
