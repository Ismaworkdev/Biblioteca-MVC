 <?php
    require_once './controller/Webontroller.php';

    $controller = new WebController();
    ?>

 <section id="Disponibles" class="librosDisponibles">
     <h3 class="tituloSection">Libros Disponibles</h3>
     <div class="libros">

         <?php
            $controller->Imprimirlibros();
            ?>

     </div>

 </section>
 <br>
 <br>