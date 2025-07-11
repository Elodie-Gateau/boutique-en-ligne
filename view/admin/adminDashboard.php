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
                    <td class="admin-dashboard__td"><?= e($produit['nom']) ?></td>
                    <td class="admin-dashboard__td"><?= e($produit['description']) ?></td>
                    <td class="admin-dashboard__td"><?= e($produit['prix_unitaire']) ?> €</td>
                    <td class="admin-dashboard__td">
                        <a class="admin-dashboard__action" href="modifierProduit.php?id=<?= $produit['id'] ?>">Modifier</a> |
                        <a class="admin-dashboard__action" href="supprimerProduit.php?id=<?= $produit['id'] ?>" onclick="return confirm('Supprimer ce produit ?')">Supprimer</a>
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
            </tr>
        </thead>
        <tbody>
            <?php foreach ($utilisateurs as $user): ?>
                <tr>
                    <td class="admin-dashboard__td"><?= htmlspecialchars($user['nom']) ?></td>
                    <td class="admin-dashboard__td"><?= htmlspecialchars($user['prenom']) ?></td>
                    <td class="admin-dashboard__td"><?= htmlspecialchars($user['email']) ?></td>
                    <td class="admin-dashboard__td"><?= $user['admin'] ? 'Oui' : 'Non' ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>