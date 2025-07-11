<section class="admin-products">
    <h2 class="admin-products__title">Ajouter un produit</h2>
    <section class="admin-products__add">

        <?php if (!empty($message)): ?>
            <div class="admin-products__success"><?= $message ?></div>
        <?php endif; ?>

        <form action="index.php?page=addproduct" method="POST" class="admin-products__form">
            <div class="admin-products__field">
                <label for="nom" class="admin-products__label">Nom du produit</label>
                <input type="text" name="nom" id="nom" class="admin-products__input">
            </div>
            <div class="admin-products__field">
                <label for="prix_unitaire" class="admin-products__label">Prix unitaire du produit</label>
                <input type="number" name="prix_unitaire" id="prix_unitaire" class="admin-products__input" step="any">
            </div>
            <div class="admin-products__field">
                <label for="description" class="admin-products__label">Description</label>
                <textarea name="description" id="description" class="admin-products__textarea"></textarea>
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
                <input type="text" name="url_img" id="url_img" class="admin-products__input">
            </div>
            <input type="submit" class="admin-products__submit" value="Ajouter le produit">
            //////////////////////////////////////////////////////////


            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <!-- Optionnel : limiter côté client à 3 Mo -->
                <input type="hidden" name="MAX_FILE_SIZE" value="9000000000" />
                Sélectionnez un fichier :
                <input type="file" name="userfile" required />
                <br><br>
                <input type="submit" class="admin-products__submit" value="Envoyer le fichier" />





                ///////////////////////////////////////////////////////
            </form>
    </section>
    <section class="admin-products__list"></section>
</section>