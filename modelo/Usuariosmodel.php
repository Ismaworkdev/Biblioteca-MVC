<?php
require_once './core/Conexion.php'; // Asegúrate de que el archivo Conexion.php esté bien configurado
require_once './modelo/Usuarios.php'; // Incluye la clase Usuarios

class UsuariosModel
{
    private $db;

    public function __construct()
    {
        $conexion = new Conexion(); // Instanciar la clase Conexion
        $this->db = $conexion->getConexion(); // Obtener la conexión
    }

    /**
     * Verifica si la conexión es exitosa
     */
    public function verificarConexion()
    {
        if ($this->db) { // Verifica si la conexión es válida
            return "Conexión exitosa";
        } else {
            return "Error al conectar con la base de datos: " . $this->db->connect_error;
        }
    }
}
