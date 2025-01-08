<?php
require_once './controller/Webontroller.php';

$controller = new WebController();
?>

<br><br>
<section data-aos="zoom-in" data-aos-duration="1000" class="seccionRegistrarse">
    <form action="./index.php?action=register" method="post">
        <h2 class="tituloRegistrarse">Registro</h2>
        <div>
            <input type="text" placeholder="Nombre" id="nombre" name="nombre" value="<?php echo isset($_POST['nombre']) ? $_POST['nombre'] : ''; ?>">
        </div>
        <div>
            <input type="text" placeholder="Primer Apellido" id="apellido1" name="apellido1" value="<?php echo isset($_POST['apellido1']) ? $_POST['apellido1'] : ''; ?>">
        </div>
        <div>
            <input type="text" placeholder="Segundo Apellido" id="apellido2" name="apellido2" value="<?php echo isset($_POST['apellido2']) ? $_POST['apellido2'] : ''; ?>">
        </div>



        <?php $controller->mostrarerrores() ?>

        <div class="div_button">
            <input name="submitregister" class="boton" type="submit" value="Registrarse">
        </div>


    </form>
</section>