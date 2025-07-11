<?php

class CommandesController
{

    public function panier()
    {



        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $item = [
                'quantite' => $_POST['quantite'],
                'produit_nom' => $_POST['produit_nom'],
                'id_produit' => $_POST['id_produit'],
                'prix_unitaire' => $_POST['prix_unitaire'],
                'prix_total' => ($_POST['prix_unitaire'] * $_POST['quantite'])
            ];
            // $item->setQuantite();
            // $item->setIdProduit($_POST['id_produit']);
            // $item->setPrixTotal($_POST['prix_unitaire'] * $_POST['quantite']);
            // $item->setNomProduit($_POST['produit_nom']);

            if (!isset($_SESSION['panier'])) {
                $panier = [];
            } else {
                $panier = $_SESSION['panier'];
            }

            $panier[] = $item;

            $_SESSION['panier'] = $panier;
        }
        require './view/panier.php';
    }


    public function validCommand()
    {
        $panier = $_SESSION['panier'];
        $id_utilisateur = $_SESSION['id_utilisateur'];
    }
}
