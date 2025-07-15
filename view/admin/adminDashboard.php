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
                <th class="admin-dashboard__th">Visibilité</th>
                <th class="admin-dashboard__th">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($produits as $produit): ?>
                <tr>
                    <td class="admin-dashboard__td"><?= e($produit->getNom()) ?></td>
                    <td class="admin-dashboard__td"><?= e($produit->getDescription()) ?></td>
                    <td class="admin-dashboard__td"><?= e(number_format($produit->getPrix(), 2, ',', ' ')) ?> €</td>
                    <td class="admin-dashboard__td"><?= e($produit->getStatut()) ?></td>
                    <td class="admin-dashboard__td">
                        <a class="admin-dashboard__action" href="index.php?page=modifierProduit&id=<?= e($produit->getId()) ?>">Modifier</a> |
                        <a class="admin-dashboard__action" href="index.php?page=supprimerProduit&id=<?= e($produit->getId()) ?>" onclick="return confirm('Modifier la visibilité de ce produit ?')">
                            <?php if ($produit->getStatut() === "en ligne") {
                                echo 'Désactiver';
                            } else if ($produit->getStatut() === "hors ligne") {
                                echo 'Activer';
                            } ?> </a>
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
                <th class="admin-dashboard__th">Statut</th>
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
                    <td class="admin-dashboard__td"><?= e($user['statut'])  ?></td>
                    <td class="admin-dashboard__td">
                        <a class="admin-dashboard__action" href="index.php?page=modifierUtilisateur&id=<?= e($user['id']) ?>">Modifier</a> |
                        <a class="admin-dashboard__action" href="index.php?page=supprimerUtilisateur&id=<?= e($user['id']) ?>" onclick="return confirm('Modifier le statut de cet utilisateur ?')">
                            <?php if ($user['statut'] === "actif") {
                                echo 'Désactiver';
                            } else if ($user['statut'] === "inactif") {
                                echo 'Activer';
                            } ?> </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>