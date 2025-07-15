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
        url_img,
        statut
        ) VALUES (
        :nom,
        :prix_unitaire,
        :description,
        :type,
        :url_img,
        :statut
        );";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nom' => $product->getNom(),
            'prix_unitaire' => $product->getPrix(),
            'description' => $product->getDescription(),
            'type' => $product->getType(),
            'url_img' => $product->getUrl_img(),
            'statut' => $product->getStatut()
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
            $product->setId($row['id']);
            $product->setNom($row['nom']);
            $product->setPrix($row['prix_unitaire']);
            $product->setDescription($row['description']);
            $product->setType($row['type']);
            $product->setUrl_img($row['url_img']);
            $product->setStatut($row['statut']);
            $products[] = $product;
        }
        return $products;
    }
    public static function findAllOnline()
    {
        $pdo = Database::connect();
        $sql = "SELECT * FROM produits WHERE statut = 'en ligne'";

        $stmt = $pdo->query($sql);

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $products = [];

        foreach ($rows as $row) {
            $product = new Produit;
            $product->setId($row['id']);
            $product->setNom($row['nom']);
            $product->setPrix($row['prix_unitaire']);
            $product->setDescription($row['description']);
            $product->setType($row['type']);
            $product->setUrl_img($row['url_img']);
            $product->setStatut($row['statut']);
            $products[] = $product;
        }
        return $products;
    }

    public static function update(Produit $product)
    {
        $pdo = Database::connect();
        $sql = "UPDATE produits SET nom = :nom, prix_unitaire = :prix_unitaire, description = :description, type = :type, url_img = :url_img WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nom' => $product->getNom(),
            'prix_unitaire' => $product->getPrix(),
            'description' => $product->getDescription(),
            'type' => $product->getType(),
            'url_img' => $product->getUrl_img(),
            'id' => $product->getId(),
        ]);
    }

    public static function findById($id)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM produits WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $product = new Produit();
            $product->setId($data['id']);
            $product->setNom($data['nom']);
            $product->setPrix($data['prix_unitaire']);
            $product->setDescription($data['description']);
            $product->setType($data['type']);
            $product->setUrl_img($data['url_img']);
            $product->setStatut($data['statut']);
        }

        return $product;
    }


    public static function findByName($name)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM produits WHERE nom LIKE :name");
        $stmt->execute(['name' => $name]);
        $datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($datas) {
            $products = [];
            foreach ($datas as $data) {
                $product = new Produit();
                $product->setId($data['id']);
                $product->setNom($data['nom']);
                $product->setPrix($data['prix_unitaire']);
                $product->setDescription($data['description']);
                $product->setType($data['type']);
                $product->setUrl_img($data['url_img']);
                $product->setStatut($data['statut']);
                $products[] = $product;
            }

            return $products;
        }
    }


    public static function deleteById(int $id, string $statut)
    {
        $pdo = Database::connect();
        $sql = "UPDATE produits SET statut = :statut WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'statut' => $statut
        ]);
    }

    public static function search($keyword)
    {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM produits WHERE nom LIKE :keyword OR description LIKE :keyword");
        $stmt->execute(['keyword' => '%' . $keyword . '%']);
        return $stmt->fetchAll();
    }
}
