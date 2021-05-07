<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Pokedex</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <nav>
            <img class="logo" src="img/logo.png" alt="">
            <ul class="nav-links">
                <li><a href="index.php" class="nav-link">Acceuil</a></li>
                <li><a href="collection.php" class="nav-link">Collection</a></li>
                <?php
                if (isset($_SESSION['uinfos']['id'])) {
                    echo '<li><a href="add_pokemon.php" class="nav-link">Ajouter un Pokemon</a></li>';
                    echo '<li><a href="profile.php" class="nav-link">Mon Compte</a></li>';
                    echo '<li><a href="connexion.php" class="nav-link">Déconnexion</a></li>';
                } else {
                    echo '<li><a href="connexion.php" class="nav-link">Connexion</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>