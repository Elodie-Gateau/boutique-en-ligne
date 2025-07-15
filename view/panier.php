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
                <td>
                    <!-- Bouton augmenter la quantite -->
                    <form method="POST" action="index.php?page=panier">
                        <input type="hidden" name="action" value="up">
                        <input type="hidden" name="id_produit" value="<?= $item['id_produit']; ?>">
                        <input type="submit" value="✚">
                    </form>

                    <?= $item['quantite']; ?>

                    <!-- Bouton baisser la quantite -->
                    <form method="POST" action="index.php?page=panier">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id_produit" value="<?= $item['id_produit']; ?>">
                        <input type="submit" value="−">
                    </form>
                </td>
                <td> <?= number_format($item['prix_total'], 2, ',', ''); ?> €</td>
                <td>
                    <!-- Bouton supprimer du panier -->
                    <form method="POST" action="index.php?page=panier">
                        <input type="hidden" name="action" value="delete">
                        <input type="hidden" name="id_produit" value="<?= $item['id_produit']; ?>">
                        <input type="submit" value="🗑️">
                    </form>
                </td>
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