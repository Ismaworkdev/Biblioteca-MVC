<?php
class Router
{
    public static function Enrutamiento()
    {
        // Verificar si hay un parámetro "action" en la URL
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

                    $controller->addbook();

                    break;
                case 'deletebook';

                    $controller->deletebook();

                    break;
                case 'editbook';

                    $controller->editbook();

                    break;
                case 'reservar';
                    $controller->comprobaruser();
                    $controller->reservarlibro();


                    break;
                default:
                    include './vista/notfound.php';
                    break;
            }
        } else {
            // Si no se pasa ningún "action", cargar la sección principal
            include './vista/sectionindex.php';
        }
    }
}
