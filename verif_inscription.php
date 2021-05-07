<?php

include './includes/config.php';
include './includes/functions.php';

$fileName;

if (isset($_POST['submit'])) {

    if (emptyInput([$_POST['pseudo'], $_POST['email'], $_POST['password']])) {
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

    if ($_FILES['image']['error'] == 0) {

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

        $filePath = 'uploads/' . $_POST['pseudo'];
        if (!file_exists($filePath)) {
            mkdir($filePath, 0777);
        }

        $fileName = $_FILES['image']['name'];
        $splitFileName = explode('.', $fileName);
        $extension = end($splitFileName);

        $fileName = 'image-' . base64_encode($_POST['pseudo']) . '.' . $extension;

        $dest = $filePath . '/' . $fileName;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $dest)) {
            header("location: connexion.php?message=movefilefailure");
            exit();
        }
    }
    if (createUser($db, $_POST['pseudo'], $_POST['email'], $_POST['password'], $fileName)) {
        header('location: connexion.php?message=usercreated&inscriptionMessage');
        exit();
    }
} else {
    header('location: connexion.php?message=accessdenied');
    exit();
}
