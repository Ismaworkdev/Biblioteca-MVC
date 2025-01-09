<?php
$vacio = null;
$incorrecto = null;
$usuexiste = null;

require_once './modelo/Usuariosmodel.php';

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

    function mostrarerrores()
    {
        global $vacio;
        global $incorrecto;
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
