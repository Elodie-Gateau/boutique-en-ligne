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
        </form>
    </section>
    <section class="admin-products__list"></section>
</section>

<?php
$uploaddir = '/public/images';
$filename = basename($_FILES['admin-products__select']['name']);
$uploadfile = $uploaddir . $filename;

echo '
<pre>';

if (isset($_FILES['userfile']) && $_FILES['userfile']['error'] === UPLOAD_ERR_OK) {
    $tmpFile = $_FILES['userfile']['tmp_name'];

    // Vérification simple du type de fichier (par extension)
    $allowed_ext = ['jpg', 'jpeg', 'png', 'pdf'];
    $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed_ext)) {
        echo "Type de fichier non autorisé.";
    } elseif (move_uploaded_file($tmpFile, $uploadfile)) {
        echo "Le fichier a été téléchargé avec succès.\n";
    } else {
        echo "Échec du téléchargement.\n";
    }

    print_r($_FILES);
} else {
    echo "Aucun fichier envoyé ou erreur détectée.";
}

echo '</pre>';
?>