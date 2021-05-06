<?php

include './includes/config.php';
include './includes/functions.php';

if (isset($_POST['submit'])) {

    if (emptyInput([$_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['image']])) {
        header('location: connexion.php?message=emptyinput&inscriptionMessage');
        exit();
    }

    if (invalidEmail($_POST['email'])) {
        header('location: connexion.php?message=invalidemail&inscriptionMessage');
        exit();
    }

    if (userExists($db, $_POST['pseudo']) || userExists($db, $_POST['email'])) {
        header('location: connexion.php?message=userexists&inscriptionMessage');
        exit();
    }

    if (createUser($db, $_POST['pseudo'], $_POST['email'], $_POST['password'], $_POST['image'])) {
        header('location: connexion.php?message=usercreated&inscriptionMessage');
        exit();
    }
} else {
    header('location: connexion.php?message=accessdenied');
    exit();
}
