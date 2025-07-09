<?php

class Router
{

    public static function redirect()
    {
        if (isset($_GET['page'])) {
            switch ($_GET['page']) {

                case 'inscription':
                    require '/tp-boutique_en_ligne/view/inscription.php';
                    break;

                // case 'register':
                //     require '../controller/UtilisateursController.php';
                //     $controller = new UtilisateursController;
                //     $controller->signIn();
                //     break;

                // case 'accueil':
                //     require '../view/accueil.php';
                //     break;
                ////////////////////////
                // EXEMPLES DE ROUTES //
                ////////////////////////

                // case 'login':
                //     $controller = new UserController();
                //     $controller->login();
                //     break;
                // case 'liste-user':
                //     $controller = new UserController();
                //     $controller->liste();
                //     break;

                default:
                    echo 'Page not found';
                    break;
            }
        }
    }
}
