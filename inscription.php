<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="style.css"> <!-- Ajoutez votre fichier CSS ici -->
</head>
<body>

    <h2>Inscription</h2>
    <form action="traitement_inscription.php" method="POST">
        <label for="pseudo">pseudo :</label>
        <input type="text" id="pseudo" name="pseudo" required>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>

        <button type="submit" name="ok">S'inscrire</button>
    </form>
</body>
</html>

