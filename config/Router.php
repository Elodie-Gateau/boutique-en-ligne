<?php

class Router
{
    public static function redirect()
    {
        if (isset($_GET['page'])) {
            switch ($_GET['page']) {

                // PAGE D'INSCRIPTION
                case 'register':
                    if (isset($_SESSION['email'])) {
                        header('Location: index.php?page=accueil');
                        exit;
                    }
                    $controller = new UtilisateursController;
                    $controller->register();
                    break;

                // PAGE D'ACCUEIL
                case 'accueil':
                    $controller = new HomePageController();
                    $controller->homeProducts();
                    break;

                // PAGE D'ADMINISTRATION
                case 'adminDashboard':
                    if (!isset($_SESSION['email']) || !isset($_SESSION['admin']) || !$_SESSION['admin']) {
                        header('Location: index.php?page=accueil');
                        exit;
                    }
                    $controller = new AdminController();
                    $controller->showDashboard();
                    break;

                // PAGE SUPRESSION UTILISATEUR
                case 'supprimerUtilisateur':
                    if (!isset($_SESSION['email']) || !isset($_SESSION['admin']) || !$_SESSION['admin']) {
                        header('Location: index.php?page=accueil');
                        exit;
                    }
                    $controller = new AdminController;
                    $controller->supprimerUtilisateur();
                    break;


                // PAGE SUPPRIMER UN PRODUIT
                case 'supprimerProduit':
                    if (!isset($_SESSION['email']) || !isset($_SESSION['admin']) || !$_SESSION['admin']) {
                        header('Location: index.php?page=accueil');
                        exit;
                    }
                    $controller = new ProduitsController;
                    $controller->supprimerProduit();
                    break;


                // PAGE D'AJOUT PRODUIT
                case 'addproduct':
                    if (!isset($_SESSION['email']) || !isset($_SESSION['admin']) || !$_SESSION['admin']) {
                        header('Location: index.php?page=accueil');
                        exit;
                    }
                    $controller = new ProduitsController;
                    $controller->addProduct();
                    break;

                // PAGE DU PANIER
                case 'panier':
                    if (!isset($_SESSION['email'])) {
                        header('Location: index.php?page=accueil');
                        exit;
                    }
                    $controller = new CommandesController;
                    $controller->panier();
                    break;

                // PAGE DES COMMANDES
                case 'commande':
                    if (!isset($_SESSION['email'])) {
                        header('Location: index.php?page=connexion');
                        exit;
                    }
                    $controller = new CommandesController;
                    $controller->validCommand();
                    break;

                // PAGE DE CONNEXION
                case 'connexion':
                    if (isset($_SESSION['email'])) {
                        header('Location: index.php?page=accueil');
                        exit;
                    }
                    $controller = new UtilisateursController;
                    $controller->log();
                    break;

                // PAGE PROFIL
                case 'profil':
                    if (!isset($_SESSION['email'])) {
                        header('Location: index.php?page=accueil');
                        exit;
                    }
                    $controller = new UtilisateursController;
                    $controller->profil();
                    break;

                // PAGE MODIFIER PROFIL
                case 'modifierProfil':
                    if (!isset($_SESSION['email'])) {
                        header('Location: index.php?page=accueil');
                        exit;
                    }
                    $controller = new UtilisateursController;
                    $controller->modifierProfil();
                    break;


                // PAGE DE DECONNEXION
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
