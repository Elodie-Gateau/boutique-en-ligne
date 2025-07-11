<?php

if (isset($_SESSION['panier'])) : ?>


    <table>
        <tr>
            <th>Produit</th>
            <th>Prix unitaire</th>
            <th>Quantité</th>
            <th>Total</th>
        </tr>

        <?php

        $panier = $_SESSION['panier'];

        foreach ($panier as $item): ?>

            <tr>
                <td> <?= $item['produit_nom']; ?> </td>
                <td> <?= $item['prix_unitaire']; ?> </td>
                <td> <?= $item['quantite']; ?> </td>
                <td> <?= $item['prix_total']; ?></td>
            </tr>

        <?php endforeach; ?>

    </table>
<?php endif; ?>