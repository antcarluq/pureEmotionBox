<?php 


require "enlace.php";
$enlace = start_database();

    if (!$enlace) {
        echo "Error: No se pudo conectar a MySQL." . "<br/>";
    } else {
        echo "Se ha conectado correctamente" . "<br/>";
        $id = $_POST['id_producto'];
        if(isset($id) && is_numeric($id)){
            $query = "UPDATE pureemotionbox.producto SET descripcion=?, foto=?, nombre=?, precio=?, referencia=? WHERE id=" . $id . ";";
            
        } else{
            $query = "INSERT INTO pureemotionbox.producto (descripcion, foto, nombre, precio, referencia) VALUES(?, ?, ?, ?, ?);";
        }

        $query_preparada = $enlace->prepare($query);
        $query_preparada->bind_param('sssds', $_REQUEST['descripcion'], $_REQUEST['foto'], $_REQUEST['nombre'], $_REQUEST['precio'], $_REQUEST['referencia']);
        $query_preparada->execute();
        


        header("Location: ../content/admin/product/list.php");
           
    }


    mysqli_close($enlace);

?>