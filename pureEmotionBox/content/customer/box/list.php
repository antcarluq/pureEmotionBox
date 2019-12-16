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
                    <h1 class="entry-title">Cajas en venta</h1>  <!-- AQUI VA EL TITULO -->                        
                </header><!-- .entry-header -->

                <?php if (assert_is_shop_admin()){ ?>
                    <div class="wp-block-button">
                    <a class="wp-block-button__link" href="../../admin/box/list.php">Gestionar cajas</a>
                </div>

                <div class="wp-block-button">
                    <a class="wp-block-button__link" href="../../admin/product/list.php">Gestionar productos</a>
                </div>

                <div class="wp-block-button">
                    <a class="wp-block-button__link" href="../../admin/subscription/list.php">Gestionar suscripciones</a>
                </div>
                <?php } else {?> 
                <div class="wp-block-button">
                    <a class="wp-block-button__link" href="../../customer/subscription/list.php">Suscripciones</a>
                </div>

                <div class="wp-block-button">
                    <a class="wp-block-button__link" href="../../customer/subscription/my-subscriptions.php">Mis suscripciones</a>
                </div>
                <?php }?>

                
    
                <div class="entry-content">
                    <!-- INICIO DEL CONTENIDO -->
                    <?php
                        $enlace = start_database();
                        
                        if (!$enlace) {
                            echo "Error: No se pudo conectar a MySQL." . "<br/>";
                        } else {
                            $lista_cajas = $enlace->query('SELECT * FROM caja WHERE activa = 1');
                            foreach ($lista_cajas as $caja) {
                    ?>
                            <div class="item_caja_cliente">
                                <div class="item_caja_cliente_info">
                                    <div class="item_caja_cliente_title">
                                        <p class="item_caja_cliente_tematica"> <?php echo $caja["tematica"] ?> </p>
                                    </div>
                                    <hr>  

                                    <img src="https://pbs.twimg.com/media/EKSuBevXUAAFWqp?format=png&name=small"/>

                                    <p class="item_caja_admin_info_price"> Precio: <?php echo $caja["precio"] ?> €</p>
                                    <p class="item_caja_admin_info_num"> Número de productos: <?php echo $caja["cantidad_productos"] ?> </p>
                    
                                </div>
                                
                                <a class="item_caja_cliente_ver_productos" href="../product/list.php?id_caja=<?php echo $caja["id"] ?>"> Ver productos </a>
                                <a class="item_caja_cliente_abrir" href="open.php?id_caja=<?php echo $caja["id"] ?>"> Abrir caja </a>
                    
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