<? include 'includes/header.php'; ?>

<main>

    <section class="jumbotron">
        <img src="./img/pikachu.png" alt="pikachu">
        <h1>BIENVENUE SUR LE POKEDEX DE L'ESGI !</h1>
    </section>

    <?php
    if (isset($_SESSION))
        print_r($_SESSION);
    ?>

</main>

<? include 'includes/footer.php'; ?>