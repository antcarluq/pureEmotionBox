<html>
<head>
</head>

<body>

<form action="<?php if(isset($_GET['suscripcion'])){echo '../../../tools/buy-subscription.php?id='.$_GET['suscripcion'];} ?>" method="POST">
    <?php 
        include "../../../wp-load.php";
        include "../../../wp-content/themes/zurbox-lite/header.php";
        require "../../../security-functions.php";
        require "../../../tools/enlace.php";

        $enlace = start_database();

        if(isset($_GET['suscripcion'])){
            $id = $_GET['suscripcion'];       
            $query = 'SELECT * FROM suscripcion where activo=1 and id='.$id;
            $result = mysqli_query($enlace, $query);
            $res = mysqli_fetch_assoc($result);
        } else {
            $id = 0;
        }
        
    ?>
    <input id="id" name="id" hidden="<?php echo $id;?>"/>
    <label for="nombre">Nombre</label>
    <input id="nombre" name="nombre" value="<?php echo $id != 0? $res['nombre']: ""; ?>" readonly/>
    <br>
    <label for="periodicidad">Periodicidad</label>
    <input id="periodicidad" name="periodicidad" value="<?php echo $id != 0? $res['periodicidad']: ""; ?>" readonly/>
    <br>
    <label for="precio">Precio</label>
    <input id="precio" name="precio" value="<?php echo $id != 0? $res['precio']:"" ; ?>" readonly/>
    <br>
    <label for="tematica">Tematica</label>
    <input id="tematica" name="tematica" value="<?php echo $id != 0? $res['tematica']:"" ; ?>" readonly/>
    <br>
    
    <?php if(isset($_GET['suscripcion'])) { 
        $query_check = $enlace->query("SELECT caja FROM suscripcion_caja where suscripcion=".$_GET['suscripcion']);
        $ids = array();
        foreach($query_check as $s){
            $ids[]=$s['caja'];
        }
        $query = $enlace->query("SELECT * FROM caja where activa = 1");
        ?>
        <select id="caja" name="cajas[]" readonly multiple>
        <?php foreach($query as $caja){ ?>
        <option value="<?php echo $caja['id']; ?>" <?php echo in_array($caja['id'],$ids)? 'selected':'';?>> 
            <?php echo $caja['tematica']; ?>
        </option>
        <?php } ?>
    </select>
    <?php } ?>
    <br>
    <input type="submit" value="Suscribirse"/>
    <?php mysqli_close($enlace);?>
</form>
</body>

</html>
