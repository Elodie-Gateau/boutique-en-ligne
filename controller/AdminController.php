<?php

class AdminController
{
    public function showDashboard()
    {
        $utilisateurs = UtilisateursRepository::findAllUsers();
        $produits = ProduitsRepository::findAll();
        require './view/admin/adminDashboard.php';
    }
}
