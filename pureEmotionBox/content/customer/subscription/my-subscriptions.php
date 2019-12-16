<?php
    include "../../../wp-load.php";
    include "../../../wp-content/themes/zurbox-lite/header.php";
    require "../../../security-functions.php";
    require "../../../tools/enlace.php";

    $enlace = start_database();
    
    if (!$enlace) {
        echo "Error: No se pudo conectar a MySQL." . "<br/>";
    } else {
        $user = wp_get_current_user()-> ID;
        $lista = $enlace->query('SELECT * FROM compra c join compra_suscripciones cs join suscripcion s where wp_users = '.$user.' and c.id = cs.compra and cs.suscripciones = s.id and s.activo = 1;'); 
        foreach ($lista as $susc) {
            echo '<br>'.$susc['nombre'];
            echo '<br>'.$susc['periodicidad'];
            echo '<br>'.$susc['precio'];
            echo '<br>'.$susc['tematica'];
            echo '<br>'.$susc['fecha'];
            echo '<br>';
        }
    }

    mysqli_close($enlace);
?>