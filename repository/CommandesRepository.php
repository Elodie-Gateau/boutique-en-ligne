<?php

class CommmandesRepository
{

    public static function insert(Commande $commande)
    {
        $pdo = Database::connect();
        $sql = "INSERT INTO commandes (
        id_user,
        total,
        statut,
        date_commande) VALUES 
        :id_user,
        :total,
        :statut,
        :date_commande;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id_user' => $commande->getIdUser(),
            'total' => $commande->getTotal(),
            'statut' => $commande->getStatut(),
            'date_commande' => $commande->getDateCommande()
        ]);
    }
}
