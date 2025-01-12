<?php
$vacio = null;
$incorrecto = null;
$usuexiste = null;
session_start();
require_once './modelo/Usuariosmodel.php';

require_once './modelo/librosmodel.php';
class WebController
{


    function login()
    {

        global $vacio;
        global $incorrecto;
        if ($_SERVER['REQUEST_METHOD'] = 'POST') {
            if ($_POST['submitlogin']) {
                $usuario = $_POST['usuariologin'];

                if (!empty($usuario)) {

                    $vacio = false;

                    $model = new UsuariosModel();
                    $incorrecto =  $model->verificarusuario($usuario);
                    if (!$model->verificarusuario($usuario)) {
                        $_SESSION['usuario'] = $usuario;
                        header('Location: index.php?action=vistauser');
                    }
                } else {
                    $vacio = true;
                }
            }
        }
        require './vista/iniciosesion.php';
    }




    function register()
    {
        global $vacio;
        global $usuexiste;
        if ($_SERVER['REQUEST_METHOD'] = 'POST') {
            if ($_POST['submitregister']) {
                $nombre = $_POST['nombre'];
                $ape1 = $_POST['apellido1'];
                $ape2 = $_POST['apellido2'];
                if (!empty($nombre) && !empty($ape1) && !empty($ape2)) {
                    $vacio = false;
                    $model = new UsuariosModel();
                    $usuexiste =  $model->verificarregistrado($nombre, $ape1, $ape2);
                } else {
                    $vacio = true;
                }
            }
            require './vista/registrarse.php';
        }
    }

    function Imprimirlibros()
    {
        $model = new librosmodel();
        $model->imprimirlibrosdisponibles();
    }




    function detalleslibro()
    {
        if (isset($_GET['isbn'])) {
            $isbn = $_GET['isbn'];
            $modelibros = new librosmodel();
            $modelibros->imprimirdetalles($isbn);
        }
    }


function addbook()  {
    
}

    function deletebook() {}

    function editbook() {}

    function mostrarerrores()
    {
        global $vacio;
        global $incorrecto;
        global $execute;
        if ($incorrecto !== null) {
            if ($incorrecto == false) {
                print "<span class='error'>  </span>";
            } else {
                print "<span class='error'>  Usuario inexistente . </span>";
            }
        }

        if ($vacio !== null) {
            if ($vacio) {
                print "<span class='error'> Rellene todos lo campos .</span>";
            } else {
                print "<span class='error'></span>";
            }
        }

        if ($execute !== null) {
            if (!$execute) {
                print "<span class='error'> Usuario existente prueba otro nombre  .</span>";
            } else {
                print "<span class='error'></span>";
            }
        }
    }

    function alertacambio()
    {
        global $usuexiste;
        if ($usuexiste !== null) {
            if ($usuexiste == false) {
                print ' <script>  </script> ';
            } else {
                print ' <script>  alert("Los cambios se han guardado correctamente .");  </script> ';
            }
        }
    }
}
