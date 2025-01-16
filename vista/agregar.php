<?php
if (!empty($_SESSION)) {
    require_once './controller/Webontroller.php';

    $controller = new WebController();

?>

    <br><br>
    <section data-aos="zoom-in" data-aos-duration="1000" class="seccionagregar">
        <form action="./index.php?action=addbook" method="post">
            <h2 class="tituloRegistrarse">Agregar Libro </h2>
            <div>
                <input type="text" placeholder="ISBN" id="ISBN" name="ISBN" value="<?php echo isset($_POST['ISBN']) ? $_POST['ISBN'] : ''; ?>">
            </div>
            <div>
                <input type="text" placeholder="titulo" id="titulo" name="titulo" value="<?php echo isset($_POST['titulo']) ? $_POST['titulo'] : ''; ?>">
            </div>
            <div>
                <input type="text" placeholder="Autor" id="Autor" name="Autor" value="<?php echo isset($_POST['Autor']) ? $_POST['Autor'] : ''; ?>">
            </div>
            <div>
                <input type="text" placeholder="descripcion" id="descripcion" name="descripcion" value="<?php echo isset($_POST['descripcion']) ? $_POST['descripcion'] : ''; ?>">
            </div>


            <?php $controller->mostrarerrores() ?>

            <div class="div_button">
                <input name="submitagregar" class="boton" type="submit" value="Agregar Libro">
            </div>


        </form>
    <?php $controller->alertacambio();
} else {
    print "";
}; ?>
    </section>