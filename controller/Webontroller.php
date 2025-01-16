<?php
$vacio = null;
$incorrecto = null;
$usuexiste = null;
$libroexiste = null;
$librocreado = null;
$libroeliminado = null;
$noexiste = null;
$cambios = null;
$actualizado = null;
$inexistente = null;
$reservado = null;
session_start();
require_once './modelo/Usuariosmodel.php';
require_once './modelo/reservamodel.php';
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

    function comprobaruser()
    {
        if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])) {
            $user = $_SESSION['usuario'];
            if ($user == "admin") {
                include './vista/paneladmin.php';
            } else {

                include './vista/paneluser.php';
            }
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
                    print $librocreado;
                } else {
                    $vacio = true;
                }
            }
        }
        require './vista/agregar.php';
    }

    function deletebook()
    {


        global $inexistente;
        global $vacio;
        global  $libroeliminado;
        if ($_SERVER['REQUEST_METHOD'] = 'POST') {
            if ($_POST['submitISBNeliminar']) {
                $isbn = $_POST['ISBNeliminar'];
                if (!empty($isbn)) {
                    $vacio = false;
                    $modelibro = new librosmodel();

                    $inexistente =   $modelibro->verificarlibro($isbn);
                    if (!$inexistente) {
                        $libroeliminado =    $modelibro->libroeliminado($isbn);
                    }
                } else {
                    $vacio = true;
                }
            }
        }
        require './vista/eliminar.php';
    }

    function editbook()
    {
        global $vacio;
        global $noexiste;
        global $cambios;
        global $actualizado;
        if ($_SERVER['REQUEST_METHOD'] = 'POST') {
            if ($_POST['submiteditbook']) {
                $isbn = $_POST['oldISBN'];
                if (!empty($isbn)) {

                    $modelibro = new librosmodel();
                    $noexiste =   $modelibro->verificarlibro($isbn);
                    if (!$noexiste) {

                        $newtitle =  isset($_POST['newtitle']) ? $_POST['newtitle'] : '';
                        $newautor =   isset($_POST['newautor']) ? $_POST['newautor'] : '';
                        $newDescripcion =    isset($_POST['newDescripcion']) ? $_POST['newDescripcion'] : '';
                        if (isset($newtitle) && isset($newautor) && isset($newDescripcion)) {
                            if (empty($newtitle) && empty($newautor) && empty($newDescripcion)) {
                                $cambios = false;
                            } else {
                                $modelibro = new librosmodel();
                                $actualizado =   $modelibro->editarlibro($isbn, $newtitle, $newautor, $newDescripcion);
                                $cambios = true;
                            }
                        }
                    }
                } else {
                    $vacio = true;
                }
            }
        }

        require './vista/editar.php';
    }
    function reservarlibro()
    {
        global $reservado;
        global $yaesta;
        if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario']) && isset($_GET['isbnreserva']) && !empty($_GET['isbnreserva'])) {
            $isbn = $_GET['isbnreserva'];
            $user = $_SESSION['usuario'];
            $modelreserva = new reservamodel();
            $reservado =   $modelreserva->reservar($isbn, $user);
            // $this->mostrarerrores();
            //s$this->alertacambio();
        }
        $modelibros = new librosmodel();
        $modelibros->imprimirdetalles($isbn);
        require './vista/detalleslibro.php';
    }


    function   Imprimireservas()
    {
        if (isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])) {
            $user = $_SESSION['usuario'];
            $modelreserva = new reservamodel();
            $modelreserva->imprimireservasuser($user);
        }
    }

    function mostrarerrores()
    {

        global $vacio;
        global $incorrecto;
        global $execute;
        global $libroexiste;
        global $noexiste;
        global $cambios;
        global $inexistente;
        global $yaesta;

        if ($incorrecto !== null) {
            if ($incorrecto == false) {
                print "<span class='error'>  </span>";
            } else {
                print "<span class='error'>  Usuario inexistente . </span>";
            }
        }


        if ($yaesta !== null) {
            if ($yaesta == false) {
                print "<span class='error'>  </span>";
            } else {
                print "<span class='error'> El usuario ya tiene este libro reservado . </span>";
            }
        }

        if ($vacio !== null) {
            if ($vacio) {
                print "<span class='error'> Rellene todos lo campos obligatorios.</span>";
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

        if ($inexistente !== null) {
            if ($inexistente) {
                print "<span class='error'> Libro inexistente .</span>";
            } else {
                print "<span class='error'></span>";
            }
        }


        if ($noexiste !== null) {
            if ($noexiste) {
                print "<span class='error'> Libro inexistente .</span>";
            } else {
                print "<span class='error'></span>";
            }
        }

        if ($cambios !== null) {
            if (!$cambios) {
                print "<span class='error'> No has hecho ningun cambio .</span>";
            } else {
                print "<span class='error'> </span>";
            }
        }
    }

    function alertacambio()
    {
        global $reservado;
        global $usuexiste;
        global $librocreado;
        global $libroeliminado;
        global $actualizado;
        if ($usuexiste !== null) {
            if ($usuexiste == false) {
                print ' <script>  </script> ';
            } else {
                print ' <script>  alert("Los cambios se han guardado correctamente .");  </script> ';
            }
        }

        if ($libroeliminado !== null) {
            if ($libroeliminado == false) {
                print ' <script>  </script> ';
            } else {
                print ' <script>  alert("Los cambios se han guardado correctamente .");  </script> ';
            }
        }


        if ($librocreado !== null) {
            if ($librocreado == false) {
                print ' <script>  </script> ';
            } else {
                print ' <script>  alert("Los cambios se han guardado correctamente .");  </script> ';
            }
        }

        if ($actualizado !== null) {
            if ($actualizado == false) {
                print ' <script>  </script> ';
            } else {
                print ' <script>  alert("Los cambios se han guardado correctamente .");  </script> ';
            }
        }
        if ($reservado !== null) {

            if ($reservado == false) {
                print ' <script>  </script> ';
            } else {
                print ' <script>  alert("Los cambios se han guardado correctamente .");  </script> ';
            }
        }
    }
}
