<?php
 require "enlace.php";
 
try {
    $enlace = start_database();
   $enlace->begin_transaction();
  
   if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])){
       $id_caja = $_REQUEST['id'];
       //UPDATE pureemotionbox.caja SET cantidad_productos=0, activa=0, precio=0, tematica='' WHERE id=0;
       $query_caja = "UPDATE pureemotionbox.caja SET cantidad_productos=?, precio=?, tematica=? WHERE id=" . $id_caja .";";
       $query_caja_preparada = $enlace->prepare($query_caja);
       $query_caja_preparada->bind_param('ids', $_REQUEST['cantidad_productos'], $_REQUEST['precio'], $_REQUEST['tematica']);
       $query_caja_preparada->execute();
  
       $query_borrar_producto = "DELETE FROM producto_seleccionado WHERE caja=" . $id_caja . ";";
       $enlace->query($query_borrar_producto);
       $query_producto = "INSERT INTO pureemotionbox.producto_seleccionado (fijo, caja, producto) VALUES(?, ?, ?);";
 
       foreach ((array)$_REQUEST['productos_fijos'] as $producto){
           $query_producto_preparada = $enlace->prepare($query_producto);
           $fijo = 1;
           $query_producto_preparada->bind_param('iii', $fijo, $id_caja, $producto);
           $query_producto_preparada->execute();
       }
  
       foreach ((array)$_REQUEST['productos_aleatorios'] as $producto){
           $query_producto_preparada = $enlace->prepare($query_producto);
           $no_fijo = 0;
           $query_producto_preparada->bind_param('iii', $no_fijo, $id_caja, intval($producto));
           $query_producto_preparada->execute();
       }
   } else {
       $query_caja = "INSERT INTO pureemotionbox.caja (cantidad_productos, activa, precio, tematica) VALUES(?, 1, ?, ?);";
       $query_caja_preparada = $enlace->prepare($query_caja);
       $query_caja_preparada->bind_param('ids', $_REQUEST['cantidad_productos'], $_REQUEST['precio'], $_REQUEST['tematica']);
       $query_caja_preparada->execute();
       $id_caja = mysqli_insert_id($enlace);
  
       $query_producto = "INSERT INTO pureemotionbox.producto_seleccionado (fijo, caja, producto) VALUES(?, ?, ?);";
  
       foreach ((array)$_REQUEST['productos_fijos'] as $producto){
           $query_producto_preparada = $enlace->prepare($query_producto);
           $fijo = 1;
           $query_producto_preparada->bind_param('iii', $fijo, $id_caja, $producto);
           $query_producto_preparada->execute();
       }
  
       foreach ((array)$_REQUEST['productos_aleatorios'] as $producto){
           $query_producto_preparada = $enlace->prepare($query_producto);
           $no_fijo = 0;
           $query_producto_preparada->bind_param('iii', $no_fijo, $id_caja, intval($producto));
           $query_producto_preparada->execute();
       }
       
   }

   $enlace->commit();
   header("Location: ../content/admin/box/list.php");

} catch (Exception $e) {
   $enlace->rollback();
   //TODO: REVISAR ESTO
   session_start();
   $_SESSION['id'] = $_REQUEST['id'];
   $_SESSION['cantidad_productos'] = $_REQUEST['cantidad_productos'];
   $_SESSION['precio'] = $_REQUEST['precio'];
   $_SESSION['tematica'] = $_REQUEST['tematica'];
   $_SESSION['productos_fijos'] = $_REQUEST['productos_fijos'];
   $_SESSION['productos_aleatorios'] = $_REQUEST['productos_aleatorios'];
   
   header("Location: ../create.php");
} finally {
   mysqli_close($enlace);
}
 
 
?>
