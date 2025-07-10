<?php
class ProduitsController
{

    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product = new Produit;
            $product->setNom($_POST['nom']);
            $product->setPrix($_POST['prix_unitaire']);
            $product->setDescription($_POST['description']);
            $product->setType($_POST['type']);
            $product->setUrl_img($_POST['url_img']);
        }


        ProduitsRepository::addProduct($product);
    }

    public static function listProducts()
    {
        return ProduitsRepository::findAll();
    }


    public static function searchProducts()
    {
        if (!empty($_POST['search'])) {
            return ProduitsRepository::searchByNom($_POST['search']);
        }
    }
}
