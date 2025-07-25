<?php

class AdminController
{
    public function showDashboard()
    {
        $utilisateurs = UtilisateursRepository::findAllUsers();
        $produits = ProduitsRepository::findAll();
        require './view/admin/adminDashboard.php';
    }

    public function supprimerUtilisateur()
    {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = (int)$_GET['id'];
            $user = UtilisateursRepository::findById($id);
            $userStatut = $user->getStatut();
            if ($userStatut === "actif") {
                $statut = "inactif";
            } else if ($userStatut === "inactif") {
                $statut = "actif";
            }
            UtilisateursRepository::deleteById($id, $statut);
        }
        header('Location: index.php?page=adminDashboard');
        exit;
    }

    public function modifierUtilisateur()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new Utilisateur();
            $user->setId((int)$_POST['id']);
            $user->setNom($_POST['nom']);
            $user->setPrenom($_POST['prenom']);
            $user->setEmail($_POST['email']);
            $user->setAdmin($_POST['admin'] === '1');

            UtilisateursRepository::update($user);
            header('Location: index.php?page=adminDashboard');
            exit;
        }
        $user = null;
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $user = UtilisateursRepository::findById((int)$_GET['id']);
        }

        require './view/admin/modifierUtilisateur.php';
    }

    public function modifierProduit()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product = ProduitsRepository::findById((int)$_POST['id']);
            $url_img = $product->getUrl_img();

            if (isset($_FILES['url_img'])) {

                $tmpName = $_FILES['url_img']['tmp_name'];
                $fileName = basename($_FILES['url_img']['name']);
                $destination = 'public/images/products/' . $fileName;

                if (move_uploaded_file($tmpName, $destination)) {
                    $url_img = $destination;
                } else {
                    $message = "Erreur lors de l'envoi de l'image.";
                }
            }


            $product->setId((int)$_POST['id']);
            $product->setNom($_POST['nom']);
            $product->setPrix($_POST['prix_unitaire']);
            $product->setDescription($_POST['description']);
            $product->setType($_POST['type']);
            $product->setUrl_img($url_img);

            ProduitsRepository::update($product);
            header('Location: index.php?page=adminDashboard');
            exit;
        }
        $product = null;
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $product = ProduitsRepository::findById((int)$_GET['id']);
        }

        require './view/admin/modifierProduit.php';
    }
}
