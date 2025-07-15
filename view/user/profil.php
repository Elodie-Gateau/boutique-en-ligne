<section class="profil-dashboard">
    <h2 class="profil-dashboard__title">Mon profil</h2>

    <div class="profil-dashboard__content">
        <div class="profil-dashboard__profil">
            <h3 class="profil-dashboard__subtitle">Informations du profil</h3>
            <ul class="profil-dashboard__infos">
                <li class="profil-dashboard__info"><strong>Nom :</strong> <?= e($_SESSION['nom'] ?? 'Non défini') ?></li>
                <li class="profil-dashboard__info"><strong>Prénom :</strong> <?= e($_SESSION['prenom'] ?? 'Non défini') ?></li>
                <li class="profil-dashboard__info"><strong>Email :</strong> <?= e($_SESSION['email'] ?? 'Non défini') ?></li>
            </ul>
            <a href="index.php?page=modifierProfil">
                <button class="profil-dashboard__btn">Modifier mes informations</button>
            </a>
        </div>

        <div class="profil-dashboard__orders">
            <h3 class="profil-dashboard__subtitle">Historique des commandes</h3>
            <table class="profil-dashboard__table">
                <thead>
                    <tr>
                        <th class="profil-dashboard__th">Date de la commande</th>
                        <th class="profil-dashboard__th">Statut de la commande</th>
                        <th class="profil-dashboard__th">Montant total</th>
                        <th class="profil-dashboard__th"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($commandes as $commande) { ?>
                        <tr>
                            <td class="profil-dashboard__td"><?= $commande->getDateCommande() ?></td>
                            <td class="profil-dashboard__td"><?= $commande->getStatut() ?></td>
                            <td class="profil-dashboard__td"><?= number_format($commande->getTotal(), 2, ",", " ") ?> €</td>
                            <td class="profil-dashboard__td">
                                <form action="index.php?page=detailsCommande" method="POST">
                                    <input type="hidden" name="idCommand" value="<?= $commande->getId() ?>">
                                    <input class="profil-dashboard__action" type="submit" value="Voir les détails">
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>