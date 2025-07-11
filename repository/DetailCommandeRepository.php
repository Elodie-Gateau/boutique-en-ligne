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


    public static function findByIdCommand($idCommand)
    {

        $pdo = Database::connect();
        $sql = "SELECT 
                cp.id_produit,
                cp.quantite,
                cp.prix_total,
                p.nom,
                p.prix_unitaire,
                p.description,
                c.statut,
                c.date_commande,
                c.total
                FROM commandes_par_produits cp 
                JOIN commandes c ON cp.id_commande = c.id
                JOIN produits p ON cp.id_produit = p.id
                WHERE cp.id_commande = :id_commande;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id_commande' => $idCommand
        ]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $detailsCommand = [];

        foreach ($rows as $row) {
            $articles = new DetailCommande;
            $articles->setIdProduit($row['id_produit']);
            $articles->setQuantite($row['quantite']);
            $articles->setPrixTotal($row['prix_total']);
            $articles->setNomProduit($row['nom']);
            $articles->setPrixUnitaireProduit($row['prix_unitaire']);
            $articles->setDescriptionProduit($row['description']);
            $articles->setStatut($row['statut']);
            $articles->setDateCommande($row['date_commande']);
            $articles->setTotal($row['total']);
            $detailsCommand[] = $articles;
        }

        return $detailsCommand;
    }
}
