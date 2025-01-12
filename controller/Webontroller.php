<?php
$vacio = null;
$incorrecto = null;
$usuexiste = null;
$libroexiste = null;
$librocreado = null;
$libroeliminado = null;
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


    function addbook()
    {
        global $libroexiste;
        global $vacio;
        global  $librocreado;
        if ($_SERVER['REQUEST_METHOD'] = 'POST') {
            if ($_POST['submitagregar']) {
                $ISBN = $_POST['ISBN'];
                $titulo = $_POST['titulo'];
                $Autor = $_POST['Autor'];
                $descripcion = $_POST['descripcion'];
                if (!empty($ISBN) && !empty($titulo) && !empty($Autor) && !empty($descripcion)) {
                    $modelibro = new librosmodel();
                    $libroexiste =   $modelibro->verificarlibro($ISBN);

                    $vacio = false;
                    $librocreado =   $modelibro->añadirlibro($ISBN, $titulo, $Autor, $descripcion);
                } else {
                    $vacio = true;
                }
            }
        }
        require './vista/agregar.php';
    }

    function deletebook()
    {


        global $libroexiste;
        global $vacio;
        global  $libroeliminado;
        if ($_SERVER['REQUEST_METHOD'] = 'POST') {
            if ($_POST['submitISBNeliminar']) {
                $isbn = $_POST['ISBNeliminar'];
                if (!empty($isbn)) {
                    $vacio = false;
                    $modelibro = new librosmodel();


                    $libroeliminado =    $modelibro->libroeliminado($isbn);
                } else {
                    $vacio = true;
                }
            }
        }
        require './vista/eliminar.php';
    }

    function editbook() {}

    function mostrarerrores()
    {
        global $vacio;
        global $incorrecto;
        global $execute;
        global $libroexiste;
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


        if ($libroexiste !== null) {
            if (!$libroexiste) {
                print "<span class='error'> Libro existente .</span>";
            } else {
                print "<span class='error'></span>";
            }
        }
    }

    function alertacambio()
    {
        global $usuexiste;
        global $librocreado;
        global $libroeliminado;
        if ($usuexiste !== null) {
            if ($usuexiste == false || $librocreado == false || $libroeliminado == false) {
                print ' <script>  </script> ';
            } else {
                print ' <script>  alert("Los cambios se han guardado correctamente .");  </script> ';
            }
        }
    }
}
