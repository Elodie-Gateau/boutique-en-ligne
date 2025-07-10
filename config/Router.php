<?php

class Router
{

    public static function redirect()
    {
        if (isset($_GET['page'])) {
            switch ($_GET['page']) {

                case 'register':

                    $controller = new UtilisateursController();
                    $controller->register();
                    break;

                case 'accueil':

                    require './view/accueil.php';
                    break;

                case 'admin':
                    if (
                        !isset($_SESSION['email'])
                        || !isset($_SESSION['admin'])
                        || !$_SESSION['admin']
                    ) {
                        header('Location: index.php?page=accueil');
                        exit;
                    }
                    require './view/admin/adminDashboard.php';
                    break;

                case 'addproduct':
                    $controller = new ProduitsController();
                    $controller->addProduct();
                    break;
                case 'connexion':
                    $controller = new UtilisateursController();
                    $controller->log();
                    break;

                case 'logout':
                    UtilisateursRepository::logOut();
                    break;

                case 'search':
                    $controller = new ProduitsController();
                    $controller->searchProducts();
                    break;


                default:
                    echo 'Page not found';
                    break;
            }
        }
    }
}
