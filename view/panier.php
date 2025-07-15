<section class="panier-dashboard">
    <h2 class="panier-dashboard__title">Votre panier</h2>
    <?php if (empty($_SESSION['panier'])): ?>
        <div class="panier-dashboard__empty">Votre panier est vide</div>
    <?php else: ?>
        <table class="panier-dashboard__table">
            <tr>
                <th class="panier-dashboard__th">Produit</th>
                <th class="panier-dashboard__th">Prix unitaire</th>
                <th class="panier-dashboard__th">Quantité</th>
                <th class="panier-dashboard__th">Total</th>
            </tr>
            <?php
            $panier = $_SESSION['panier'];
            $totalPanier = 0;
            foreach ($panier as $item):
            ?>
                <tr>
                    <td class="panier-dashboard__td"><?= htmlspecialchars($item['produit_nom']); ?></td>
                    <td class="panier-dashboard__td"><?= number_format($item['prix_unitaire'], 2, ',', ''); ?> €</td>
                    <td class="panier-dashboard__td">
                        <form method="POST" action="index.php?page=panier" class="panier-dashboard__form" style="display:inline;">
                            <input type="hidden" name="action" value="up">
                            <input type="hidden" name="id_produit" value="<?= $item['id_produit']; ?>">
                            <input type="submit" class="panier-dashboard__btn panier-dashboard__btn--qty" value="✚">
                        </form>

                        <span class="panier-dashboard__qty"><?= $item['quantite']; ?></span>

                        <form method="POST" action="index.php?page=panier" class="panier-dashboard__form" style="display:inline;">
                            <input type="hidden" name="action" value="down">
                            <input type="hidden" name="id_produit" value="<?= $item['id_produit']; ?>">
                            <input type="submit" class="panier-dashboard__btn panier-dashboard__btn--qty" value="−">
                        </form>
                    </td>
                    <td class="panier-dashboard__td"><?= number_format($item['prix_total'], 2, ',', ''); ?> €</td>
                    <td class="panier-dashboard__td">
                        <form method="POST" action="index.php?page=panier" class="panier-dashboard__form">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id_produit" value="<?= $item['id_produit']; ?>">
                            <input type="submit" class="panier-dashboard__btn panier-dashboard__btn--del" value="🗑️">
                        </form>
                    </td>
                </tr>
                <?php $totalPanier += $item['prix_total'] ?>
            <?php endforeach; ?>
            <tr>
                <td class="panier-dashboard__td"></td>
                <td class="panier-dashboard__td"></td>
                <td class="panier-dashboard__td panier-dashboard__td--total">Total du panier :</td>
                <td class="panier-dashboard__td panier-dashboard__td--total">
                    <?php echo number_format($totalPanier, 2, ',', '');
                    $_SESSION['total_commande'] = $totalPanier; ?> €
                </td>
            </tr>
        </table>
        <form method="POST" action="index.php?page=panier" class="panier-dashboard__form">
            <input type="hidden" name="action" value="vider">
            <input type="submit" class="panier-dashboard__btn panier-dashboard__btn--vider" value="Vider le panier">
        </form>
        <a href="index.php?page=commande" class="panier-dashboard__link">Valider le panier</a>
    <?php endif; ?>
</section>