<?php 
include "../wp-load.php";
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
 
// /* Exception class. */
// require '../PHPMailer-master/src/Exception.php';
 
// /* The main PHPMailer class. */
// require '../PHPMailer-master/src/PHPMailer.php';
 
// /* SMTP class, needed if you want to use SMTP. */
// require '../PHPMailer-master/src/SMTP.php';

 
require "enlace.php";
    $enlace = start_database();
 
if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . "<br/>";
} else {
    
    $user = wp_get_current_user();
    $id = $user->ID;
    if($id!=0){
        $query = "INSERT INTO pureemotionbox.compra (direccion_envio, fecha, identificador,wp_users) VALUES(?, CURRENT_TIMESTAMP, ?,?);";
        $query_preparada = $enlace->prepare($query);
        $identificador = rand(1,30000);
        $query_preparada->bind_param('sii', $_REQUEST['direccion_envio'], $identificador,$id);
    }else{
        $query = "INSERT INTO pureemotionbox.compra (direccion_envio, fecha, identificador) VALUES(?, CURRENT_TIMESTAMP, ?);";
        $query_preparada = $enlace->prepare($query);
        $identificador = rand(1,30000);
        $query_preparada->bind_param('si', $_REQUEST['direccion_envio'], $identificador);
    }
    $query_preparada->execute();
 
    $id_compra = mysqli_insert_id($enlace);
 
    $query = "INSERT INTO pureemotionbox.producto_obtenido (caja, compra) VALUES(?, ?);";
    $query_preparada = $enlace->prepare($query);
    $query_preparada->bind_param('ii', $_REQUEST['id_caja'], $id_compra);
    $query_preparada->execute();
 
    $id_producto_obtenido = mysqli_insert_id($enlace);
 
    $productos_seleccionados_fijos = $enlace->query('SELECT * FROM producto_seleccionado WHERE fijo=1 AND caja=' . $_REQUEST['id_caja']);
    
    foreach ($productos_seleccionados_fijos as $producto_fijo) {
        $query = "INSERT INTO pureemotionbox.producto_obtenido_productos (producto_obtenido, productos) VALUES(?, ?);";
        $query_preparada = $enlace->prepare($query);
        $query_preparada->bind_param('ii', $id_producto_obtenido, $producto_fijo["producto"]);
        $query_preparada->execute();
    }
 
    $result_caja = $enlace->query('SELECT * FROM caja WHERE id=' . $_REQUEST['id_caja']);
    $caja = $result_caja->fetch_assoc();
 
    $numero_productos_restantes = $caja["cantidad_productos"] - mysqli_num_rows($productos_seleccionados_fijos);
 
    $result_productos_restantes = $enlace->query('SELECT * FROM producto_seleccionado WHERE fijo=0 AND caja=' . $_REQUEST['id_caja']);
    $productos_aleatorios = $result_productos_restantes->fetch_all();
    
    $i = 0;
    while($i < $numero_productos_restantes){
        $id_elemento_seleccionado = rand(0, count($productos_aleatorios)-1);
        $elemento_seleccionado = $productos_aleatorios[$id_elemento_seleccionado];
        $aux = intval($elemento_seleccionado[3]);
        $query = "INSERT INTO pureemotionbox.producto_obtenido_productos (producto_obtenido, productos) VALUES(?, ?);";
        $query_preparada = $enlace->prepare($query);
        $query_preparada->bind_param('ii', $id_producto_obtenido, $aux);
        $query_preparada->execute();
        unset($productos_aleatorios[$id_elemento_seleccionado]);
        $i = $i + 1;
    }

    // $email = new PHPMailer(TRUE);
    // $email_user = "pureemotionbox@gmail.com";
    // $email_password = "pureemotionboxPGPI21";
    // $the_subject = "Confirmación de compra en Pure eMotion Box";
    // $address_to = $_REQUEST['email'];
    // $from_name = "Pure eMotion Box";
    // $phpmailer = new PHPMailer();
    // // ---------- datos de la cuenta de Gmail -------------------------------
    // $phpmailer->Username = $email_user;
    // $phpmailer->Password = $email_password;
    // //-----------------------------------------------------------------------
    // // $phpmailer->SMTPDebug = 1;
    // $phpmailer->SMTPSecure = 'ssl';
    // $phpmailer->Host = "smtp.gmail.com"; // GMail
    // $phpmailer->Port = 465;
    // $phpmailer->IsSMTP(); // use SMTP
    // $phpmailer->SMTPAuth = true;
    // $phpmailer->setFrom($phpmailer->Username,$from_name);
    // $phpmailer->AddAddress($address_to); // recipients email
    // $phpmailer->Subject = $the_subject;
    // $phpmailer->Body .='
    // <!DOCTYPE html>
    // <html lang="en">
    // <head>
    // <meta charset="UTF-8">
    // <meta name="viewport" content="width=device-width, initial-scale=1.0">
    // <meta http-equiv="X-UA-Compatible" content="ie=edge">
    // <title>Document</title>
    // <style>
    
    // body{
    //     font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji;
    // }
    // h3{
    //     font-size: 20px;
    // }
    
    // .container {
    //     padding-bottom: 5px;
    //     border: 1px solid #d1d5da;
    //     border-radius: 3px 3px 0px 0px;
    // }
    // .div_header {
    //     padding: 10px 25px;
    //     border-bottom: 1px solid #d1d5da;
    //     background: #f6f8fa;
    // }
    // ul{
    //     list-style: none;
    // }
    
    // strong.title{
    //     color:darkslategray;
    // }
    
    // p.info{
    //     color: #3E5F8A;
    //     font-size: 18px;
    // }
    
    // .producto{
    //     margin: 50px;
    // }
    
    // img{
    //     width: 10%;
    // }
    
    // .producto > ul{
    //     float: left;
    //     margin-right: 100px;
    // }
    
    // </style>
    // </head>
    // <body>
    // <!-- Detalles de la compra -->
    // <div class="container">
    //     <div class="div_header">
    //         <h3>Detalles de la compra</h3>
    //     </div>
    //         <ul>
    //             <li>
    //                 <p class="info"><strong class="title">Caja: </strong>'.$caja['tematica'].'</p>
    //             </li>
    //             <li>
    //                 <p class="info"><strong class="title">Precio: </strong>'.$caja['precio'].'</p>
    //             </li>
    //             <li>
    //                 <p class="info"><strong class="title">Dirección de envío: </strong>'.$_REQUEST['direccion_envio'].'</p>
    //             </li>
    //             <li>
    //                 <p class="info"><strong class="title">Fecha: </strong>'.date("d-m-Y").'</p>
    //             </li>
    //             <li>
    //                 <p class="info"><strong class="title">Identificador: </strong>'.$identificador.'</p>
    //             </li>
    //         </ul>
    // </div>
    // </br>
    // </br>
    // <!-- Productos -->
    // <div class="container">
    //     <div class="div_header">
    //         <h3>Productos</h3>
    //     </div>';
    // $productos_comprados = $enlace->query('SELECT pr.* FROM producto_obtenido_productos p JOIN producto pr WHERE pr.id=p.productos and producto_obtenido=' . $id_producto_obtenido);
    
    // foreach($productos_comprados as $producto_comprado){
    //     $phpmailer->Body .=
    //     '<div class="producto">
    //         <img src="'.$producto_comprado['foto'].'" alt='.$producto_comprado['nombre'].'>
    //         <ul>
    //             <li>
    //                 <p class="info"><strong class="title">Nombre: </strong> '.$producto_comprado['nombre'].'</p>
    //             </li>
    //             <li>
    //                 <p class="info"><strong class="title">Valor: </strong> '.$producto_comprado['precio'].' €</p>
    //             </li>
    //             <li>
    //                 <p class="info"><strong class="title">Referencia: </strong> '.$producto_comprado['referencia'].'</p>
    //             </li>
    //         </ul>
    //     </div>';
    //     $phpmailer->Body .='
    // </div>
    // </br>
    // </body>
    // </html>
    // ';}
    // $phpmailer->IsHTML(true);
    // $phpmailer->Send();
    
    header("Location: ../content/customer/box/display-buy.php?id=" . $id_producto_obtenido);
 
}
mysqli_close($enlace);
 
?>


