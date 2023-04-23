<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="assets/css/styles.css"> 
</head>
<body>
    <h1>Inscription</h1>
    <form action="assets/database/register.php" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Mot de passe (au moins 8 caractères) :</label>
        <input type="password" name="password" id="password" required>
        <br>
        <label for="first_name">Prénom :</label>
        <input type="text" name="first_name" id="first_name" required>
        <br>
        <label for="last_name">Nom :</label>
        <input type="text" name="last_name" id="last_name" required>
        <br>
        <input type="submit" value="S'inscrire">

        <p>Déjà un compte ? <a href="login.php">Connexion</a> </p>
    </form>
</body>
</html>