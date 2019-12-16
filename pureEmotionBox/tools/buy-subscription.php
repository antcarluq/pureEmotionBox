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

   if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])){
        if (empty($_REQUEST['paymentID']) || empty($_REQUEST['payerID']) || empty($_REQUEST['token'])){
            header('Location: ../index.php');
        }
    
       $user = wp_get_current_user()-> ID;

       $identificador = $_REQUEST['paymentID'];

       $direccion_envio = $_REQUEST["direccion_envio"];

       $query = "INSERT INTO compra (direccion_envio, fecha, identificador, wp_users) VALUES(?, CURRENT_TIMESTAMP, ?, ?);";
       $query_preparada = $enlace->prepare($query);
       $query_preparada->bind_param('ssi', $direccion_envio, $identificador, $user);
       $query_preparada->execute();

       $compra = mysqli_insert_id($enlace);

       $id = $_REQUEST['id'];
       $query = "INSERT INTO compra_suscripciones (compra, suscripciones) VALUES(?, ?);";
       $query_preparada = $enlace->prepare($query);
       $query_preparada->bind_param('ii', $compra, $id);
       $query_preparada->execute();
   }

   $result_suscripcion = $enlace->query('SELECT * FROM suscripcion WHERE id=' . $id);
   $suscripcion = $result_suscripcion->fetch_assoc();

   $enlace->commit();

   $body = ' <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    
    body{
        font-family: -apple-system,BlinkMacSystemFont,Segoe UI,Helvetica,Arial,sans-serif,Apple Color Emoji,Segoe UI Emoji;
    }
    h3{
        font-size: 20px;
    }
    
    .container {
        padding-bottom: 5px;
        border: 1px solid #d1d5da;
        border-radius: 3px 3px 0px 0px;
    }
    .div_header {
        padding: 10px 25px;
        border-bottom: 1px solid #d1d5da;
        background: #f6f8fa;
    }
    ul{
        list-style: none;
    }
    
    strong.title{
        color:darkslategray;
    }
    
    p.info{
        color: #3E5F8A;
        font-size: 18px;
    }
    
    .producto{
        margin: 50px;
    }
    
    img{
        width: 10%;
    }
    
    .producto > ul{
        float: left;
        margin-right: 100px;
    }
    
    </style>
    </head>
    <body>
    <!-- Detalles de la compra -->
    <div class="container">
        <div class="div_header">
            <h3>Detalles de la compra</h3>
        </div>
            <ul>
                <li>
                    <p class="info"><strong class="title">Suscripción: </strong>'.$suscripcion['nombre'].'</p>
                </li>
                <li>
                    <p class="info"><strong class="title">Periodicidad: </strong>'.$suscripcion['periodicidad'].'</p>
                </li>
                <li>
                    <p class="info"><strong class="title">Precio: </strong>'.$suscripcion['precio'].'</p>
                </li>
                <li>
                    <p class="info"><strong class="title">Temática: </strong>'.$suscripcion['tematica'].'</p>
                </li>
                <li>
                    <p class="info"><strong class="title">Fecha: </strong>'.date("d-m-Y").'</p>
                </li>
                <li>
                    <p class="info"><strong class="title">Dirección de envío: </strong>'.$_REQUEST['direccion_envio'].'</p>
                </li>
                <li>
                    <p class="info"><strong class="title">Identificador: </strong>'.$identificador.'</p>
                </li>
            </ul>
    </div>
    </br>
    </br>
    <!-- Cajas -->
    <div class="container">
        <div class="div_header">
            <h3>Cajas</h3>
        </div>';
      //TODO
    $cajas_compradas = $enlace->query('SELECT ca.* FROM suscripcion_caja s JOIN caja ca WHERE ca.id=s.caja and s.suscripcion=' . $id);
    
    foreach($cajas_compradas as $caja_comprada){
        $body .=
        '<div class="caja">
            <ul>
                <li>
                    <p class="info"><strong class="title">Temática: </strong> '.$caja_comprada['tematica'].'</p>
                </li>
                <li>
                    <p class="info"><strong class="title">Precio: </strong> '.$caja_comprada['precio'].' €</p>
                </li>
                <li>
                    <p class="info"><strong class="title">Cantidad de productos: </strong> '.$caja_comprada['cantidad_productos'].'</p>
                </li>
            </ul>
        </div>';}
        $body .='
    </div>
    </br>
    </body>
    </html>';

    $mj = new \Mailjet\Client('f36d74fe239227e1c1805fd3f4672a00','694b477e742edfd912152bb427d0cebc',true,['version' => 'v3.1']);
$body = [
    'Messages' => [
    [
        'From' => [
        'Email' => "pureemotionbox@gmail.com",
        'Name' => "Pure eMotion Box"
        ],
        'To' => [
        [
            'Email' => $_REQUEST['email'],
            'Name' => $_REQUEST['email']
        ]
        ],
        'Subject' => "Confirmación de compra en Pure eMotion Box",
        'TextPart' => "Confirmación de compra en Pure eMotion Box",
        'HTMLPart' => $body,
        'CustomID' => "AppGettingStartedTest"
    ]
    ]
];
$response = $mj->post(Resources::$Email, ['body' => $body]);
$response->success() && var_dump($response->getData());
   header("Location: ../content/customer/subscription/my-subscriptions.php");

} catch (Exception $e) {
   $enlace->rollback();
   //TODO: REVISAR ESTO
   header("Location: ../../../");
} finally {
   mysqli_close($enlace);
}
 
 
?>
