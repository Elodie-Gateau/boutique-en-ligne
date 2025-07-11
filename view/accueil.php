<!-- <h1 class="titre">
    <?php
    if (isset($_SESSION['prenom'])) {
        echo 'Bienvenue, ' . htmlspecialchars($_SESSION['prenom']) . ' !';
    } else {
        echo 'Bienvenue sur la boutique !';
    }
    ?>
</h1> -->

<?php if (!empty($message)): ?>
    <div class="success"><?= $message ?></div>
<?php endif; ?>

<section class="products">

    <div class="card">
        <h2>Liste des produits</h2>
        <?php

        foreach ($produits as $produit) {
        ?>
            <div>
                <img src="<?= $produit->getUrl_img(); ?>" alt="<?= $produit->getNom(); ?>">
                <h3><?= $produit->getNom(); ?></h3>
                <p><?= $produit->getDescription(); ?></p>
                <span><?= $produit->getPrix(); ?> €</span>
            </div>

        <?php } ?>
    </div>

</section>