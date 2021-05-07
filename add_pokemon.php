<?php include 'includes/header.php'; ?>

<main>

    <section class="add-pokemon">

        <h1>AJOUTER UN POKEMON</h1>
        <form class="form-inputs" enctype="multipart/form-data" action="verif_pokemon.php" method="POST">
            <input type="text" name="nom" placeholder="Nom">
            <input type="text" name="pv" placeholder="PV">
            <input type="text" name="attaque" placeholder="Attaque">
            <input type="text" name="defense" placeholder="Defense">
            <input type="text" name="vitesse" placeholder="Vitesse">
            <div>
                <label for="image">Image de profil:</label>
                <input type="file" name="image" accept="image/gif,image/jpeg, image/jpeg,">
            </div>
            <button type="submit" name="submit">Ajouter</button>
        </form>
        <?php
        if (isset($_GET['message'])) {
            switch ($_GET['message']) {
                case 'emptyinput':
                    echo '<p class=error>Remplir tous les champs.</p>';
                    break;
                case 'invalidinput':
                    echo '<p class=error>Renseigner des informations valides.</p>';
                    break;
                case 'pokemonexists':
                    echo '<p class=error>Le pokemon est déjà inscrit dans le pokedex.</p>';
                    break;
                case 'accessdenied':
                    echo '<p class=error>Accès non autorisé</p>';
                    break;
                case 'pokemonaddfailure':
                    echo "<p class=valid>Echec de l'ajout de pokemon au pokedex !</p>";
                    break;
                case 'pokemonaddsuccess':
                    echo "<p class=valid>Ajout d'un pokemon au pokedex avec succés !</p>";
                    break;
            }
        }
        ?>
    </section>

</main>

<?php include 'includes/footer.php'; ?>