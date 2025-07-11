<section class="products">

    <div class="products__search-bar">
        <form action="index.php?page=search" method="POST" class="products__form">
            <input type="text" class="products__input" placeholder="Rechercher un produit">
            <input type="submit" class="products__submit" value="Rechercher">
        </form>

    </div>

<<<<<<< HEAD
    <div class="main content">
        <h2> Main content</h2>

        <img src="../public/images/img_principal.jpg" alt="img">
    </div>
=======
    <div class="products__list">
        <?php foreach ($produits as $produit): ?>
            <div class="products__card">
                <img src="<?= $produit->getUrl_img(); ?>" alt="<?= $produit->getNom(); ?>" class="products__img">
                <h3 class="products__name"><?= $produit->getNom(); ?></h3>
                <p class="products__description"><?= $produit->getDescription(); ?></p>
                <span class="products__price"><?= $produit->getPrix(); ?> €</span>
>>>>>>> 2bde7f057078467be6a63629be17485ace7cf683

                <?php if (isset($_SESSION['email'])): ?>
                    <form action="" method="POST" class="products__add-form">
                        <input type="hidden" name="id_produit" value="<?= e($produit['id']) ?>">
                        <label class="products__quantity-label">Quantité :
                            <select name="quantite" class="products__quantity-select">
                                <?php for ($i = 1; $i <= 10; $i++): ?>
                                    <option><?= $i ?></option>
                                <?php endfor; ?>
                            </select>
                        </label>
                        <input type="submit" class="products__add-btn" value="Ajouter au panier">
                    </form>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>