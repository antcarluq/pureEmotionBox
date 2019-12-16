<?php
    include "../../../wp-load.php";
    include "../../../wp-content/themes/zurbox-lite/header.php";
    require "../../../security-functions.php";
    require "../../../tools/enlace.php";

    if(!assert_is_shop_admin()){
        header('Location: ../../../index.php');
    } 


    $enlace = start_database();
    
    if (!$enlace) {
        echo "Error: No se pudo conectar a MySQL." . "<br/>";
    } else {
            $lista = $enlace->query('select * from suscripcion;');
            echo "Número de resultados: " . $lista->num_rows . "<br/>";
            foreach ($lista as $susc) {
                echo '<br>'.$susc['nombre'];
                echo '<br>'.$susc['periodicidad'];
                echo '<br>'.$susc['precio'];
                echo '<br>'.$susc['tematica'];
                echo '<br>'.'<a href="create.php?subscription='.$susc['id'].'">Editar</a>';
                if($susc['activo']==1){
                    echo '<br>'.'<a href="../../../tools/cancel-subscription.php?suscripcion='.$susc['id'].'">Cancelar</a>';
                } else {
                    echo '<br>'.'<a href="../../../tools/activate-subscription.php?suscripcion='.$susc['id'].'">Activar</a>';
                }
            
        }
        
        
    }

    mysqli_close($enlace);
?>
