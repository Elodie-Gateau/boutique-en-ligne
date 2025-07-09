<?php

session_start();

class UtilisateursRepository
{

    public static function register()
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

        $passwordHash = password_hash($_POST['password'], PASSWORD_ARGON2ID);

        $stmt->execute([
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'email' => $_POST['email'],
            'password' => $passwordHash,
        ]);

        header('Location: index.php?page=accueil');
        exit;
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
