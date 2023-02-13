<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Telefoot - La chaine du foot</title>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/assets/css/icomoon.css" />
    <link rel="stylesheet" href="../public/assets/css/main.css" />
</head>

<body>
    <header>
        <img src="../public/assets/img/telefoot-color-bg-01.svg" alt="Telefoot - La chaine du foot" />
        <nav>
            <ul>
                <a href="./index.php">
                    <li>Home</li>
                </a>
                <li>Telefoot Bar</li>                    
            </ul>
        </nav>
        <?php
        if (isset($_SESSION["user"])) {
        ?>
            <a class="subscribe" href="./index.php?page=my_account">Live</a>
            <a class="connect" href="./index.php?page=logout">Se déconnecter</a>
        <?php
        } else {
        ?>
            <a class="subscribe" href="./index.php?page=subscribe">S'abonner</a>
            <a class="connect" href="./index.php?page=login">Se connecter</a>
        <?php
        }
        ?>
    </header>