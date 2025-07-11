<?php

class ProduitsRepository
{

    public static function insert(Produit $product)
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

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $products = [];

        foreach ($rows as $row) {
            $product = new Produit;
            $product->setNom($row['nom']);
            $product->setPrix($row['prix_unitaire']);
            $product->setDescription($row['description']);
            $product->setType($row['type']);
            $product->setUrl_img($row['url_img']);
            $products[] = $product;
        }
        return $products;
    }

    public static function delete(Produit $produit)
    {
        $pdo = Database::connect();
        $sql = "DELETE FROM produits WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $produit->getId()
        ]);
    }
}
