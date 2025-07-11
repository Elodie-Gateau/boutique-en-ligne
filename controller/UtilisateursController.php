<?php

require_once __DIR__ . '/../utils/utils.php';

class UtilisateursController
{
    public function register()
    {

        if (isset($_SESSION['email'])) {
            header('Location: index.php?page=accueil');
            exit;
        }

        $message = '';
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user = new Utilisateur;
            $user->setNom($_POST['nom']);
            $user->setPrenom($_POST['prenom']);
            $user->setEmail($_POST['email']);
            $password = passwordHash($_POST['password']);
            $user->setPassword($password);

            $errors = verifyForm(
                $user->setNom($_POST['nom']),
                $user->setPrenom($_POST['prenom']),
                $user->setEmail($_POST['email']),
                $user->setPassword($password)
            );

            if (empty($errors)) {
                UtilisateursRepository::create($user);
                $message = "L'inscription a été réalisée avec succès !";
            }
        }

        require './view/user/inscription.php';
    }


    public function log()
    {

        if (isset($_SESSION['email'])) {
            header('Location: index.php?page=accueil');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new Utilisateur;
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);

            UtilisateursRepository::select($user);


            header('Location: index.php?page=accueil');
            exit;
        } else {
            require './view/user/connexion.php';
        }
    }
}
