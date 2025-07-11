<?php

if (empty($_SESSION['panier'])) {
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
            <td><?php echo number_format($totalPanier, 2, ',', '');
                $_SESSION['total_commande'] = $totalPanier; ?> €</td>
        </tr>
    </table>
    <form method="POST" action="index.php?page=panier">
        <input type="hidden" name="action" value="vider">
        <input type="submit" value="Vider le panier">
    </form>
    <a href="index.php?page=commande">Valider le panier</a>
<?php } ?>