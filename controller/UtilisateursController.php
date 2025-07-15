<?php

require_once __DIR__ . '/../utils/utils.php';

class UtilisateursController
{
    public function register()
    {



        $message = '';
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $nom = $_POST['nom'] ?? '';
            $prenom = $_POST['prenom'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $errors = verifyForm($nom, $prenom, $email, $password);

            if (empty($errors)) {

                $user = new Utilisateur;
                $user->setNom($_POST['nom']);
                $user->setPrenom($_POST['prenom']);
                $user->setEmail($_POST['email']);
                $password = passwordHash($_POST['password']);
                $user->setPassword($password);
                $user->setStatut("actif");

                UtilisateursRepository::create($user);
                $message = "L'inscription a été réalisée avec succès !";
            }
        }

        require './view/user/inscription.php';
    }


    public function log()
    {

        $message = '';


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new Utilisateur;
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);

            $loginSuccess = UtilisateursRepository::select($user);

            if ($loginSuccess) {
                header('Location: index.php?page=accueil');
                exit;
            } else {
                $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
            }
        }

        require './view/user/connexion.php';
    }

    public function profil()

    {

        $commandes = CommandesRepository::findByIdUser($_SESSION['id_user']);
        require './view/user/profil.php';
    }

    public function modifierProfil()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new Utilisateur();
            $user->setId($_SESSION['id_user']);
            $user->setNom($_POST['nom']);
            $user->setPrenom($_POST['prenom']);
            $user->setEmail($_POST['email']);

            $_SESSION['nom'] = $_POST['nom'];
            $_SESSION['prenom'] = $_POST['prenom'];
            $_SESSION['email'] = $_POST['email'];

            UtilisateursRepository::update($user);

            header('Location: index.php?page=profil');
            exit;
        }

        require './view/user/modifierProfil.php';
    }
}
