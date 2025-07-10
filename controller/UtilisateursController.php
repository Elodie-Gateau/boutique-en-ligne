<?php

require_once __DIR__ . '/../utils/utils.php';

class UtilisateursController
{
    public function register()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user = new Utilisateur;
            $user->setNom($_POST['nom']);
            $user->setPrenom($_POST['prenom']);
            $user->setEmail($_POST['email']);

            $password = passwordHash($_POST['password']);

            $user->setPassword($password);

            UtilisateursRepository::create($user);

            header('Location: index.php?page=accueil');
            exit;
        } else {
            require __DIR__ . '/../view/inscription.php';
        }
    }
}
