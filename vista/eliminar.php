<?php
require_once './controller/Webontroller.php';

$controller = new WebController();
?>

<br><br>
<section data-aos="zoom-in" data-aos-duration="1000" class="seccionRegistrarse">
    <form action="./index.php?action=deletebook" method="post">
        <h2 class="tituloRegistrarse">Eliminar Libro </h2>
        <div>
            <input type="text" placeholder="ISBN" id="ISBN" name="ISBNeliminar" value="<?php echo isset($_POST['ISBNeliminar']) ? $_POST['ISBNeliminar'] : ''; ?>">
        </div>




        <?php $controller->mostrarerrores() ?>

        <div class="div_button">
            <input name="submitISBNeliminar" class="boton" type="submit" value="Eliminar">
        </div>


    </form>
    <?php $controller->alertacambio() ?>
</section>