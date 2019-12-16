<?php

//TODO: Hay que adaptar los include
include "../../../wp-load.php";
include "../../../wp-content/themes/zurbox-lite/header.php";
require "../../../security-functions.php";
require "../../../tools/enlace.php";
require "../../../tools/paypal-config.php";

?>

<div class="row">
    <div id="primary" class="content-area small-12 large-8 large-centered columns">
        <main id="main" class="site-main" role="main">

            <article id="post-91" class="post-91 page type-page status-publish hentry wp-sticky">

                <?php 
                    $enlace = start_database();
                    if (!$enlace) {
                        echo "Error: No se pudo conectar a MySQL." . "<br/>";
                    } else {
                        $id = $_GET['id_caja'];
                        $result = $enlace->query('SELECT * FROM caja WHERE id=' . $id);
                        $caja = $result->fetch_assoc();
                    }
                ?>

                <header class="entry-header">
                    <h1 class="entry-title">Vas a proceder a abrir la caja: <?php echo $caja["tematica"] ?></h1>  <!-- AQUI VA EL TITULO -->                        
                </header><!-- .entry-header -->
    
                <div class="entry-content">
                    <!-- INICIO DEL CONTENIDO -->
                        
                        <div id="form_product">   
                            <form action="../../../tools/buy-box.php" method="POST">
                                <input type="hidden" name="id_caja" value="<?php echo $caja["id"] ?>" readonly><br>
                                
                                Introduce el correo al que quieres que llegue la factura y los datos de tu compra:<br>
                                <input id="email" type="email" name="email"><br>

                                Introduce la dirección de envío:<br>
                                <input id="direccion_envio" type="text" name="direccion_envio"><br>
                                
                                <!-- <input type="submit" value="Enviar"/> -->
                                <p>Precio: <?php echo $caja['precio']?> €</p>
                                <?php 
                                $precio_paypal = $caja['precio'];
                                $action_paypal = "../../../tools/buy-box.php";
                                $id_objeto_paypal = $caja["id"];
                                include "../../../tools/paypal-checkout.php";
                                ?>
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
include "../../../wp-content/themes/zurbox-lite/footer.php";
?>