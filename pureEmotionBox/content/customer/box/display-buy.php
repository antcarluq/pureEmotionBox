<?php

//TODO: Hay que adaptar los include
include "../../../wp-load.php";
include "../../../wp-content/themes/zurbox-lite/header.php";
require "../../../tools/enlace.php";

?>

<div class="row">
    <div id="primary" class="content-area small-12 large-8 large-centered columns">
        <main id="main" class="site-main" role="main">

            <article id="post-91" class="post-91 page type-page status-publish hentry wp-sticky">
 
                <header class="entry-header">
                    <h1 class="entry-title"> ¡Enhorabuena! </h1>  <!-- AQUI VA EL TITULO -->                        
                </header><!-- .entry-header -->
    
                <div class="entry-content">
                    <!-- INICIO DEL CONTENIDO -->
                    <?php
                        $enlace = start_database();
                        
                        if (!$enlace) {
                            echo "Error: No se pudo conectar a MySQL." . "<br/>";
                        } else {
                            $id = $_GET['id'];
                            $lista_productos = $enlace->query('SELECT pr.* FROM producto_obtenido_productos p JOIN producto pr WHERE pr.id=p.productos and producto_obtenido=' . $id);
                            $result = $enlace->query('SELECT c.* FROM producto_obtenido p JOIN caja c WHERE c.id=p.caja and p.id=' . $id);
                            $caja = $result->fetch_assoc();
                            $suma_precios = 0;
                 
                            foreach ($lista_productos as $producto) {
                            $suma_precios = $suma_precios + $producto["precio"];
                    ?>
                            <div class="item_producto_admin">
                                <div class="item_producto_admin_info" style="background-color:#F4FEEE">
                                    <div class="item_producto_admin_title">
                                        <p class="item_producto_admin_title"> <?php echo $producto["nombre"] ?> </p>
                                    </div>
                                    <hr>
                    
                                    <img src="<?php echo $producto["foto"] ?>"/>
                                    
                                    <p class="item_producto_admin_info_price"><?php echo $producto["precio"] ?> €</p>
                                    <p class="item_producto_admin_info_ref"> Ref: <?php echo $producto["referencia"] ?> </p>
                    
                                </div>
                    
                            </div>
                    <?php
                            }
                    ?>
                       
                        
                    <?php
                        }
                        mysqli_close($enlace);
                    ?>
                    </br>

                   

                    <!-- FIN DEL CONTENIDO -->
                    </br>
                </div><!-- .entry-content -->
                </br><h3 style="margin-left:50px;margin-top:50px"> Ha obtenido una selección de productos valorada en <?php echo $suma_precios ?>€ por un precio de <?php echo $caja["precio"] ?>€</h3></br>

               
 
            </article><!-- #post-## -->
        </main><!-- #main -->
    </div><!-- #primary -->
</div><!-- .row -->


</div><!-- #content -->
 



<?php 
// TODO: ADAPTAR LOS INCLUDES
include "../../../wp-content/themes/zurbox-lite/footer.php";
?>