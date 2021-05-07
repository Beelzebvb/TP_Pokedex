<?php session_start();

include './includes/config.php';
include './includes/functions.php';

$fileName;

if (!isset($_POST['submit'])) {
    header('location: add_pokemon.php?message=accessdenied');
    exit();
}

if (emptyInput([
    $_POST['nom'],
    $_POST['pv'],
    $_POST['attaque'],
    $_POST['defense'],
    $_POST['vitesse']
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

if ($_FILES['image']['error'] !== 0) {
    header('location: add_pokemon.php?message=nofileinput');
    exit();
} else {

    $acceptable = [
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/gif'
    ];

    if (!in_array($_FILES['image']['type'], $acceptable)) {
        header('location: connexion.php?message=invalidtype');
        exit();
    }

    $maxSize = 1024 * 1024;

    if ($_FILES['image']['size'] > $maxSize) {
        header('location: connexion.php?message=fileistoobig');
        exit();
    }

    $filePath = 'uploads/' . $_SESSION['uinfos']['pseudo'] . '/' . 'pokemon';
    if (!file_exists($filePath)) {
        mkdir($filePath, 0777);
    }

    $fileName = $_FILES['image']['name'];
    $splitFileName = explode('.', $fileName);
    $extension = end($splitFileName);

    $fileName = 'image-' . base64_encode($_POST['nom']) . '.' . $extension;

    $dest = $filePath . '/' . $fileName;

    if (!move_uploaded_file($_FILES['image']['tmp_name'], $dest)) {
        header("location: connexion.php?message=movefilefailure");
        exit();
    }
}

if (addPokemon(
    $db,
    $_POST['nom'],
    $_POST['pv'],
    $_POST['attaque'],
    $_POST['defense'],
    $_POST['vitesse'],
    $fileName,
    $_SESSION['uinfos']['id']
)) {

    $_SESSION['pokemons'] = getPokemons($db, $_SESSION['uinfos']['id']);

    header('location: add_pokemon.php?message=pokemonaddsuccess');
    exit();
} else {
    header('location: add_pokemon.php?message=pokemonaddfailure');
    exit();
}
