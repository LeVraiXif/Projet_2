<?php
// Détecter la langue du navigateur
$browser_lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

// Inclure le fichier de traduction approprié
switch ($browser_lang) {
    case "fr":
        include "assets/languages/fr.php";
        break;
    case "en":
        include "assets/languages/en.php";
        break;
    default:
        include "assets/languages/en.php";
}