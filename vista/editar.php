<?php
require_once './controller/Webontroller.php';

$controller = new WebController();
?>

<br><br>
<section data-aos="zoom-in" data-aos-duration="1000" class="seccionRegistrarse">
    <form action="./index.php?action=editbook" method="post">
        <h2 class="tituloRegistrarse">Editar Libro </h2>
        <div>
            <input type="text" placeholder="ISBN (campo obligatorio)" name="oldISBN" value="<?php echo isset($_POST['oldISBN']) ? $_POST['oldISBN'] : ''; ?>">
        </div>
        <div>
            <input type="text" placeholder=" Nuevo ISBN  (campo opcional)" name="newISBN" value="<?php echo isset($_POST['newISBN']) ? $_POST['newISBN'] : ''; ?>">
        </div>
        <div>
            <input type="text" placeholder="Nuevo titulo (campo opcional)" name="newtitle" value="<?php echo isset($_POST['newtitle']) ? $_POST['newtitle'] : ''; ?>">
        </div>
        <div>
            <input type="text" placeholder="Nuevo Autor (campo opcional) " name="newautor" value="<?php echo isset($_POST['newautor']) ? $_POST['newautor'] : ''; ?>">
        </div>

        <div>
            <input type="textarea" placeholder="Descripcion (campo opcional)" name="newDescripcion" value="<?php echo isset($_POST['newDescripcion']) ? $_POST['newDescripcion'] : ''; ?>">
        </div>


        <?php $controller->mostrarerrores() ?>

        <div class="div_button">
            <input name="submiteditbook" class="boton" type="submit" value="Editar">
        </div>


    </form>
    <?php $controller->alertacambio() ?>
</section>