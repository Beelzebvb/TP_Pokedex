<?php include 'includes/header.php'; ?>

<main>

    <section class="collection">
        <h1>Tous les pokemons</h1>

        <div class="row">

            <?php

            if (isset($_SESSION['allpokemons'])) {

                foreach ($_SESSION['allpokemons'] as $pokemon) {

                    echo "
                    <div class='card'>
                        <div class='description'>
                            <h3>{$pokemon["nom"]}</h3>
                            <p>PV: {$pokemon["pv"]}</p>
                            <p>Attaque: {$pokemon["attaque"]}</p>
                            <p>Defense: {$pokemon["defense"]}</p>
                            <p>Vitesse: {$pokemon["vitesse"]}</p>
                        </div>
                        <img src='uploads/pokemons/{$pokemon['image']}' alt='pokemon'>
                    </div>";
                }
            } else {
                echo '<h2 class="valid">Connectez vous pour commencer à ajouter des pokemons à votre collection !!</p>';
            }
            ?>

        </div>

    </section>

</main>

<?php include 'includes/footer.php'; ?>