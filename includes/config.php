<?php

$dsn = 'mysql:dbname=pokedex;host=localhost';
$user = 'root';
$pwd = 'root';

try {
    $db = new PDO($dsn, $user, $pwd);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Erreur de connection a la base de données : ' . $e->getMessage();
    die();
}
