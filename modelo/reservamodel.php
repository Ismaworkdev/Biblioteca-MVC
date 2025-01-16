<?php
require_once './core/Conexion.php';
require_once './modelo/reserva.php';
$yaesta = null;
class reservamodel
{
    private $db;

    public function __construct()
    {
        $conexion = new Conexion(); // Instanciar la clase Conexion
        $this->db = $conexion->getConexion(); // Obtener la conexión


    }

    function finduserr($user)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM USUARIOS WHERE nombre = :nombree");
            $stmt->bindParam(":nombree", $user);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function reservar($isbn, $nombreuser)
    {
        global $yaesta;
        if ($this->db) {
            try {
                $from = new DateTime();
                $to = new DateTime();
                $to->modify('+30 days');



                if ($this->finduserr($nombreuser)) {
                    $row = $this->finduserr($nombreuser);
                    $fromF = $from->format('Y-m-d');
                    $toF = $to->format('Y-m-d');
                    $idduserr = $row['id_user'];
                    $reserva = new reserva($idduserr, $isbn, $fromF, $toF);
                    $desde = $reserva->getFDesde();
                    $islibro = $reserva->getIsbnLibro();
                    $idduser =  $reserva->getIdUser();
                    $hasta = $reserva->getFHasta();



                    $check = $this->db->prepare("SELECT * FROM PRESTAMOS WHERE id_user = :id AND ISBN = :isbn");
                    $check->bindParam(':id', $idduser);
                    $check->bindParam(':isbn', $islibro);
                    $check->execute();
                    $yaesta = $check->fetch(PDO::FETCH_ASSOC);

                    if ($yaesta) {
                        $yaesta = true;
                        return false;
                    }

                    $stmt = $this->db->prepare("INSERT INTO PRESTAMOS (id_user, ISBN, fecha_desde, fecha_hasta) VALUES (:id, :isbn, :fr, :t)");
                    $stmt->bindParam(':id', $idduser);
                    $stmt->bindParam(':isbn', $islibro);

                    $stmt->bindParam(':fr', $desde);
                    $stmt->bindParam(':t', $hasta);
                    $stmt->execute();
                    return true;
                } else {

                    return false;
                }
            } catch (\Throwable $th) {

                return false;
            }
        }
    }



    function imprimireservasuser($user)
    {


        if ($this->db) {
            try {




                if ($this->finduserr($user)) {
                    $row = $this->finduserr($user);
                    $id_userr = $row['id_user'];
                    $stmt = $this->db->prepare("SELECT * FROM LIBROS where ISBN in (SELECT ISBN FROM PRESTAMOS WHERE id_user = :idd);");
                    $stmt->bindParam(':idd', $id_userr);
                    $stmt->execute();
                    while ($rows = $stmt->fetch(PDO::FETCH_ASSOC)) {

                        print '
          <a href="./index.php?action=detalleslibro&isbn=' . $rows['ISBN'] . '">
                    <div class="libro">

                        <img class="imgDisponibles" src="./recursos/img/portadalibros/portada' . rand(1, 14) . '.png" loading="lazy">

                        <div class="tituloLibro">
                            <h4>' . $rows['titulo'] . '</h4>
                        </div>

                    </div>
                </a>
                    ';
                    }
                } else {

                    return false;
                }
            } catch (\Throwable $th) {

                return false;
            }
        }
    }
}
