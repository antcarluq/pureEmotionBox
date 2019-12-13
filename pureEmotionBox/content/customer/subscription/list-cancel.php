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
        $lista = $enlace->query('SELECT * FROM compra c join compra_suscripciones cs join suscripcion s where c.wp_users ='.$user.'and s.activo=0 and s.id=cs.suscripciones'); 
        echo "Número de resultados: " . $lista->num_rows . "<br/>";
        foreach ($lista as $susc) {
            echo '<br>'.$susc['id'];
            echo '<br>'.$susc['nombre'];
            echo '<br>'.$susc['periodicidad'];
            echo '<br>'.$susc['precio'];
            echo '<br>'.$susc['tematica'];
        }
    }

    mysqli_close($enlace);
?>