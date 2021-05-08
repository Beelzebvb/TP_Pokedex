<?php session_start();

if (isset($_SESSION['uinfos'])) {
    session_unset();
}

header('location: ../connexion.php');
exit();
