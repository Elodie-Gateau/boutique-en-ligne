<?php

class Router
{

    public static function redirect()
    {
        if (isset($_GET['page'])) {
            switch ($_GET['page']) {

                case 'inscription':

                    $controller = new UtilisateursController();
                    $controller->signIn();
                    break;

                case 'accueil':

                    require './view/accueil.php';
                    break;


                default:
                    echo 'Page not found';
                    break;
            }
        }
    }
}
