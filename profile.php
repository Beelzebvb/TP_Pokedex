<?php
include 'includes/header.php';
?>

<main>

    <section class="profile">
        <h1>Mon Compte</h1>

        <section class="infos">
            <h2>Mes Infos</h2>
            <h4>Pseudo : <?php echo $_SESSION['uinfos']['pseudo']; ?></h4>
            <h4>Email: <?php echo $_SESSION['uinfos']['email']; ?></h4>
            <figure class="pfp">
                <figcaption>Image de profil :</figcaption>
                <img src=<?php echo ('uploads/' . $_SESSION['uinfos']['pseudo'] . '/' . $_SESSION['uinfos']['image']); ?> alt="pfp">
            </figure>
        </section>

        <hr>

        <section class="pokemon-list">
            <div class="row">
                <?php

                foreach ($_SESSION['uidpokemons'] as $pokemon) {

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

                ?>
            </div>
        </section>

    </section>

</main>

<?php include 'includes/footer.php'; ?>