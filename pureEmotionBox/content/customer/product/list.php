<?php

//TODO: Hay que adaptar los include
include "../../../wp-load.php";
include "../../../wp-content/themes/zurbox-lite/header.php";
require "../../../security-functions.php";
require "../../../tools/enlace.php";
?>

<div class="row">
    <div id="primary" class="content-area small-12 large-8 large-centered columns">
        <main id="main" class="site-main" role="main">

            <article id="post-91" class="post-91 page type-page status-publish hentry wp-sticky">
 
                <header class="entry-header">
                    <h1 class="entry-title">Productos de una caja</h1>  <!-- AQUI VA EL TITULO -->                        
                </header><!-- .entry-header -->
    
                <div class="entry-content">
                    <!-- INICIO DEL CONTENIDO -->



                    <?php
                        $enlace = start_database();

                        if (!$enlace) {
                            echo "Error: No se pudo conectar a MySQL." . "<br/>";
                        } else {
                            $id_caja = $_GET['id_caja'];
                            $lista_productos = $enlace->query('SELECT pr.* FROM producto_seleccionado p JOIN producto pr where pr.id=p.producto and p.caja =' . $id_caja);

                            echo "Número de resultados: " . $lista_productos->num_rows . "<br/>";
                            foreach ($lista_productos as $producto) {
                                $es_fijo = $enlace->query('SELECT p.fijo FROM producto_seleccionado p JOIN producto pr where pr.id=p.producto and p.caja = ' . $id_caja .' and pr.id =' . $producto["fijo"]);
                                if($es_fijo){
                                    $s_fijo = "| Producto fijo";
                                } else{
                                    $s_fijo = "";
                                }
                    ?>
                                <div class="item_producto_admin">
                                    <div class="item_producto_admin_info">
                                        <div class="item_producto_admin_title">
                                            <p class="item_producto_admin_title"> <?php echo $producto["nombre"] ?> </p>
                                        </div>
                                        <hr>

                                        <img src="<?php echo $producto["foto"] ?>"/>
                                        
                                        <p class="item_producto_admin_info_price"><?php echo $producto["precio"] ?> €</p>
                                        <p class="item_producto_admin_info_ref"> Ref: <?php echo $producto["referencia"] ?> <?php echo $s_fijo ?> </p>

                                    </div>

                                </div>
                    <?php
                            }
                        }

                        mysqli_close($enlace);
                    ?>
                    </br>
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
include "../../../wp-content/themes/zurbox-lite/footer.php";
?>