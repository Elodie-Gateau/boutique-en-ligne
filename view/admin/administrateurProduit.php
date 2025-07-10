<?php ?>
<h2>Espace administrateur</h2>
<section class="addProducts">
    <h3>Ajouter un produit</h3>
    <form action="index.php?page=addproduct" method="POST">
        <div>
            <label for="nom">Nom du produit</label>
            <input type="text" name="nom" id="nom">
        </div>
        <div>
            <label for="prix_unitaire">Prix unitaire du produit</label>
            <input type="number" name="prix_unitaire" id="prix_unitaire">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description"></textarea>
        </div>
        <div>
            <label for="type">Type de produit</label>
            <select name="type" id="type">
                <option value="fruit">Fruit</option>
                <option value="legume">Légume</option>
            </select>
        </div>
        <div>
            <label for="url_img">Lien de l'image</label>
            <input type="text" name="url_img" id="url_img">
        </div>
        <input type="submit" value="Ajouter le produit">

    </form>
</section>
<section class="listProducts">

</section>