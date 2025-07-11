<section class="products">
    <div class="products__search-bar">
        <form action="index.php?page=search" method="POST" class="products__form">
            <input type="text" class="products__input" placeholder="Rechercher un produit">
            <input type="submit" class="products__submit" value="Rechercher">
        </form>
    </div>

    <div class="products__list">
        <?php foreach ($produits as $produit): ?>
            <div class="products__card">
                <img src="<?= e($produit['url_img']) ?>" alt="<?= e($produit['nom']) ?>" class="products__img">
                <h3 class="products__name"><?= e($produit['nom']) ?></h3>
                <p class="products__description"><?= e($produit['description']) ?></p>
                <span class="products__price"><?= e($produit['prix_unitaire']) ?> €</span>

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