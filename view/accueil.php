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

    <div class="cards hero">
        <h2>Liste des produits</h2>
        <?php

        $produits = ProduitsController::listProducts();
        require 'liste-produits.php'; ?>
    </div>

    <div class="main content">
        <h2> Main content</h2>

        <img src="../public/images/img_principal.jpg" alt="img">
    </div>

    <div class="contacts">
        <h2>Contatcs</h2>
    </div>

</section>