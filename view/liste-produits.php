<div class="search-bar">
    <form action="index.php?page=search" method="POST">
        <input type="text" placeholder="Rechercher un produit">
        <input type="submit" value="Rechercher">
    </form>
</div>
<div class="produits-container">
    <?php foreach ($produits as $produit): ?>
        <div class="card">
            <img src="<?= e($produit['url_img']) ?>" alt="<?= e($produit['nom']) ?>">
            <h3><?= e($produit['nom']) ?></h3>
            <p><?= e($produit['description']) ?></p>
            <span><?= e($produit['prix_unitaire']) ?> €</span>
        </div>
    <?php endforeach; ?>
</div>