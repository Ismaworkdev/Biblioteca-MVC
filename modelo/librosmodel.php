<?php
require_once './core/Conexion.php';
require_once './modelo/libros.php';
$execute = null;
class librosmodel
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
    public function imprimirlibrosdisponibles()
    {
        if ($this->db) {


            try {

                $stmt = $this->db->prepare("SELECT * FROM libros ");

                $stmt->execute();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    print '
          <a href="./index.php?action=detalleslibro&isbn=' . $row['ISBN'] . '">
                    <div class="libro">

                        <img class="imgDisponibles" src="./recursos/img/portadalibros/portada' . rand(1, 14) . '.png" loading="lazy">

                        <div class="tituloLibro">
                            <h4>' . $row['titulo'] . '</h4>
                        </div>

                    </div>
                </a>
                    ';
                }
            } catch (\Throwable $th) {
            }
        }
    }


    function imprimirdetalles($isbn)
    {
        if ($this->db) {


            try {

                $stmt = $this->db->prepare("SELECT * FROM libros WHERE ISBN = :is ");
                $stmt->bindParam(':is', $isbn);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);


                print '
        <div class="contenedorDetalle">
             <div class="imgDetalle">
                 <img src="./recursos/img/portadalibros/portada' . rand(1, 14) . '.png" >
             </div>
             <div class="textoDetalle">
                 <h1> LIBRO : ' . $row['titulo'] . '</h1>
                 <h3> AUTOR : </h3>
                   <p> ' . $row['autor'] . '</p>
                 <h3>DESCRIPCION : </h3>
                 <p> ' . $row['descripcion'] . '</p>
                                  <h3>ISBN : </h3>
                 <p> ' . $row['ISBN'] . '</p>


             </div>
         </div>';
            } catch (\Throwable $th) {
            }
        }
    }
}
