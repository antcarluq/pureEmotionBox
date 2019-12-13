<?php

require "enlace.php";
 
try {

    $enlace = start_database();
    $enlace->begin_transaction();
    
   if (isset($_GET['id']) && is_numeric($_GET['id'])){
       $id = $_GET['id'];
       $query = "UPDATE suscripcion SET nombre=?, periodicidad=?, precio=?, tematica=?,activo=? WHERE id=" . $id .";";
       $query_preparada = $enlace->prepare($query);
       $query_preparada->bind_param('ssdsi', $_POST['nombre'], $_POST['periodicidad'], $_POST['precio'], $_POST['tematica'], $_POST['activo']);
       $query_preparada->execute();
       
       $enlace->query("DELETE FROM suscripcion_caja where suscripcion=".$id);
       
       $caja_seleccionada = $_POST['cajas'];
       foreach($caja_seleccionada as $caja){
            $query = "INSERT INTO suscripcion_caja (suscripcion, caja) VALUES(?, ?);";
            $query_preparada = $enlace->prepare($query);
            $query_preparada->bind_param('ii', $id, $caja);
            $query_preparada->execute();
       }
  
   } else {
       
       $query = "INSERT INTO suscripcion (nombre, periodicidad, precio, tematica, activo) VALUES(?, ?, ?, ?, ?);";
       $query_preparada = $enlace->prepare($query);
       
       $query_preparada->bind_param('ssdsi', $_POST['nombre'], $_POST['periodicidad'], $_POST['precio'], $_POST['tematica'], $_POST['activo']);
       $query_preparada->execute();
       
       $id = mysqli_insert_id($enlace);
       $caja_seleccionada = $_POST['cajas'];
       foreach($caja_seleccionada as $caja){
            $query = "INSERT INTO suscripcion_caja (suscripcion, caja) VALUES(?, ?);";
            $query_preparada = $enlace->prepare($query);
            $query_preparada->bind_param('ii', $id, $caja);
            $query_preparada->execute();
       }
   }

   $enlace->commit();
   
   header('Location: ../../../index.php');

} catch (Exception $e) {
   $enlace->rollback();
   //TODO: REVISAR ESTO
   session_start();
   $_SESSION['id'] = $_POST['id'];
   $_SESSION['nombre'] = $_POST['nombre'];
   $_SESSION['periodicidad'] = $_POST['periodicidad'];
   $_SESSION['precio'] = $_POST['precio'];
   $_SESSION['tematica'] = $_POST['tematica'];
   $_SESSION['activo'] = $_POST['activo'];
   $_SESSION['cajas[]'] = $_POST['cajas[]'];

   if(isset($_GET['id']) && is_numeric($_GET['id'])){
    header("Location: ../content/admin/subscription/create.php?subscription=".$_GET['id']);
   } else {
    header("Location: ../content/admin/subscription/create.php");
   }
   
} finally {
   mysqli_close($enlace);
}
 
 
?>
