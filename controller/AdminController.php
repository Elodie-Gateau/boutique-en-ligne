<?php

class AdminController
{
    public function showDashboard()
    {
        $utilisateurs = UtilisateursRepository::findAllUsers();
        $produits = ProduitsRepository::findAll();
        require './view/admin/adminDashboard.php';
    }

    public function supprimerUtilisateur()
    {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = (int)$_GET['id'];
            UtilisateursRepository::deleteById($id);
        }
        header('Location: index.php?page=adminDashboard');
        exit;
    }
}
