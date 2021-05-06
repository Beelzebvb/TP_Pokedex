<?php

include './includes/config.php';
include './includes/functions.php';

if (!isset($_POST['submit'])) {
    header('location: add_pokemon.php?message=accessdenied');
    exit();
}

if (emptyInput([
    $_POST['nom'],
    $_POST['pv'],
    $_POST['attaque'],
    $_POST['defense'],
    $_POST['vitesse'],
    $_POST['image']
])) {
    header('location: add_pokemon.php?message=emptyinput');
    exit();
}

if (
    is_numeric($_POST['nom'])
    || !is_numeric($_POST['pv'])
    || !is_numeric($_POST['attaque'])
    || !is_numeric($_POST['defense'])
    || !is_numeric($_POST['vitesse'])
) {
    header('location: add_pokemon.php?message=invalidinput');
    exit();
}

if (pokemonExists($db, $_POST['nom'])) {
    header('location: add_pokemon.php?message=pokemonexists');
    exit();
}

if (addPokemon(
    $db,
    $_POST['nom'],
    $_POST['pv'],
    $_POST['attaque'],
    $_POST['defense'],
    $_POST['vitesse'],
    $_POST['image'],
    $_SESSION['uid']
)) {
    header('location: add_pokemon.php?message=pokemonaddsuccess');
    exit();
} else {
    header('location: add_pokemon.php?message=pokemonaddfailure');
    exit();
}
