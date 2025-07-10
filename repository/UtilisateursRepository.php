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
            password,
            admin     
        ) VALUES (
            :nom,
            :prenom,
            :email,
            :password,
            :admin
        );";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'admin' => $user->getAdmin()
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

        if ($userBDD && passwordVerify($user->getPassword(), $userBDD['password'])) {
            $userConnected = new Utilisateur;
            $userConnected->setNom($userBDD['nom']);
            $userConnected->setPrenom($userBDD['prenom']);
            $userConnected->setEmail($userBDD['email']);
            $userConnected->setPassword($userBDD['password']);
            $userConnected->setAdmin($userBDD['admin']);

            $_SESSION['email'] = $userConnected->getEmail();
            $_SESSION['prenom'] = $userConnected->getPrenom();

            header('Location: index.php?page=accueil');
            exit;
        } else {
            echo "Le nom d'utilisateur ou le mot de passe est incorrecte.";
        }
    }






    public static function logIn()
    {

        $pdo = Database::connect();

        $sql = "SELECT * FROM utilisateurs WHERE email = :email";

        $stmt = $pdo->prepare($sql);


        $stmt->execute([
            "email" => $_POST['email']
        ]);

        $email = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($email && password_verify($_POST["password"], $email["password"])) {
            $_SESSION['email'] = $email['email'];

            header('Location: index?page=accueil.php');
            exit;
        } else {
            echo "Le nom d'utilisateur ou le mot de passe est incorrecte.";
        }
    }

    public static function LogOut()
    {

        session_start();
        session_unset();
        session_destroy();
        header('Location: accueil.php');
        exit;
    }
}
