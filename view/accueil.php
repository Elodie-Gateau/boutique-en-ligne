<section class="hero">
    <div class="hero__content">
        <h1 class="hero__title">Bienvenue sur notre boutique en ligne!</h1>
        <p class="hero__description">
            Découvrez un large choix de fruits et légumes frais, sélectionnés avec soin pour vous offrir le meilleur de la nature!<br>
            Notre site vous permet de parcourir facilement notre catalogue, d'ajouter vos produits préférés à votre panier et de finaliser vos commandes en toute simplicité.<br><br>
            Que vous soyez à la recherche de saveurs authentiques ou que vous souhaitiez faire le plein de vitamines, vous trouverez forcément votre bonheur parmi nos produits de qualité.<br><br>
            Bonne visite et bon shopping !
        </p>
    </div>
</section>

<section class="products">

    <div class="products__search">

        <div class="products__search-bar">
            <form action="index.php?page=search" method="POST" class="products__form">
                <input type="text" name="search_query" class="products__input" placeholder="Rechercher un produit">
                <input type="submit" class="products__submit" value="Rechercher">
                <a href="index.php?page=accueil" class="products__submit products__submit--reset">Réinitialiser</a>
            </form>

            <?php foreach ($produits ?? [] as $produit): ?>
            <?php endforeach; ?>
            <?php if (empty($produits)): ?>

                <p class="indisponible99">Aucun produit ne correspond à votre recherche.</p>
            <?php endif; ?>
        </div>
    </div>


    <div class="products__list">
        <?php
        foreach ($produits as $produit): ?>
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