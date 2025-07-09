<?php
require_once './repository/UtilisateursRepository.php';


class UtilisateursController
{

    public function signIn()
    {
        $inscription = UtilisateursRepository::Register();
        require_once '../view/inscription.php';
        // $repository = new UtilisateursRepository;
        // $repository->register();
    }
}
