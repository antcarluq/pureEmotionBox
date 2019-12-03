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
                    <h1 class="entry-title">Cajas del sistema</h1>  <!-- AQUI VA EL TITULO -->                        
                </header><!-- .entry-header -->
    
                <div class="entry-content">
                    <!-- INICIO DEL CONTENIDO -->

                    <div class="wp-block-button">
                        <a class="wp-block-button__link" href="create.php">Crear caja</a>
                    </div>

                    <?php
                        $enlace = start_database();
                        
                        if (!$enlace) {
                            echo "Error: No se pudo conectar a MySQL." . "<br/>";
                        } else {
                            $lista_cajas = $enlace->query('SELECT * FROM caja c');
                            echo "Número de resultados: " . $lista_cajas->num_rows . "<br/>";
                            foreach ($lista_cajas as $caja) {
                    ?>
                                <div class="item_caja_admin">
                                    <div class="item_caja_admin_info">
                                        <div class="item_caja_admin_title">
                                            <p class="item_caja_admin_title"> <?php echo $caja["tematica"] ?> </p>
                                        </div>
                                        <hr>

                                        <img src="https://pbs.twimg.com/media/EKSuBevXUAAFWqp?format=png&name=small"/>

                                        <p class="item_caja_admin_info_price"><?php echo $caja["precio"] ?> €</p>
                                        <p class="item_caja_admin_info_num"> Contiene <?php echo $caja["cantidad_productos"] ?> producto(s) </p>
                        
                                    </div>
                                    
                                    <a class="item_caja_admin_edit" href="edit.php?id=<?php echo $caja["id"] ?>"> Editar </a>
                                    
                                    <?php 
                                            if($caja["activa"]){ ?>
                                                <a class="item_caja_admin_cancel" href="../../../tools/cancel-box.php?id=<?php echo $caja["id"] ?>"> Cancelar </a>
                                    <?php   } else {  ?>
                                                <a class="item_caja_admin_activate" href="../../../tools/activate-box.php?id=<?php echo $caja["id"] ?>"> Activar </a>
                                    <?php   } ?>
                                  


                                    <a class="item_caja_admin_ver_productos" href="../product/list.php?id_caja=<?php echo $caja["id"] ?>"> Ver productos </a>
                        
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
include "../../../wp-content/themes/zurbox-lite/footer.php";}?>