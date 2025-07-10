<?php

class Router {

    public static function redirect()
    {
        if (isset($_GET['page'])) {
            switch ($_GET['page']) {

                ////////////////////////
                // EXEMPLES DE ROUTES //
                ////////////////////////

                case 'register':
                    $controller = new UserController();
                    $controller->register();
                    break;
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
?>