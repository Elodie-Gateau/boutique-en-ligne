<?php

class ProduitsRepository
{

    public static function addProduct(Produit $product)
    {

        $pdo = Database::connect();

        $sql = "INSERT INTO produits (
        nom,
        prix_unitaire,
        description,
        type,
        url_img
        ) VALUES (
        :nom,
        :prix_unitaire,
        :description,
        :type,
        :url_img
        );";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nom' => $product->getNom(),
            'prix_unitaire' => $product->getPrix(),
            'description' => $product->getDescription(),
            'type' => $product->getType(),
            'url_img' => $product->getUrl_img()
        ]);
    }

    public static function findAll()
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM produits";

        $stmt = $pdo->query($sql);

        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
}
