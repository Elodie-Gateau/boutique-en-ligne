<?php
require_once __DIR__ . '/../repository/UtilisateursRepository.php';


class UtilisateursController
{

    public function signIn()
    {
        // $inscription = UtilisateursRepository::Register();
        UtilisateursRepository::Register();
    }
}
