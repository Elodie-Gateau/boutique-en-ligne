<?php

if (isset($_SESSION['panier'])) {
} ?>


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
            <td> <? $item->getNomProduit(); ?> </td>
            <td> <? $item->getPrixTotal()  / $item->getQuantite(); ?> </td>
            <td> <? $item->getQuantite(); ?> </td>
            <td> <? $item->getPrixTotal(); ?></td>
        </tr>

    <?php endforeach; ?>

</table>