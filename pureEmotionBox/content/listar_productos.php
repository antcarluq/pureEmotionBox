<?php
$enlace = mysqli_connect("localhost", "pureemotionbox", "pureemotionboxPGPI21", "pureemotionbox");
    $enlace->set_charset("utf8");

    if (!$enlace) {
        echo "Error: No se pudo conectar a MySQL." . "<br/>";
    } else {
        $lista_productos = $enlace->query('SELECT * FROM producto p');
        echo "Número de resultados: " . $lista_productos->num_rows . "<br/>";
        foreach ($lista_productos as $producto) {
            ?>
            <div class="item_producto_admin">
                <div class="item_producto_admin_info">
                    <div class="item_producto_admin_title">
                        <p class="item_producto_admin_title"> <?php echo $producto["nombre"] ?> </p>
                    </div>
                    <hr>

                    <img src="<?php echo $producto["foto"] ?>"/>
                    
                    <p> Precio: <?php echo $producto["precio"] ?> €</p>
                    <p> Ref: <?php echo $producto["referencia"] ?> </p>

                </div>
                
                <a class="item_producto_admin_edit" href="/editar-producto.php"> Editar </a>
                <a class="item_producto_admin_cancel" href="/cancelar-producto.php"> Cancelar </a>

            </div>
            <?php
        }
    }

    mysqli_close($enlace);
?>
</br>
