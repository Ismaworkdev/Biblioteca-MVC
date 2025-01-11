<?php
require_once './core/Conexion.php';
require_once './modelo/Usuarios.php';
$execute = null;
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
    public function verificarusuario($user)
    {
        if ($this->db) {
            $usuariologin = new Usuarios($user);
            $usuario = $usuariologin->getNombre();
            try {

                $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE nombre = :user");
                $stmt->bindParam(':user', $usuario);
                $stmt->execute();
                if ($stmt->rowCount() > 0) {
                    return false;
                } else {
                    return true;
                }
            } catch (\Throwable $th) {
            }
        }
    }


    public  function verificarregistrado($nombre, $ape1, $ape2)
    {
        global $execute;
        if ($this->db) {

            if ($this->verificarusuario($nombre)) {

                try {

                    $sql =  "SELECT COALESCE(MAX(id_user), 0) + 1 AS new_id FROM usuarios";
                    $stmt = $this->db->prepare($sql);
                    $stmt->execute();
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $new_id = $row['new_id'];
                    $usuarioregister = new Usuarios($nombre, $new_id, $ape1, $ape2, 1);

                    $nombree = $usuarioregister->getNombre();
                    $new_Id = $usuarioregister->getId();
                    $Ape1 = $usuarioregister->getApe1();
                    $Ape2 = $usuarioregister->getApe2();
                    $Rol = $usuarioregister->getRol();


                    $stmt = $this->db->prepare("INSERT INTO USUARIOS (id_user, nombre, ape1, ape2, rol) VALUES
                (:iduser, :nom, :ap1, :ap2, :roll)");
                    $stmt->bindParam(':iduser', $new_Id);
                    $stmt->bindParam(':nom', $nombree);
                    $stmt->bindParam(':ap1', $Ape1);
                    $stmt->bindParam(':ap2', $Ape2);
                    $stmt->bindParam(':roll', $Rol);
                    $stmt->execute();
                    return true;
                    $execute = true;
                } catch (\Throwable $th) {
                    return false;
                }
            } else {
                $execute = false;
            }
        }
    }
}
