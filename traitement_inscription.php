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


if(isset($_POST['ok'])) {
    $pseudo = $_POST['pseudo'];
    $password = $_POST['password'];

    $req = $bdd->prepare('INSERT INTO users Values (NULL, :pseudo, MD5(:mdp))');
    $req->execute(array(
        'pseudo' => $pseudo,
        'mdp' => $password
    ));
    echo "Inscription réussie";
    header('Location: acceuil_co.php');
    
}
 

?>