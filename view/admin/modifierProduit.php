<section class="admin-products">
    <h2 class="admin-products__title">Modifier un produit</h2>
    <section class="admin-products__add">



        <form action="index.php?page=modifierProduit" method="POST" class="admin-products__form">
            <div class="admin-products__field">
                <input type="hidden" name="id" value="<?= e($product->getId()) ?>">
                <label for="nom" class="admin-products__label">Nom du produit</label>
                <input type="text" name="nom" id="nom" class="admin-products__input" value="<?= e($product->getNom()) ?>">
            </div>
            <div class=" admin-products__field">
                <label for="prix_unitaire" class="admin-products__label">Prix unitaire du produit</label>
                <input type="number" name="prix_unitaire" id="prix_unitaire" class="admin-products__input" step="any" value="<?= e($product->getPrix()) ?>">
            </div>
            <div class="admin-products__field">
                <label for="description" class="admin-products__label">Description</label>
                <textarea name="description" id="description" class="admin-products__textarea"><?= e($product->getDescription()) ?></textarea>
            </div>
            <div class="admin-products__field">
                <label for="type" class="admin-products__label">Type de produit</label>
                <select name="type" id="type" class="admin-products__select">
                    <option value="fruit">Fruit</option>
                    <option value="legume">Légume</option>
                </select>
            </div>
            <div class="admin-products__field">
                <label for="url_img" class="admin-products__label">Lien de l'image</label>
                <input type="text" name="url_img" id="url_img" class="admin-products__input" value="<?= e($product->getUrl_img()) ?>">

            </div>

            <div class="admin-products__field">
                <label for="image" class="admin-products__label">Image</label>
                <input type="file" name="image" id="image" class="admin-products__input" value="<?= e($product->getUrl_img()) ?>">
            </div>


            <input type="submit" class="admin-products__submit" value="Modifier le produit">
        </form>
    </section>
    <section class="admin-products__list"></section>
</section>