<?php

class Router
{

    public static function redirect()
    {
        if (isset($_GET['page'])) {
            switch ($_GET['page']) {


                /////////////////  PAGE D'INSCRIPTION /////////////////
                case 'register':

                    if (isset($_SESSION['email'])) {
                        header('Location: index.php?page=accueil');
                        exit;
                    }

                    $controller = new UtilisateursController;
                    $controller->register();
                    break;


                /////////////////  PAGE D'ACCUEIL /////////////////
                case 'accueil':

                    $controller = new HomePageController();
                    $controller->homeProducts();
                    break;


                /////////////////  PAGE D'ADMINISTRATION /////////////////
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

                    if (!isset($_SESSION['email'])) {
                        header('Location: index.php?page=accueil');
                        exit;
                    }

                    $controller = new ProduitsController;
                    $controller->addProduct();
                    break;

                case 'panier':
                    $controller = new CommandesController;
                    $controller->panier();
                    break;

                case 'connexion':

                    if (isset($_SESSION['email'])) {
                        header('Location: index.php?page=accueil');
                        exit;
                    }

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
