<?php

class UtilisateursController
{
    public function signIn()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            UtilisateursRepository::register();
        } else {
            require './view/inscription.php';
        }
    }
}
