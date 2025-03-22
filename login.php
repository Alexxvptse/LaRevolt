<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css"> <!-- Ajoutez votre fichier CSS ici -->
</head>
<body>

    <?php
    try {
        // Connexion à la base de données avec PDO
        $bdd = new PDO('mysql:host=localhost;dbname=larevolt', 'root', '');
        
        // Configure le mode d'erreur pour afficher les exceptions
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // Si la connexion échoue, on affiche un message d'erreur
        die('Erreur : ' . $e->getMessage());
    }

    // Initialisation de la variable $error_msg
    $error_msg = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $pseudo = $_POST['pseudo'];
        $password = $_POST['password'];

        if ($pseudo != "" && $password != "") {
            // Connexion à la base de données
            $req = $bdd->query('SELECT * FROM users WHERE pseudo = "' . $pseudo . '" AND mdp = MD5("' . $password . '")');
            $rep = $req->fetch();
            if ($rep['id'] != false) {
                // Connexion réussie
                header('Location: acceuil_co.php');
            } else {
                // Si les informations sont incorrectes
                $error_msg = "Pseudo ou mot de passe incorrect !";
            }
        } else {
            // Si les champs sont vides
            $error_msg = "Tous les champs doivent être remplis.";
        }
    }
    ?>

    <form method="POST" action="">
        <h2 for="pseudo">Pseudo</h2>
        <input type="text" id="pseudo" name="pseudo" required>
        <br>
        <h2 for="password">Mot de passe</h2>
        <input type="password" id="password" name="password" required>
        <button type="submit" value="Se connecter" name="ok">Se connecter</button>
    </form>

    <?php
    // Affichage du message d'erreur si $error_msg est défini
    if ($error_msg != "") {
        echo "<p>$error_msg</p>";
    }
    ?>

</body>
</html>
