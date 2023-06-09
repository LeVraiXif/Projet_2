<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="assets/css/styles.css"> 
</head>
<body>
    <main>
        <h1>Connexion</h1>
        <form action="assets/database/login.php" method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
            <br>    
            <label for="password">Mot de passe:</label>
            <input type="password" name="password" id="password" required>
            <br>
            <input type="submit" value="Se connecter">

            <p>Pas de compte ? <a href="register">Inscriptions</a> </p>
        </form>
    </main>
</body>
</html>
