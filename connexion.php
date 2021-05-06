<?php include 'includes/header.php'; ?>

<main>

    <section class="connexion">

        <h1>CONNEXION</h1>

        <div class="forms">
            <form action="verif_connexion.php" method="POST">
                <h2>Je possède un compte</h2>
                <div class="form-inputs">
                    <input type="text" name="email" placeholder="E-mail">
                    <input type="password" name="password" placeholder="Mot de passe">
                    <button type="submit" name="submit">Connexion</button>
                    <?php
                    if (isset($_GET['message']) && isset($_GET['connexionMessage'])) {
                        switch ($_GET['message']) {
                            case 'emptyinput':
                                echo '<p class=error>Remplir tous les champs.</p>';
                                break;
                            case 'invalidemil':
                                echo '<p class=error>Renseigner une addresse email valide.</p>';
                                break;
                            case 'wrongpassword':
                                echo '<p class=error>Mot de passe invalide.</p>';
                                break;
                            case 'accessdenied':
                                echo '<p class=error>Accès non autorisé</p>';
                                break;
                            case 'userexists':
                                echo '<p class=error>Ces identifiants ont déjà été pris par un autre utilisateur.</p>';
                                break;
                            case 'userdoesnotexists':
                                echo '<p class=error>Ces identifiants ne correspondent à aucun compte utilisateur.</p>';
                                break;
                            case 'usercreated':
                                echo "<p class=valid>Création de compte utilisateur avec succès !</p>";
                                break;
                            case 'userconnected':
                                echo "<p class=valid>Connexion de compte utilisateur avec succès !</p>";
                                break;
                        }
                    }
                    ?>
                </div>
            </form>

            <form action="verif_inscription.php" method="POST">
                <h2>Je crée un compte</h2>
                <div class="form-inputs">
                    <input type="text" name="pseudo" placeholder="Pseudo">
                    <input type="text" name="email" placeholder="E-mail">
                    <input type="password" name="password" placeholder="Mot de passe">
                    <div>
                        <label for="image">Image de profil:</label>
                        <input type="file" name="image" accept="image/gif,image/jpeg, image/jpeg,">
                    </div>
                    <button type="submit" name="submit">Inscription</button>

                    <?php
                    if (isset($_GET['message']) && isset($_GET['inscriptionMessage'])) {
                        switch ($_GET['message']) {
                            case 'emptyinput':
                                echo '<p class=error>Remplir tous les champs.</p>';
                                break;
                            case 'invalidemil':
                                echo '<p class=error>Renseigner une addresse email valide.</p>';
                                break;
                            case 'wrongpassword':
                                echo '<p class=error>Mot de passe invalide.</p>';
                                break;
                            case 'accessdenied':
                                echo '<p class=error>Accès non autorisé</p>';
                                break;
                            case 'userexists':
                                echo '<p class=error>Ces identifiants ont déjà été pris par un autre utilisateur.</p>';
                                break;
                            case 'userdoesnotexists':
                                echo '<p class=error>Ces identifiants ne correspondent à aucun compte utilisateur.</p>';
                                break;
                            case 'usercreated':
                                echo "<p class=valid>Création de compte utilisateur avec succès !</p>";
                                break;
                            case 'userconnected':
                                echo "<p class=valid>Connexion de compte utilisateur avec succès !</p>";
                                break;
                        }
                    }
                    ?>

                </div>
            </form>
        </div>
    </section>

</main>

<? include 'includes/footer.php'; ?>