<section class="profil-user">
    <h2>Mon Profil</h2>

    <ul>
        <li><strong>Nom :</strong> <?= e($_SESSION['nom'] ?? 'Non défini') ?></li>
        <li><strong>Prénom :</strong> <?= e($_SESSION['prenom'] ?? 'Non défini') ?></li>
        <li><strong>Email :</strong> <?= e($_SESSION['email'] ?? 'Non défini') ?></li>
    </ul>

    <a href="index.php?page=modifierProfil">
        <button>Modifier mes informations</button>
    </a>
</section>

<section class="historique-commande">
    <h2>Historique des commandes</h2>
    <table>
        <tr>
            <th>Date de la commande</th>
            <th>Statut de la commande</th>
            <th>Montant total</th>
            <th></th>
        </tr>
        <?php foreach ($commandes as $commande) { ?>
            <tr>
                <td><?= $commande->getDateCommande() ?></td>
                <td><?= $commande->getStatut() ?></td>
                <td><?= $commande->getTotal() ?> €</td>
                <td><a href="">Voir les détails</a></td>
            </tr>

        <?php } ?>
    </table>
</section>