<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">

    <title>Document</title>
</head>
<body>
    <?php 

    echo phpversion() . "<br/>";
    
    $enlace = mysqli_connect("localhost", "pureemotionbox", "pureemotionboxPGPI21", "pureemotionbox");
    echo mysqli_connect_error($enlace);
    
    
    echo "Hola mundo";
    $enlace->set_charset("utf8");
    echo "Hola mundo 2";
    if (!$enlace) {
        echo "Error: No se pudo conectar a MySQL." . "<br/>";
    } else {
        echo "Se ha conectado correctamente" . "<br/>";
        $lista_productos = $enlace->query('SELECT * FROM producto p');
        echo "Número de resultados: " . $lista_productos->num_rows . "<br/>";
        foreach ($lista_productos as $producto) {
            echo "Nombre: " . $producto["nombre"] . "<br/>";
        }
    }

    echo("CAMBIO0");

    mysqli_close($enlace);


    ?>
    
</body>
</html>




