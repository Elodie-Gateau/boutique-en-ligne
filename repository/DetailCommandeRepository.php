<?php

class DetailCommmandeRepository
{

    public static function insert(DetailCommande $article): void
    {
        $pdo = Database::connect();
        $sql = "INSERT INTO commandes_par_produits (
        id_produit,
        id_commande,
        quantite,
        prix_total) VALUES (
        :id_produit,
        :id_commande,
        :quantite,
        :prix_total);";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id_produit' => $article->getIdProduit(),
            'id_commande' => $article->getIdCommande(),
            'quantite' => $article->getQuantite(),
            'prix_total' => $article->getPrixTotal()
        ]);
    }

    public static function findAll()
    {

        $pdo = Database::connect();
        $sql = "SELECT * FROM commandes;";
        $stmt = $pdo->query($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $commandes = [];

        foreach ($rows as $row) {
            $commande = new Commande;
            $commande->setId($row['id']);
            $commande->setIdUser($row['id_user']);
            $commande->setTotal($row['total']);
            $commande->setStatut($row['statut']);
            $commande->setDateCommande($row['date_commande']);
            $commandes[] = $commande;
        }

        return $commandes;
    }
    public static function findByIdUser($IdUser)
    {

        $pdo = Database::connect();
        $sql = "SELECT * FROM commandes WHERE id_user = :id_user;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id_user' => $IdUser
        ]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $commandes = [];

        foreach ($rows as $row) {
            $commande = new Commande;
            $commande->setId($row['id']);
            $commande->setIdUser($row['id_user']);
            $commande->setTotal($row['total']);
            $commande->setStatut($row['statut']);
            $commande->setDateCommande($row['date_commande']);
            $commandes[] = $commande;
        }

        return $commandes;
    }
}
