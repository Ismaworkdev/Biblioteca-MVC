<?php
// index.php

// Cargar configuraciones globales
require_once './config/global.php';

// Incluir controladores principales
require_once './core/ControladorBase.php';
require_once './core/Conexion.php';

// Incluir cabecera
include './vista/comun/cabezera.php';

// Lógica de enrutamiento
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    if ($action == 'registrarse') {
        include './vista/registrarse.php';
    } elseif ($action == 'iniciosesion') {
        include './vista/iniciosesion.php';
    } else {
        echo "<h1>Página no encontrada</h1>";
    }
} else {
    include './vista/sectionindex.php';
}

// Incluir pie de página
include './vista/comun/pie.php';
