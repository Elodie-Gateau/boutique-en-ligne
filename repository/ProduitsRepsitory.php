<?php

class ProduitsRepository
{

    public static function addProduct()
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
            'nom' => $_POST['nom'],
            'prix_unitaire' => $_POST['prix_unitaire'],
            'description' => $_POST['description'],
            'type' => $_POST['type'],
            'url_img' => $_POST['url_img']
        ]);

        header("Location: index.php?page=admin");
        exit;
    }

    public static function listProducts()
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM produits";

        $stmt = $pdo->query($sql);

        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
