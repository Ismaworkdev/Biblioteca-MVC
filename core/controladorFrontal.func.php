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
