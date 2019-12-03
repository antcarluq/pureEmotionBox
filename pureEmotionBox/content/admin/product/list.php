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
                    <h1 class="entry-title">Productos del sistema</h1>  <!-- AQUI VA EL TITULO -->                        
                </header><!-- .entry-header -->
    
                <div class="entry-content">
                    <!-- INICIO DEL CONTENIDO -->

                    <div class="wp-block-button"><a class="wp-block-button__link" href="/content/admin/product/create.php">Crear producto</a></div>


                    <?php
                        $enlace = start_database();

                        if (!$enlace) {
                            echo "Error: No se pudo conectar a MySQL." . "<br/>";
                        } else {
                            $id_caja = $_GET['id_caja'];
                            if(isset($id_caja) && is_numeric($id_caja)){
                                $lista_productos = $enlace->query('SELECT pr.* FROM producto_seleccionado p JOIN producto pr where pr.id=p.producto and p.caja =' . $id_caja);
                            } else{
                                $lista_productos = $enlace->query('SELECT * FROM producto p');
                            }

                            echo "Número de resultados: " . $lista_productos->num_rows . "<br/>";
                            foreach ($lista_productos as $producto) {
                                $s_fijo = "";
                                if(isset($id_caja) && is_numeric($id_caja)){
                                    $res = $enlace->query('SELECT p.fijo FROM producto_seleccionado p JOIN producto pr where pr.id=p.producto and p.caja = ' . $id_caja .' and pr.id =' . $producto["id"]);
                                        $es_fijo = $res-> fetch_assoc();
                                        if($es_fijo['fijo']=="1"){
                                            $s_fijo = "| Producto fijo";
                                        } 
                                }
                    ?>
                                <div class="item_producto_admin">
                                    <div class="item_producto_admin_info">
                                        <div class="item_producto_admin_title">
                                            <p class="item_producto_admin_title"> <?php echo $producto["nombre"] ?> </p>
                                        </div>
                                        <hr>

                                        <img src="<?php echo $producto["foto"] ?>"/>
                                        
                                        <p class="item_producto_admin_info_price"><?php echo $producto["precio"] ?> € </p>
                                        <p class="item_producto_admin_info_ref"> Ref: <?php echo $producto["referencia"] ?> <?php echo $s_fijo ?></p>

                                    </div>
                                    
                                    <?php  if(!(isset($id_caja) && is_numeric($id_caja))){ ?>

                                        <a class="item_producto_admin_edit" href="edit.php?id=<?php echo $producto["id"] ?>"> Editar </a>

                                        <?php 
                                                if($producto["cancelado"]){ ?>
                                                    <a class="item_producto_admin_activate" href="../../../tools/activate-product.php?id=<?php echo $producto["id"] ?>"> Activar </a>
                                        <?php   } else {  ?>
                                                    <a class="item_producto_admin_cancel" href="../../../tools/cancel-product.php?id=<?php echo $producto["id"] ?>"> Cancelar </a>
                                        <?php   } ?>
                                    <?php   }?>

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