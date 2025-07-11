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
                <td> <?= $item['prix_unitaire']; ?> €</td>
                <td> <?= $item['quantite']; ?> </td>
                <td> <?= $item['prix_total']; ?> €</td>
            </tr>
            <?php $totalPanier += $item['prix_total'] ?>
        <?php endforeach; ?>
        <tr>
            <td></td>
            <td></td>
            <td>Total du panier :</td>
            <td><?= $totalPanier ?> €</td>
        </tr>
    </table>

    <a href="index.php?page=commande">Valider le panier</a>
<?php } ?>