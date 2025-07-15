<section class="commande-detail">
    <h2 class="commande-detail__title">Détail de la commande référence : <?= $commande->getId() ?></h2>
    <div class="commande-detail__infos">
        <p class="commande-detail__info"><strong>Date :</strong> <?= $commande->getDateCommande() ?></p>
        <p class="commande-detail__info"><strong>Statut :</strong> <?= $commande->getStatut() ?></p>
    </div>
    <table class="commande-detail__table">
        <thead>
            <tr>
                <th class="commande-detail__th">Nom</th>
                <th class="commande-detail__th">Prix unitaire</th>
                <th class="commande-detail__th">Quantité</th>
                <th class="commande-detail__th">Prix total</th>
                <th class="commande-detail__th"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detailsCommand as $articles) { ?>
                <tr>
                    <td class="commande-detail__td"><?= $articles->getNomProduit() ?></td>
                    <td class="commande-detail__td"><?= number_format($articles->getPrixUnitaireProduit(), 2, ",", " ") ?> €</td>
                    <td class="commande-detail__td"><?= $articles->getQuantite() ?></td>
                    <td class="commande-detail__td"><?= number_format($articles->getPrixTotal(), 2, ",", " ") ?> €</td>
                    <td class="commande-detail__td"></td>
                </tr>
            <?php } ?>
            <tr>
                <td class="commande-detail__td"></td>
                <td class="commande-detail__td"></td>
                <td class="commande-detail__td"></td>
                <td class="commande-detail__td commande-detail__td--total">Total de la commande</td>
                <td class="commande-detail__td commande-detail__td--total"><?= number_format($commande->getTotal(), 2, ",", " ") ?> €</td>
            </tr>
        </tbody>
    </table>
</section>