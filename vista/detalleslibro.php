     <?php
        require_once './controller/Webontroller.php';


        ?>

     <section class="detalle" data-aos="zoom-in">


         <?php
            $controller = new WebController();
            $controller->detalleslibro();
            ?>
     </section>