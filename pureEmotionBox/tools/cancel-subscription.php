<?php
if(!assert_is_shop_admin()){
    header('Location: ../../../index.php');
} 
    require 'enlace.php';

    $enlace = start_database();
    if (!$enlace) {
        echo "Error: No se pudo conectar a MySQL." . "<br/>";
    } else {
        if(isset($_GET['suscripcion']) && is_numeric($_GET['suscripcion'])){
            $id = $_GET['suscripcion'];
            echo "Hola";
            $q = $enlace->query("UPDATE suscripcion set activo = b'0' WHERE id=".$id);
            
            if(!is_null($q)){
                header('Location: ../../../content/admin/suscription/list.php');
            }
        }
    }
?>