<?php
$vacio = null;
$incorrecto = null;
require_once './modelo/Usuariosmodel.php';
class WebController
{


    function login()
    {
        global $vacio;
        if ($_SERVER['REQUEST_METHOD'] = 'POST') {
            if ($_POST['submitlogin']) {
                $usuario = $_POST['usuariologin'];

                if (!empty($usuario)) {

                    $vacio = false;
                } else {
                    $vacio = true;
                    $model = new UsuariosModel();
                    echo $model->verificarConexion();
                }
            }
        }
        require './vista/iniciosesion.php';
    }

    function register()
    {
        global $vacio;
        if ($_SERVER['REQUEST_METHOD'] = 'POST') {
            if ($_POST['submitregister']) {
                $nombre = $_POST['nombre'];
                $ape1 = $_POST['apellido1'];
                $ape2 = $_POST['apellido2'];
                if (!empty($nombre) && !empty($ape1) && !empty($ape2)) {
                    $vacio = false;
                } else {
                    $vacio = true;
                }
            }
            require './vista/registrarse.php';
        }
    }

    function mostrarerrores()
    {
        global $vacio;
        global $incorrecto;
        if ($incorrecto !== null) {
            if ($incorrecto == false) {
                print "<span class='error'>  </span>";
            } else {
                print "<span class='error'>  Usuario o contraseña incorrectas . </span>";
            }
        }

        if ($vacio !== null) {
            if ($vacio) {
                print "<span class='error'> Rellene todos lo campos .</span>";
            } else {
                print "<span class='error'></span>";
            }
        }
    }
}
