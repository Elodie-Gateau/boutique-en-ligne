<?php

class CommandesController
{

    public function panier()
    {



        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $item = new DetailCommande;
            $item->setQuantite($_POST['quantite']);
            $item->setIdProduit($_POST['id_produit']);
            $item->setPrixTotal($_POST['prix_unitaire'] * $_POST['quantite']);
            $item->setNomProduit($_POST['produit_nom']);

            if (!isset($_SESSION['panier'])) {
                $panier = [];
            } else {
                $panier = $_SESSION['panier'];
            }

            $panier[] = $item;

            $_SESSION['panier'] = $panier;

            header('Location: index.php?page=panier');
            exit;
        }
    }
}
