          <br>
          <br>

          <div class=" text-white text-center py-3">
              <div class="container">
                  <h1>Bienvenido <?php echo isset($_SESSION['usuario']) ? $_SESSION['usuario'] : ''; ?></h1>
              </div>
          </div>
          <section class="listsection">

              <a class="butonsect " href="./index.php?action=eliminar">Eliminar libro </a>
              <a class="butonsect " href="./index.php?action=editar">Editar libro </a>
              <a class="butonsect " href="./index.php?action=agregar">Agregar libro </a>


          </section>