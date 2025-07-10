<!-- <h1 class="titre">
    <?php
    if (isset($_SESSION['prenom'])) {
        echo 'Bienvenue, ' . htmlspecialchars($_SESSION['prenom']) . ' !';
    } else {
        echo 'Bienvenue sur la boutique !';
    }
    ?>
</h1> -->


<section class="products">

    <div class="card">
        <h2>Liste des produits</h2>
        <?php

        $produits = ProduitsController::listProducts();
        require 'liste-produits.php'; ?>
    </div>

</section>