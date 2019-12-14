<?php
include "../wp-load.php";
require "enlace.php";
include "../wp-load.php";
use \Mailjet\Resources;
require '../vendor/autoload.php';
require '../Mailjet/Client.php';
require '../Mailjet/Config.php';
require '../Mailjet/Request.php';
require '../Mailjet/Resources.php';
require '../Mailjet/Response.php';
 
try {

   $enlace = start_database();
    
   $enlace->begin_transaction();

   if (isset($_GET['id']) && is_numeric($_GET['id'])){
    
       $user = wp_get_current_user()-> ID;

       $identificador = "";

       $direccion_envio = "Suscripcion";

       $fecha = date('Y-m-d H:i:s');;

       $query = "INSERT INTO compra (direccion_envio, fecha, identificador, wp_users) VALUES(?, ?, ?, ?);";
       $query_preparada = $enlace->prepare($query);
       $query_preparada->bind_param('sssi', $direccion_envio, $fecha, $identificador, $user);
       $query_preparada->execute();

       $compra = mysqli_insert_id($enlace);

       $id = $_GET['id'];
       $query = "INSERT INTO compra_suscripciones (compra, suscripciones) VALUES(?, ?);";
       $query_preparada = $enlace->prepare($query);
       $query_preparada->bind_param('ii', $compra, $id);
       $query_preparada->execute();
   }

   $enlace->commit();
   header("Location: ../");

} catch (Exception $e) {
   $enlace->rollback();
   //TODO: REVISAR ESTO
   header("Location: ../../../");
} finally {
   mysqli_close($enlace);
}
 
 
?>
