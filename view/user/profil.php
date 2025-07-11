<section class="profil-user">
    <div class="register">
        <h2 class="register__title">Mon Profil</h2>
        <ul class="register__form">
            <li class="register__label"><strong>Nom :</strong> <?= e($_SESSION['nom'] ?? 'Non défini') ?></li>
            <li class="register__label"><strong>Prénom :</strong> <?= e($_SESSION['prenom'] ?? 'Non défini') ?></li>
            <li class="register__label"><strong>Email :</strong> <?= e($_SESSION['email'] ?? 'Non défini') ?></li>
        </ul>

        <a href="index.php?page=modifierProfil">
            <button class="register__submit">Modifier mes informations</button>
        </a>
    </div>
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
                <td>
                    <form action="index.php?page=detailsCommande" method="POST">
                        <input type="hidden" name="idCommand" value="<?= $commande->getId() ?>">
                        <input type="submit" value="Voir les détails">
                    </form>
                </td>
            </tr>

        <?php } ?>
    </table>
</section>