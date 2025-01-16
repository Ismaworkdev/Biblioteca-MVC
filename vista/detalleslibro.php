     <?php
      if (!empty($_SESSION)) {
         require_once './controller/Webontroller.php';







      ?>

        <section class="detalle" data-aos="zoom-in">


           <?php
            $controller = new WebController();
            $controller->detalleslibro();
            ?>

           <div>
              <?php

               $controller->alertacambio();
               $controller->mostrarerrores();
               ?>
           </div>
        </section>

     <?php
      } else {
         print "";
      };

      ?>