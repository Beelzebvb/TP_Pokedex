<?php session_start();

include './includes/config.php';
include './includes/functions.php';

if (isset($_POST['submit'])) {


    if (emptyInput([$_POST['email'], $_POST['password']])) {
        header('location: connexion.php?message=emptyinput&connexionMessage');
        exit();
    }

    if (invalidEmail($_POST['email'])) {
        header('location: connexion.php?message=invalidemail&connexionMessage');
        exit();
    }

    if (!userExists($db, $_POST['email'])) {
        header('location: connexion.php?message=userdoesnotexist&connexionMessage');
        exit();
    }

    if (checkPassword($db, $_POST['email'], $_POST['password'])) {

        // session_unset();
        $_SESSION['uid'] = getUserID($db, $_POST['email']);

        header('location: index.php?message=userconnected&connexionMessage');
        exit();
    } else {
        header('location: connexion.php?message=wrongpassword&connexionMessage');
        exit();
    }
} else {
    header('location: connexion.php?message=accessdenied');
    exit();
}
