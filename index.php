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
<?php include "assets/partials/_header.php" ?>
    <main>
        <h1><?php echo $lang['welcome']; ?></h1>
        <div id="canvas-container"></div>
    </main>
<?php include "assets/partials/_footer.php" ?>
    <script src="assets/js/background.js"></script>
</body>
</html>
