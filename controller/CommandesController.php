<?php

class CommandesController
{

    public function panier()
    {

        // Vider le panier
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'vider') {
            $_SESSION['panier'] = [];
        }

        // Remplir le panier
        else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $item = [
                'quantite' => $_POST['quantite'],
                'produit_nom' => $_POST['produit_nom'],
                'id_produit' => $_POST['id_produit'],
                'prix_unitaire' => $_POST['prix_unitaire'],
                'prix_total' => ($_POST['prix_unitaire'] * $_POST['quantite'])
            ];


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
        if (isset($_SESSION['panier']) && isset($_SESSION['id_user'])) {
            $panier = $_SESSION['panier'];
            $totalCommande = $_SESSION['total_commande'];
            $idUser = $_SESSION['id_user'];
            $now = date('Y-m-d H:i:s');

            $commande = new Commande;
            $commande->setIdUser($idUser);
            $commande->setTotal($totalCommande);
            $commande->setStatut('En cours de traitement');
            $commande->setDateCommande($now);

            CommandesRepository::insert($commande);

            $pdo = Database::connect();
            $idCommande = $pdo->lastInsertId();

            foreach ($panier as $article) {
                $commandeParProduit = new DetailCommande;
                $commandeParProduit->setIdProduit($article['id_produit']);
                $commandeParProduit->setIdCommande($idCommande);
                $commandeParProduit->setQuantite($article['quantite']);
                $commandeParProduit->setPrixTotal($article['prix_total']);

                DetailCommmandeRepository::insert($commandeParProduit);
            }
            $_SESSION['panier'] = [];
            header('Location: index.php?page=profil');
            exit;
        }
    }


    public function findDetailsCommand()
    {
        if (isset($_POST['idCommand'])) {
            $idCommand = e($_POST['idCommand']);
            $commande = CommandesRepository::findByIdCommand($idCommand);
            $detailsCommand = DetailCommmandeRepository::findByIdCommand($idCommand);
            require './view/detailCommande.php';
        } else {
            echo "Aucune commande trouvée.";
        }
    }


    public function modifierPanier()
    {
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
            $action = $_POST['action'];
            $idProduit = $_POST['id_produit'];

            // Supprimer un produit
            if ($action === 'supprimer') {
                foreach ($_SESSION['panier'] as $key => $article) {
                    if ($article['id_produit'] == $idProduit) {
                        unset($_SESSION['panier'][$key]);
                        break;
                    }
                }

                // Réindexer le tableau pour éviter les trous
                $_SESSION['panier'] = array_values($_SESSION['panier']);
            }

            // (Optionnel : ajouter une action "modifierQuantite" si tu veux ajouter + / - plus tard)
        }

        header('Location: index.php?page=panier'); // ou detailCommande selon où tu veux rediriger
        exit;
    }
}
