<?php
require_once './controller/Webontroller.php';

$controller = new WebController();
?>



<br><br>
<section data-aos="zoom-in" data-aos-duration="1000" class="seccionRegistrarse">
    <form action="./index.php?action=login" method="POST">
        <h2 class="tituloRegistrarse">Iniciar Sesión</h2>

        <div>
            <input type="text" placeholder="Usuario" name="usuariologin" value="<?php echo isset($_POST['usuariologin']) ? $_POST['usuariologin'] : ''; ?>">
        </div>

        <?php $controller->mostrarerrores() ?>

        <div class="div_button">
            <input class="boton" type="submit" name="submitlogin" value="Iniciar Sesión">
        </div>

    </form>

</section>