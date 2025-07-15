<section>
    <h2>Détail de la commande référence : <?= $commande->getId() ?></h2>
    <p>Date de la commande : <?= $commande->getDateCommande() ?></p>
    <p>Statut de la commande : <?= $commande->getStatut() ?></p>

    <table>
        <tr>
            <th>Nom</th>
            <th>Prix unitaire</th>
            <th>Quantité</th>
            <th>Prix total</th>
            <th></th>
        </tr>
        <?php foreach ($detailsCommand as $articles) { ?>
            <tr>
                <td><?= $articles->getNomProduit() ?></td>
                <td><?= number_format($articles->getPrixUnitaireProduit(), 2, ",", " ") ?> €</td>
                <td><?= $articles->getQuantite() ?></td>
                <td><?= number_format($articles->getPrixTotal(), 2, ",", " ") ?> €</td>
                <td></td>
            </tr>
        <?php } ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Total de la commande</td>
            <td><?= number_format($commande->getTotal(), 2, ",", " ") ?> €</td>
        </tr>

    </table>
</section>