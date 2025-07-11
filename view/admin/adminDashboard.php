<section class="admin-dashboard">
    <h2 class="admin-dashboard__title">Espace Administrateur</h2>
    <ul class="admin-dashboard__menu">
        <li class="admin-dashboard__menu-item">
            <a class="admin-dashboard__link" href="index.php?page=addproduct">Ajouter un produit</a>
        </li>
    </ul>

    <h2 class="admin-dashboard__subtitle">Liste des produits</h2>
    <table class="admin-dashboard__table">
        <thead>
            <tr>
                <th class="admin-dashboard__th">Nom</th>
                <th class="admin-dashboard__th">Description</th>
                <th class="admin-dashboard__th">Prix unitaire</th>
                <th class="admin-dashboard__th">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produits as $produit): ?>
                <tr>
                    <td class="admin-dashboard__td"><?= e($produit->getNom()) ?></td>
                    <td class="admin-dashboard__td"><?= e($produit->getDescription()) ?></td>
                    <td class="admin-dashboard__td"><?= e(number_format($produit->getPrix(), 2, ',', ' ')) ?> €</td>
                    <td class="admin-dashboard__td">
                        <a class="admin-dashboard__action" href="modifierProduit.php?id=<?= $produit->getId() ?>">Modifier</a> |
                        <a class="admin-dashboard__action" href="index.php?page=supprimerProduit&id=<?= $produit->getId() ?>" onclick="return confirm('Supprimer ce produit ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2 class="admin-dashboard__subtitle">Liste des utilisateurs</h2>
    <table class="admin-dashboard__table">
        <thead>
            <tr>
                <th class="admin-dashboard__th">Nom</th>
                <th class="admin-dashboard__th">Prénom</th>
                <th class="admin-dashboard__th">Email</th>
                <th class="admin-dashboard__th">Admin</th>
                <th class="admin-dashboard__th">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($utilisateurs as $user): ?>
                <tr>
                    <td class="admin-dashboard__td"><?= e($user['nom']) ?></td>
                    <td class="admin-dashboard__td"><?= e($user['prenom']) ?></td>
                    <td class="admin-dashboard__td"><?= e($user['email']) ?></td>
                    <td class="admin-dashboard__td"><?= $user['admin'] ? 'Oui' : 'Non' ?></td>
                    <td class="admin-dashboard__td">
                        <a class="admin-dashboard__action" href="index.php?page=modifierUtilisateur&id=<?= e($user['id']) ?>">Modifier</a> |
                        <a class="admin-dashboard__action" href="index.php?page=supprimerUtilisateur&id=<?= e($user['id']) ?>" onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>