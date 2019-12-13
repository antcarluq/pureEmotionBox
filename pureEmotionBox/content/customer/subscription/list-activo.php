<?php
    include "../../../wp-load.php";
    include "../../../wp-content/themes/zurbox-lite/header.php";
    require "../../../security-functions.php";
    require "../../../tools/enlace.php";

    $enlace = start_database();
    
    if (!$enlace) {
        echo "Error: No se pudo conectar a MySQL." . "<br/>";
    } else {
        if(isset($_GET['caja'])){
            $lista = $enlace->query('select DISTINCT * from suscripcion s join suscripcion_caja sc where sc.suscripcion=s.id and sc.caja ='.$_GET['caja']);
            echo "Número de resultados: " . $lista->num_rows . "<br/>";
            foreach ($lista as $susc) {
                echo '<br>'.$susc['id'];
                echo '<br>'.$susc['nombre'];
                echo '<br>'.$susc['periodicidad'];
                echo '<br>'.$susc['precio'];
                echo '<br>'.$susc['tematica'];
                echo "<a href='../../../tools/subscription.php?suscripcion=".$susc['id']."'>Suscribirse</a>";
            }
        }
        
    }

    mysqli_close($enlace);
?>