<?php

if (!isset($_SESSION['panier'])) {
    echo "Votre panier est vide";
} else { ?>


    <table>
        <tr>
            <th>Produit</th>
            <th>Prix unitaire</th>
            <th>Quantité</th>
            <th>Total</th>
        </tr>

        <?php

        $panier = $_SESSION['panier'];
        $totalPanier = 0;
        foreach ($panier as $item):
        ?>

            <tr>
                <td> <?= $item['produit_nom']; ?> </td>
                <td> <?= number_format($item['prix_unitaire'], 2, ',', ''); ?> €</td>
                <td> <?= $item['quantite']; ?> </td>
                <td> <?= number_format($item['prix_total'], 2, ',', ''); ?> €</td>
            </tr>
            <?php $totalPanier += $item['prix_total'] ?>
        <?php endforeach; ?>
        <tr>
            <td></td>
            <td></td>
            <td>Total du panier :</td>
            <td><?= number_format($totalPanier, 2, ',', '') ?> €</td>
        </tr>
    </table>

    <a href="index.php?page=commande">Valider le panier</a>
<?php } ?>