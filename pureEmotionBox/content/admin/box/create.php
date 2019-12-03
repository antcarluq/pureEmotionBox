<?php

//TODO: Hay que adaptar los include
include "../../../wp-load.php";
include "../../../wp-content/themes/zurbox-lite/header.php";
require "../../../security-functions.php";
require "../../../tools/enlace.php";
if (!assert_is_shop_admin()){
    header('Location: ../../../index.php');
} else {
?>

<div class="row">
    <div id="primary" class="content-area small-12 large-8 large-centered columns">
        <main id="main" class="site-main" role="main">

            <article id="post-91" class="post-91 page type-page status-publish hentry wp-sticky">
 
                <header class="entry-header">
                    <h1 class="entry-title">Crear Caja</h1>  <!-- AQUI VA EL TITULO -->                        
                </header><!-- .entry-header -->
    
                <div class="entry-content">
                    <!-- INICIO DEL CONTENIDO -->
                <?php
                    $enlace = start_database();
                    $lista_productos = $enlace->query('SELECT * FROM producto p');
                    session_start();
                ?>
                    
                <div id="form_product">
                    <form action="../../../tools/save-box.php" method="POST">
                        
                        Temática:<br>
                        <input type="text" name="tematica" required <?php if (isset($_SESSION['tematica'])) echo "value=\"" . $_SESSION['tematica'] . "\""?>>
                        <br>
                        
                        Precio:<br>
                        <input type="number" step="0.01" name="precio" required <?php if (isset($_SESSION['precio'])) echo "value=\"" . $_SESSION['precio'] . "\""?>><br>
                       
                        Cantidad de productos:<br>
                        <input type="number" step="1" name="cantidad_productos" required <?php if (isset($_SESSION['cantidad_productos'])) echo "value=\"" . $_SESSION['cantidad_productos'] . "\""?>><br>
                        
                        Selecciona los productos fijos:</br>
                        <select multiple name="productos_fijos[]">
                        <?php foreach ($lista_productos as $producto) {
                            echo "<option value=". $producto["id"] .">" . $producto["nombre"] ."</option>";
                        }
                        ?>
                        </select> </br>

                        Selecciona los productos que serán aleatorios: </br>
                        <select multiple name="productos_aleatorios[]" required>
                        <?php foreach ($lista_productos as $producto) {
                            echo "<option value=". $producto["id"] .">" . $producto["nombre"] ."</option>";
                        } ?>
                       
                        </select>

                        <input type="submit" value="Enviar"/>
                    </form>
                </div>
                        
                <?php
                $_SESSION = null;
                mysqli_close($enlace);
                ?>
                    <!-- FIN DEL CONTENIDO -->
                    </br>
                </div><!-- .entry-content -->
    
 
            </article><!-- #post-## -->
        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- .row -->


</div><!-- #content -->
 



<?php 
// TODO: ADAPTAR LOS INCLUDES
include "../../../wp-content/themes/zurbox-lite/footer.php";}?>