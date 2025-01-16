 <?php
    if (!empty($_SESSION)) {
        require_once './controller/Webontroller.php';

        $controller = new WebController();





    ?>

     <section id="Disponibles" class="librosDisponibles">
         <h3 class="tituloSection">Libros Reservados por : <?php echo isset($_SESSION['usuario']) ? $_SESSION['usuario'] : ''; ?></h3>
         <div class="libros">

             <?php
                $controller->Imprimireservas();

                ?>

         </div>

     </section>
     <br>
     <br>
 <?php
    } else {
        print "";
    };
    ?>