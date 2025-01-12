 <?php
    require_once './controller/Webontroller.php';

    $controller = new WebController();
    ?>
 <header class=" text-white text-center py-3">
     <div class="container">
         <h1>Bienvenido <?php echo isset($_SESSION['usuario']) ? $_SESSION['usuario'] : ''; ?></h1>
     </div>
 </header>
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