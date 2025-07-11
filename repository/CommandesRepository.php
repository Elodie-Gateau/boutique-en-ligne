<?php

class CommandesRepository
{

    public static function insert(Commande $commande)
    {
        $pdo = Database::connect();
        $sql = "INSERT INTO commandes (
        id_user,
        total,
        statut,
        date_commande) VALUES (
        :id_user,
        :total,
        :statut,
        :date_commande);";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id_user' => $commande->getIdUser(),
            'total' => $commande->getTotal(),
            'statut' => $commande->getStatut(),
            'date_commande' => $commande->getDateCommande()
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

    public static function findByIdCommand($idCommand)
    {

        $pdo = Database::connect();
        $sql = "SELECT * FROM commandes WHERE id = :id_commande;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id_commande' => $idCommand
        ]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);



        if ($row) {
            $commande = new Commande;
            $commande->setId($row['id']);
            $commande->setIdUser($row['id_user']);
            $commande->setTotal($row['total']);
            $commande->setStatut($row['statut']);
            $commande->setDateCommande($row['date_commande']);
        }

        return $commande;
    }
}
