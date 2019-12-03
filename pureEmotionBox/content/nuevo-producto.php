<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nuevo producto</title>
</head>
<body>
    <form action="/save-product.php" method="POST">
        Nombre:<br>
        <input type="text" name="nombre"><br>
        Descripcion:<br>
        <input type="text" name="descripcion"><br>
        Referencia:<br>
        <input type="text" name="referencia"><br>
        Precio:<br>
        <input type="number" step="0.01" name="precio"><br>
        Imagen:<br>
        <input type="url" name="foto"><br>
        <input type="submit" value="Enviar"/>
    </form>
</body>
</html>