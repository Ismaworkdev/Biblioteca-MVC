<?php
// index.php

// Cargar configuraciones globales
require_once './config/global.php';

// Incluir controladores principales
require_once './core/ControladorBase.php';
require_once './core/Conexion.php';

// Incluir cabecera
include './vista/comun/cabezera.php';

include './core/controladorFrontal.func.php';
Router::Enrutamiento();


include './vista/comun/pie.php';
