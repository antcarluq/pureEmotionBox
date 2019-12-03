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
                    <h1 class="entry-title">Editar Producto</h1>  <!-- AQUI VA EL TITULO -->                        
                </header><!-- .entry-header -->
    
                <div class="entry-content">
                    <!-- INICIO DEL CONTENIDO -->
                    <?php
                        $enlace = start_database();

                        if (!$enlace) {
                            echo "Error: No se pudo conectar a MySQL." . "<br/>";
                        } else {
                            $id = $_GET['id'];
                            $result = $enlace->query('SELECT * FROM producto WHERE id=' . $id);
                            $producto = $result->fetch_assoc();
                        }
                    ?>
                    <div id="form_product">   
                        <form action="../../../tools/save-product.php" method="POST">
                            <input type="hidden" name="id_producto" value="<?php echo $producto["id"] ?>" readonly><br>
                            
                            Nombre:<br>
                            <input type="text" name="nombre" value="<?php echo $producto["nombre"] ?>"><br>
                            
                            Descripción:<br>
                            <textarea row="15" name="descripcion" required><?php echo $producto["descripcion"] ?></textarea><br>
                            
                            Referencia:<br>
                            <input type="text" name="referencia" value="<?php echo $producto['referencia']?>"><br>
                            
                            Precio:<br>
                            <input type="number" step="0.01" name="precio"value="<?php echo $producto['precio']?>"><br>
                            
                            Imagen:<br>
                            <input type="url" name="foto" value="<?php echo $producto['foto']?>"><br>
                            
                            <input type="submit" value="Enviar"/>
                        </form>
                    </div>

                    <?php
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