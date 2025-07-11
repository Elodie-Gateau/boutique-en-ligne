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
                <img src="<?= $produit->getUrl_img(); ?>" alt="<?= $produit->getNom(); ?>" class="products__img">
                <h3 class="products__name"><?= $produit->getNom(); ?></h3>
                <p class="products__description"><?= $produit->getDescription(); ?></p>
                <span class="products__price"><?= number_format($produit->getPrix(), 2, ',', ' '); ?> €</span>


                <?php if (isset($_SESSION['email'])): ?>
                    <form action="index.php?page=panier" method="POST" class="products__add-form">
                        <input type="hidden" name="id_produit" value="<?= $produit->getId() ?>">
                        <input type="hidden" name="prix_unitaire" value="<?= $produit->getPrix() ?>">
                        <input type="hidden" name="produit_nom" value="<?= $produit->getNom() ?>">
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