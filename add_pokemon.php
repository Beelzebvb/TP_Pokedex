<? include 'includes/header.php'; ?>

<main>

    <section class="add-pokemon">

        <h1>AJOUTER UN POKEMON</h1>
        <form class="form-inputs" action="verif_pokemon.php" method="POST">
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
    </section>

</main>

<? include 'includes/footer.php'; ?>