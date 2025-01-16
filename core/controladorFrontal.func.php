<?php

class Router
{

    public static function Enrutamiento()
    {

        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            require_once './controller/Webontroller.php';
            $controller = new WebController();

            switch ($action) {
                case 'registrarse':

                    include './vista/registrarse.php';
                    break;

                case 'iniciosesion':
                    include './vista/iniciosesion.php';
                    break;
                case 'index':
                    include './vista/sectionindex.php';
                    break;
                case 'login':
                    $controller->login();
                    break;
                case 'register':
                    $controller->register();
                    break;
                case 'vistauser':

                    $controller->comprobaruser();
                    include './vista/listalibros.php';
                    include './vista/librosreservados.php';

                    break;
                case 'detalleslibro':
                    $controller->comprobaruser();
                    include './vista/detalleslibro.php';

                    break;

                case 'agregar';
                    $controller->comprobaruser();
                    include './vista/agregar.php';

                    break;
                case 'eliminar';
                    $controller->comprobaruser();
                    include './vista/eliminar.php';

                    break;
                case 'editar';
                    $controller->comprobaruser();
                    include './vista/editar.php';

                    break;
                case 'addbook';
                    $controller->comprobaruser();
                    $controller->addbook();

                    break;
                case 'deletebook';
                    $controller->comprobaruser();
                    $controller->deletebook();

                    break;
                case 'editbook';
                    $controller->comprobaruser();
                    $controller->editbook();

                    break;
                case 'reservar';
                    $controller->comprobaruser();
                    $controller->reservarlibro();


                    break;
                case 'logout';
                    include './vista/logout.php';


                    break;
                default:
                    include './vista/notfound.php';
                    break;
            }
        } else {

            include './vista/sectionindex.php';
        }
    }
}
