<?php

class UserController
{

    public function register()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user = new User();
            $user->setNom($_POST['nom']);
            $user->setPrenom($_POST['prenom']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);

            UserRepository::create($user);

            header('Location: index.php');

        } else {

            require './view/user/register.php';
        }
    }
}
