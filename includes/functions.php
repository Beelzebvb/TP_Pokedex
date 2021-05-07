<?php

function emptyInput($inputs)
{
    foreach ($inputs as $input) {
        if (empty($input)) {
            return true;
        }
    }

    return false;
}

function invalidEmail($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    return false;
}

function userExists($db, $uid)
{
    if (invalidEmail($uid)) {

        $q = 'SELECT * FROM user WHERE pseudo = :pseudo;';
        $req = $db->prepare($q);
        $reponse = $req->execute(
            array(
                'pseudo' => $uid
            )
        );
        if ($reponse) {
            while ($result = $req->fetch(PDO::FETCH_ASSOC)) {
                if (count($result) > 0) {
                    return true;
                }
            }
        }
        return false;
    } else {
        $q = 'SELECT * FROM user WHERE email = :email;';
        $req = $db->prepare($q);
        $reponse = $req->execute(
            array(
                'email' => $uid
            )
        );
        if ($reponse) {
            while ($result = $req->fetch(PDO::FETCH_ASSOC)) {
                if (count($result) > 0) {
                    return true;
                }
            }
        }
        return false;
    }
}

function validPassword($db, $uid, $password)
{
    if (!userExists($db, $uid))
        return false;

    if (invalidEmail($uid)) {
        $q = 'SELECT password FROM user WHERE pseudo = :pseudo;';
        $req = $db->prepare($q);
        $reponse = $req->execute(
            array(
                'pseudo' => $uid
            )
        );

        if ($reponse) {
            while ($result = $req->fetch(PDO::FETCH_ASSOC)) {
                if (count($result) > 0) {
                    return password_verify($password, $result['password']);
                }
            }
        }
    } else {
        $q = 'SELECT password FROM user WHERE email = :email;';
        $req = $db->prepare($q);
        $reponse = $req->execute(
            array(
                'email' => $uid
            )
        );

        if ($reponse) {
            while ($result = $req->fetch(PDO::FETCH_ASSOC)) {
                if (count($result) > 0) {
                    return password_verify($password, $result['password']);
                }
            }
        }
    }
}

function getUserID($db, $email)
{

    if (invalidEmail($email))
        return false;

    $q = 'SELECT id from user where email = :email;';
    $req = $db->prepare($q);
    $reponse = $req->execute(
        array(
            'email' => $email
        )
    );

    if ($reponse) {
        $result = $req->fetch(PDO::FETCH_ASSOC);
        return $result['id'];
    }

    return $email;
}

function getUserInfos($db, $email)
{
    if (invalidEmail($email))
        return false;

    $q = 'SELECT id, pseudo, email, image from user where email = :email;';
    $req = $db->prepare($q);
    $reponse = $req->execute(
        array(
            'email' => $email
        )
    );

    if ($reponse) {
        $result = $req->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    return false;
}

function getPokemons($db, $uid)
{
    $q = 'SELECT * FROM pokemon WHERE id_user = :id_user;';
    $req = $db->prepare($q);
    $reponse = $req->execute(
        array(
            'id_user' => $uid
        )
    );

    if ($reponse) {
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    return false;
}


function createUser($db, $pseudo, $email, $password, $image)
{
    $q = 'INSERT INTO user (pseudo, email, password, image) VALUES(:pseudo, :email, :password, :image);';
    $req = $db->prepare($q);
    $reponse = $req->execute(
        array(
            'pseudo' => $pseudo,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'image' => $image
        )
    );

    if ($reponse)
        return true;

    return false;
}


function pokemonExists($db, $name)
{
    $q = 'SELECT nom FROM pokemon WHERE nom = :name;';
    $req = $db->prepare($q);
    $reponse = $req->execute(
        array(
            'name' => $name
        )
    );

    if ($reponse) {
        while ($result = $req->fetch(PDO::FETCH_ASSOC)) {
            if (count($result) > 0) {
                return true;
            }
        }
    }
    return false;
}

function addPokemon($db, $nom, $pv, $attaque, $defense, $vitesse, $image, $id_user)
{
    $q = 'INSERT INTO pokemon ( nom, pv, attaque, defense, vitesse, image, id_user) VALUES ( :nom, :pv, :attaque, :defense, :vitesse, :image, :id_user);';

    $req = $db->prepare($q);
    $reponse = $req->execute(
        array(
            'nom' => $nom,
            'pv' => $pv,
            'attaque' => $attaque,
            'defense' => $defense,
            'vitesse' => $vitesse,
            'image' => $image,
            'id_user' => $id_user
        )
    );

    if ($reponse) {
        return true;
    }

    return false;
}
