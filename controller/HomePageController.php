<?php

class HomePageController
{

    public function homeProducts()

    {

        $produits = ProduitsRepository::findAll();
        require './view/accueil.php';
    }


    public function searchProduct()
    {
        if (isset($_POST['search_query'])) {
            $search = "%" . $_POST['search_query'] . "%";

            $produits = ProduitsRepository::findByName($search);

            require './view/accueil.php';
        } else {
            header('Location: index.php?page=accueil');
            exit;
        }
    }
}
