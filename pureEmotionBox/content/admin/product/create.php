<?php

//TODO: Hay que adaptar los include
include "../../../wp-load.php";
include "../../../wp-content/themes/zurbox-lite/header.php";
require "../../../security-functions.php";
if (!assert_is_shop_admin()){
    header('Location: ../../../index.php');
} else {
?>

<div class="row">
    <div id="primary" class="content-area small-12 large-8 large-centered columns">
        <main id="main" class="site-main" role="main">

            <article id="post-91" class="post-91 page type-page status-publish hentry wp-sticky">
 
                <header class="entry-header">
                    <h1 class="entry-title">Crear Producto</h1>  <!-- AQUI VA EL TITULO -->                        
                </header><!-- .entry-header -->
    
                <div class="entry-content">
                    <!-- INICIO DEL CONTENIDO -->
                     <div id="form_product">   
                        <form action="../../../tools/save-product.php" method="POST">

                                Nombre:<br>
                                <input type="text" name="nombre" required=""><br>

                                Descripción:<br>
                                <textarea row="15" name="descripcion" required=""></textarea><br>

                                Referencia:<br>
                                <input type="text" name="referencia"><br required="">

                                Precio:<br>
                                <input type="number" step="0.01" name="precio" required=""><br>

                                Imagen:<br>
                                <input type="url" name="foto" required=""><br>

                                <input id="submit" type="submit" value="Enviar">
                        </form>
                    </div>
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