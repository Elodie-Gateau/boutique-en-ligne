<form action="index.php?page=addproduct" method="POST" class="admin-products__form" enctype="multipart/form-data">
    <div class="admin-products__field">
        <label for="nom" class="admin-products__label">Nom du produit</label>
        <input type="text" name="nom" id="nom" class="admin-products__input" required>
    </div>

    <div class="admin-products__field">
        <label for="prix_unitaire" class="admin-products__label">Prix unitaire du produit</label>
        <input type="number" name="prix_unitaire" id="prix_unitaire" class="admin-products__input" step="any" required>
    </div>

    <div class="admin-products__field">
        <label for="description" class="admin-products__label">Description</label>
        <textarea name="description" id="description" class="admin-products__textarea" required></textarea>
    </div>

    <div class="admin-products__field">
        <label for="type" class="admin-products__label">Type de produit</label>
        <select name="type" id="type" class="admin-products__select" required>
            <option value="fruit">Fruit</option>
            <option value="legume">Légume</option>
        </select>
    </div>

    <div class="admin-products__field">
        <label for="image" class="admin-products__label">Image</label>
        <input type="file" name="image" id="image" class="admin-products__input" required>
    </div>

    <input type="submit" class="admin-products__submit" value="Ajouter le produit">
</form>