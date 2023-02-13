<?php
// Ne pas oublier de démarrer le système de session sinon la fonction session_destroy()ne fonctionne pas 
    session_start();
    // Détruire les variables de sessions pour faire une déconnection
    session_destroy();
    // Rediriger vers la page d'accueill
    header("Location: index.php");
?>