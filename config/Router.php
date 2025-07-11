<?php

class Router
{

    public static function redirect()
    {
        if (isset($_GET['page'])) {
            switch ($_GET['page']) {

                case 'register':

                    $controller = new UtilisateursController;
                    $controller->register();
                    break;

                case 'accueil':

                    $controller = new HomePageController();
                    $controller->homeProducts();
                    break;

                case 'adminDashboard':
                    if (
                        !isset($_SESSION['email'])
                        || !isset($_SESSION['admin'])
                        || !$_SESSION['admin']
                    ) {
                        header('Location: index.php?page=accueil');
                        exit;
                    }
                    $controller = new AdminController();
                    $controller->showDashboard();
                    break;

                case 'addproduct':
                    $controller = new ProduitsController;
                    $controller->addProduct();
                    break;

                case 'panier':
                    $controller = new CommandesController;
                    $controller->panier();
                    break;

                case 'commande':
                    $controller = new CommandesController;
                    $controller->validCommand();

                case 'connexion':
                    $controller = new UtilisateursController;
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
