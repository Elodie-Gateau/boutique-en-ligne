<?php

session_start();

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
        ) VALUES (
            :nom,
            :prenom,
            :email,
            :password
        );";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
        ]);
    }

    public static function LogIn(PDO $pdo, string $email)
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
