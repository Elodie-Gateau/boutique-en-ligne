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
        if (!empty($_POST['search_query'])) {
            $search = "%" . $_POST['search_query'] . "%";
            $produits = ProduitsRepository::findByName($search);
            if (!is_iterable($produits)) {
                $produits = [];  // On s’assure que c’est toujours un tableau
            }
            require './view/accueil.php';
        } else {
            header('Location: index.php?page=accueil');
            exit;
        }
    }
}
