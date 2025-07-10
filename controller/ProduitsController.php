<?php
class ProduitsController
{

    public function addProduct()
    {

        if (!isset($_SESSION['email'])) {
            header('Location: index.php?page=accueil');
            exit;
        }

        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product = new Produit;
            $product->setNom($_POST['nom']);
            $product->setPrix($_POST['prix_unitaire']);
            $product->setDescription($_POST['description']);
            $product->setType($_POST['type']);
            $product->setUrl_img($_POST['url_img']);

            ProduitsRepository::addProduct($product);

            $message = "Produit ajouté avec succès !";
        }

        require './view/admin/administrateurProduit.php';
    }

    public static function listProducts()
    {
        return ProduitsRepository::findAll();
    }
}
