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
            $userConnected->setNom($userBDD['nom']);
            $userConnected->setPrenom($userBDD['prenom']);
            $userConnected->setEmail($userBDD['email']);
            $userConnected->setPassword($userBDD['password']);

            $_SESSION['email'] = $userConnected->getEmail();
            $_SESSION['prenom'] = $userConnected->getPrenom();
            $_SESSION['admin'] = $userBDD['admin'];
        } else {
            echo "Le nom d'utilisateur ou le mot de passe est incorrecte.";
            exit;
        }
    }

    public static function findAllUsers()
    {
        $pdo = Database::connect();
        $sql = "SELECT nom, prenom, email, admin FROM utilisateurs";
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
}
