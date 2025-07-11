<?php

class HomePageController
{
    public function afficherProducts()
    {
        $produits = ProduitsRepository::findAll();
        require './view/accueil.php';
    }
}
