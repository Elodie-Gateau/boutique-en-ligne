<?php
class ProduitsController
{

    public function addProduct()
    {



        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product = new Produit;
            $product->setNom($_POST['nom']);
            $product->setPrix($_POST['prix_unitaire']);
            $product->setDescription($_POST['description']);
            $product->setType($_POST['type']);
            $product->setUrl_img($_POST['url_img']);

            ProduitsRepository::insert($product);

            $message = "Produit ajouté avec succès !";
        }

        require './view/admin/administrateurProduit.php';
    }

    public function supprimerProduit()
    {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = (int)$_GET['id'];
            ProduitsRepository::deleteById($id);
        }

        header('Location: index.php?page=adminDashboard');
        exit;
    }
}
