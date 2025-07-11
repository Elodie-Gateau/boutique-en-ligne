<?php

class UtilisateursRepository
{

    public static function create(Utilisateur $user): void
    {

        $pdo = Database::connect();

        $sql = "INSERT INTO utilisateurs (
            nom,
            prenom,
            email,
            password
            -- admin     
        ) VALUES (
            :nom,
            :prenom,
            :email,
            :password
            -- :admin
        );";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            // 'admin' => $user->getAdmin()
        ]);
    }

    public static function select(Utilisateur $user)
    {
        $pdo = Database::connect();

        $sql = "SELECT * FROM utilisateurs WHERE email = :email";
        $stmt = $pdo->prepare($sql);


        $stmt->execute([
            "email" => $user->getEmail(),
        ]);

        $userBDD = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($userBDD && password_Verify($user->getPassword(), $userBDD['password'])) {
            $userConnected = new Utilisateur;
            $userConnected->setId($userBDD['id']);
            $userConnected->setNom($userBDD['nom']);
            $userConnected->setPrenom($userBDD['prenom']);
            $userConnected->setEmail($userBDD['email']);
            $userConnected->setPassword($userBDD['password']);

            $_SESSION['id_user'] = $userConnected->getId();
            $_SESSION['nom'] = $userConnected->getNom();
            $_SESSION['prenom'] = $userConnected->getPrenom();
            $_SESSION['email'] = $userConnected->getEmail();
            $_SESSION['admin'] = $userBDD['admin'];
        } else {
            echo "Le nom d'utilisateur ou le mot de passe est incorrecte.";
            exit;
        }
    }

    public static function findAllUsers()
    {
        $pdo = Database::connect();
        $sql = "SELECT id, nom, prenom, email, admin FROM utilisateurs";
        $stmt = $pdo->query($sql);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public static function LogOut()
    {

        session_unset();
        session_destroy();
        header('Location: index.php?page=accueil');
        exit;
    }

    public static function update(Utilisateur $user)
    {
        $pdo = Database::connect();
        $sql = "UPDATE utilisateurs SET nom = :nom, prenom = :prenom, email = :email WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'email' => $user->getEmail(),
            'id' => $user->getId(),
        ]);
    }

    public static function deleteById(int $id)
    {
        $pdo = Database::connect();
        $sql = "DELETE FROM utilisateurs WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}
