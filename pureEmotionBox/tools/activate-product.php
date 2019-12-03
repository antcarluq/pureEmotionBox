<?php
require "enlace.php";
$enlace = start_database();
    if (!$enlace) {
       echo "Error: No se pudo conectar a MySQL." . "<br/>";
   } else {
         $id = $_GET['id'];
         $sql = $enlace -> query ('UPDATE producto SET cancelado = 0 where id='.$id);
       header("Location: ../content/admin/product/list.php");
   }
 
   mysqli_close($enlace);
?>
 