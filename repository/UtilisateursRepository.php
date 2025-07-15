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
            return true;
        } else {
            return false;
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
        $sql = "UPDATE utilisateurs SET nom = :nom, prenom = :prenom, email = :email, admin = :admin WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nom' => $user->getNom(),
            'prenom' => $user->getPrenom(),
            'email' => $user->getEmail(),
            'admin' => $user->getAdmin() ? 1 : 0,
            'id' => $user->getId(),
        ]);
    }

    public static function deleteById($id)
    {
        $pdo = Database::connect();
        $sql = "DELETE FROM utilisateurs WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }

    public static function findById($id)
    {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data) {
            $user = new Utilisateur();
            $user->setId($data['id']);
            $user->setNom($data['nom']);
            $user->setPrenom($data['prenom']);
            $user->setEmail($data['email']);
            $user->setPassword($data['password']);
            $user->setAdmin((bool)$data['admin']);
        }

        return $user;
    }
}
