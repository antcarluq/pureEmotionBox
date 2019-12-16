<?php 
include "../wp-load.php";
use \Mailjet\Resources;
require '../vendor/autoload.php';
require '../Mailjet/Client.php';
require '../Mailjet/Config.php';
require '../Mailjet/Request.php';
require '../Mailjet/Resources.php';
require '../Mailjet/Response.php';
 
require "enlace.php";
    $enlace = start_database();
 
if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . "<br/>";
} else {
    if (empty($_REQUEST['paymentID']) || empty($_REQUEST['payerID']) || empty($_REQUEST['token'])){
        header('Location: ../index.php');
    }
    
    $user = wp_get_current_user();
    $id = $user->ID;
    if($id!=0){
        $query = "INSERT INTO compra (direccion_envio, fecha, identificador,wp_users) VALUES(?, CURRENT_TIMESTAMP, ?,?);";
        $query_preparada = $enlace->prepare($query);
        $identificador = $_REQUEST['paymentID'];
        $query_preparada->bind_param('ssi', $_REQUEST['direccion_envio'], $identificador,$id);
    }else{
        $query = "INSERT INTO compra (direccion_envio, fecha, identificador) VALUES(?, CURRENT_TIMESTAMP, ?);";
        $query_preparada = $enlace->prepare($query);
        $identificador = $_REQUEST['paymentID'];
        $query_preparada->bind_param('ss', $_REQUEST['direccion_envio'], $identificador);
    }
    $query_preparada->execute();
 
    $id_compra = mysqli_insert_id($enlace);
 
    $query = "INSERT INTO producto_obtenido (caja, compra) VALUES(?, ?);";
    $query_preparada = $enlace->prepare($query);
    $query_preparada->bind_param('ii', $_REQUEST['id'], $id_compra);
    $query_preparada->execute();
 
    $id_producto_obtenido = mysqli_insert_id($enlace);
 
    $productos_seleccionados_fijos = $enlace->query('SELECT * FROM producto_seleccionado WHERE fijo=1 AND caja=' . $_REQUEST['id']);
    
    foreach ($productos_seleccionados_fijos as $producto_fijo) {
        $query = "INSERT INTO producto_obtenido_productos (producto_obtenido, productos) VALUES(?, ?);";
        $query_preparada = $enlace->prepare($query);
        $query_preparada->bind_param('ii', $id_producto_obtenido, $producto_fijo["producto"]);
        $query_preparada->execute();
    }
 
    $result_caja = $enlace->query('SELECT * FROM caja WHERE id=' . $_REQUEST['id']);
    $caja = $result_caja->fetch_assoc();
 
    $numero_productos_restantes = $caja["cantidad_productos"] - mysqli_num_rows($productos_seleccionados_fijos);
 
    $result_productos_restantes = $enlace->query('SELECT * FROM producto_seleccionado WHERE fijo=0 AND caja=' . $_REQUEST['id']);
    $productos_aleatorios = $result_productos_restantes->fetch_all();
    
    $i = 0;
    while($i < $numero_productos_restantes){
        $id_elemento_seleccionado = rand(0, count($productos_aleatorios)-1);
        $elemento_seleccionado = $productos_aleatorios[$id_elemento_seleccionado];
        $aux = intval($elemento_seleccionado[3]);
        $query = "INSERT INTO producto_obtenido_productos (producto_obtenido, productos) VALUES(?, ?);";
        $query_preparada = $enlace->prepare($query);
        $query_preparada->bind_param('ii', $id_producto_obtenido, $aux);
        $query_preparada->execute();
        unset($productos_aleatorios[$id_elemento_seleccionado]);
        $i = $i + 1;
    }

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
                    <p class="info"><strong class="title">Caja: </strong>'.$caja['tematica'].'</p>
                </li>
                <li>
                    <p class="info"><strong class="title">Precio: </strong>'.$caja['precio'].'</p>
                </li>
                <li>
                    <p class="info"><strong class="title">Dirección de envío: </strong>'.$_REQUEST['direccion_envio'].'</p>
                </li>
                <li>
                    <p class="info"><strong class="title">Fecha: </strong>'.date("d-m-Y").'</p>
                </li>
                <li>
                    <p class="info"><strong class="title">Identificador: </strong>'.$identificador.'</p>
                </li>
            </ul>
    </div>
    </br>
    </br>
    <!-- Productos -->
    <div class="container">
        <div class="div_header">
            <h3>Productos</h3>
        </div>';
    $productos_comprados = $enlace->query('SELECT pr.* FROM producto_obtenido_productos p JOIN producto pr WHERE pr.id=p.productos and producto_obtenido=' . $id_producto_obtenido);
    
    foreach($productos_comprados as $producto_comprado){
        $body .=
        '<div class="producto">
            <img src="'.$producto_comprado['foto'].'" alt='.$producto_comprado['nombre'].'>
            <ul>
                <li>
                    <p class="info"><strong class="title">Nombre: </strong> '.$producto_comprado['nombre'].'</p>
                </li>
                <li>
                    <p class="info"><strong class="title">Valor: </strong> '.$producto_comprado['precio'].' €</p>
                </li>
                <li>
                    <p class="info"><strong class="title">Referencia: </strong> '.$producto_comprado['referencia'].'</p>
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
    
header("Location: ../content/customer/box/display-buy.php?id=" . $id_producto_obtenido);
 
}
mysqli_close($enlace);
 
?>


