<?php
    include "../../../wp-load.php";
    include "../../../wp-content/themes/zurbox-lite/header.php";
    require "../../../security-functions.php";
    require "../../../tools/enlace.php";

    $enlace = start_database();
    
    if (!$enlace) {
        echo "Error: No se pudo conectar a MySQL." . "<br/>";
    } else {
            $lista = $enlace->query('select * from suscripcion where activo=1');
            echo "Número de resultados: " . $lista->num_rows . "<br/>";
            foreach ($lista as $susc) {
                echo '<br>'.$susc['id'];
                echo '<br>'.$susc['nombre'];
                echo '<br>'.$susc['periodicidad'];
                echo '<br>'.$susc['precio'];
                echo '<br>'.$susc['tematica'];

                if (assert_is_customer()){
                    echo "<a href='subscription.php?suscripcion=".$susc['id']."'>Suscribirse</a>";
                }
        }
        
    }

    mysqli_close($enlace);
?>