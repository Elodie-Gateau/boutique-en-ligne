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
                    require './view/admin/administrateurProduit.php';
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


                default:
                    echo 'Page not found';
                    break;
            }
        }
    }
}
