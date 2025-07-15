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

            // Appel à une méthode du modèle (ex: ProduitsRepository) pour effectuer la recherche
            $produits = ProduitsRepository::findByName($search);

            // Inclure une vue pour afficher les résultats
            require './view/accueil.php';
        } else {
            // Rediriger vers l'accueil s'il n'y a pas de requête
            header('Location: index.php?page=accueil');
            exit;
        }
    }
}
