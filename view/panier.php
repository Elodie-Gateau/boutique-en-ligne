<?php if (empty($_SESSION['panier'])): ?>
    <section class="panier-dashboard">
        <h2 class="panier-dashboard__title">Votre panier</h2>
        <p class="panier-dashboard__empty">Votre panier est vide</p>
    </section>
<?php else: ?>
    <section class="panier-dashboard">
        <h2 class="panier-dashboard__title">Votre panier</h2>
        <table class="panier-dashboard__table">
            <thead>
                <tr>
                    <th class="panier-dashboard__th">Produit</th>
                    <th class="panier-dashboard__th">Prix unitaire</th>
                    <th class="panier-dashboard__th">Quantité</th>
                    <th class="panier-dashboard__th">Total</th>
                    <th class="panier-dashboard__th"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $panier = $_SESSION['panier'];
                $totalPanier = 0;
                foreach ($panier as $item):
                ?>
                    <tr>
                        <td class="panier-dashboard__td"><?= $item['produit_nom']; ?></td>
                        <td class="panier-dashboard__td"><?= number_format($item['prix_unitaire'], 2, ',', ''); ?> €</td>
                        <td class="panier-dashboard__td">
                            <form class="panier-dashboard__form" method="POST" action="index.php?page=panier" style="display:inline;">
                                <input type="hidden" name="action" value="up">
                                <input type="hidden" name="id_produit" value="<?= $item['id_produit']; ?>">
                                <button type="submit" class="panier-dashboard__btn panier-dashboard__btn--qty">✚</button>
                            </form>
                            <span class="panier-dashboard__qty"><?= $item['quantite']; ?></span>
                            <form class="panier-dashboard__form" method="POST" action="index.php?page=panier" style="display:inline;">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id_produit" value="<?= $item['id_produit']; ?>">
                                <button type="submit" class="panier-dashboard__btn panier-dashboard__btn--qty">−</button>
                            </form>
                        </td>
                        <td class="panier-dashboard__td"><?= number_format($item['prix_total'], 2, ',', ''); ?> €</td>
                        <td class="panier-dashboard__td">
                            <form class="panier-dashboard__form" method="POST" action="index.php?page=panier" style="display:inline;">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id_produit" value="<?= $item['id_produit']; ?>">
                                <button type="submit" class="panier-dashboard__btn panier-dashboard__btn--del">🗑️</button>
                            </form>
                        </td>
                    </tr>
                <?php $totalPanier += $item['prix_total'];
                endforeach; ?>
                <tr>
                    <td class="panier-dashboard__td"></td>
                    <td class="panier-dashboard__td"></td>
                    <td class="panier-dashboard__td panier-dashboard__td--total">Total du panier :</td>
                    <td class="panier-dashboard__td panier-dashboard__td--total"><?php echo number_format($totalPanier, 2, ',', ''); ?> €</td>
                    <td class="panier-dashboard__td"></td>
                </tr>
            </tbody>
        </table>
        <div class="panier-dashboard__actions">
            <form class="panier-dashboard__form" method="POST" action="index.php?page=panier">
                <input type="hidden" name="action" value="vider">
                <button type="submit" class="panier-dashboard__btn panier-dashboard__btn--vider">Vider le panier</button>
            </form>
            <a href="index.php?page=commande" class="panier-dashboard__link">Valider le panier</a>
        </div>
    </section>
<?php endif; ?>