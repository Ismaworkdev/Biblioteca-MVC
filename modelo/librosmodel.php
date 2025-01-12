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

    function  verificarlibro($ISBN)
    {

        if ($this->db) {
            $Libroregistrado = new Libros($ISBN);
            $Libro = $Libroregistrado->getISBN();
            try {

                $stmt = $this->db->prepare("SELECT * FROM Libros WHERE ISBN = :ISBN");
                $stmt->bindParam(':ISBN', $Libro);
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


    function   añadirlibro($ISBN, $titulo, $Autor, $descripcion)
    {




        if ($this->db) {

            if ($this->verificarlibro($ISBN)) {

                try {


                    $libroregistrado = new Libros($ISBN, $titulo, $Autor, $descripcion);

                    $isbn = $libroregistrado->getISBN();
                    $title = $libroregistrado->getTitulo();
                    $autor = $libroregistrado->getAutor();
                    $descrip = $libroregistrado->getDescripcion();


                    $stmt = $this->db->prepare("INSERT INTO LIBROS (ISBN, titulo, autor, descripcion) VALUES
                (:isbn, :tt, :au, :descri)");
                    $stmt->bindParam(':isbn', $isbn);
                    $stmt->bindParam(':tt', $title);
                    $stmt->bindParam(':au', $autor);
                    $stmt->bindParam(':descri', $descrip);

                    $stmt->execute();

                    return true;
                } catch (\Throwable $th) {
                    return false;
                }
            }
        }
    }


    function libroeliminado($isbn)
    {


        if ($this->db) {

            if ($this->verificarlibro($isbn)) {

                try {
                    $libroelimina = new Libros($isbn);

                    $isbnN = $libroelimina->getISBN();
                    $stmt = $this->db->prepare("DELETE  FROM LIBROS WHERE ISBN = :isbn");
                    $stmt->bindParam(':isbn', $isbnN);

                    $stmt->execute();
                    print "hola";
                    return true;
                } catch (\Throwable $th) {
                    return false;
                }
            }
        }
    }
}
