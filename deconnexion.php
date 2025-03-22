<?php
// Démarre la session
session_start();

// Supprime toutes les variables de session
session_unset();

// Détruit la session
session_destroy();

// Redirige l'utilisateur vers la page d'accueil
header("Location: acceuil");  // Redirige vers la page d'accueil (index.php par exemple)
exit();  // Assure-toi que le script s'arrête après la redirection
?>
