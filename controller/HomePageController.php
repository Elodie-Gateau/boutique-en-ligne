<?php

class HomePageController
{

    public function homeProducts()

    {

        $produits = ProduitsRepository::findAll();
        require './view/accueil.php';
    }
}
