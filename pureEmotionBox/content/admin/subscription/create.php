<html>
<head>
</head>

<body>
<?php 
include "../../../wp-load.php";
include "../../../wp-content/themes/zurbox-lite/header.php";
require "../../../security-functions.php";
require "../../../tools/enlace.php";
if(!assert_is_shop_admin()){
    header('Location: ../../../index.php');
} 
?>
<form action="<?php if(isset($_GET['subscription'])){echo '../../../tools/save-subscription.php?id='.$_GET['subscription'];} else {echo '../../../tools/save-subscription.php';} ?>" method="POST">
    <?php 

        $enlace = start_database();
        
        if(isset($_GET['subscription'])){
            $id = $_GET['subscription'];   
            $query = 'SELECT * FROM suscripcion where id='.$id;
            $result = mysqli_query($enlace, $query);
            $res = mysqli_fetch_assoc($result);
        } else {
            $id = 0;
        }
        
    ?>
    <input id="id" name="id" hidden="<?php echo $id;?>"/>
    <label for="nombre">Nombre</label>
    <input id="nombre" name="nombre" value="<?php echo $id != 0? $res['nombre']: ""; ?>" required/>
    <br>
    <label for="periodicidad">Periodicidad</label>
    <input id="periodicidad" name="periodicidad" value="<?php echo $id != 0? $res['periodicidad']: ""; ?>" required/>
    <br>
    <label for="precio">Precio</label>
    <input id="precio" name="precio" value="<?php echo $id != 0? $res['precio']:"" ; ?>" required/>
    <br>
    <label for="tematica">Tematica</label>
    <input id="tematica" name="tematica" value="<?php echo $id != 0? $res['tematica']:"" ; ?>" required/>
    <br>
    <label for="activo">Activo</label>
    <input type="checkbox" id="activo" name="activo" value="<?php if($id != 0) { echo $res['activo']==1;} else {echo 0;}?>" <?php if($id != 0 && $res['activo']==1) { echo "checked"; }?> />
    <br>
    
    <?php 
    
    if($_GET['subscription'] == 0) {
        $query = $enlace->query("SELECT * FROM caja where activa = 1");
    ?>

    <label for="caja">Caja</label>
    <select id="caja" name="cajas[]" multiple>
        <?php foreach($query as $caja){ ?>
            <option value="<?php echo $caja['id']; ?>"><?php echo $caja['tematica']; ?></option>
        <?php } ?>
    </select>
    <?php } else { 
        $query_check = $enlace->query("SELECT caja FROM suscripcion_caja where suscripcion=".$_GET['subscription']);
        $ids = array();
        foreach($query_check as $s){
            $ids[]=$s['caja'];
        }
        $query = $enlace->query("SELECT * FROM caja where activa = 1");?>
        <select id="caja" name="cajas[]" multiple>
            <?php foreach($query as $caja){ ?>
                <option value="<?php echo $caja['id']; ?>" <?php echo in_array($caja['id'],$ids)? 'selected':'';?>> 
                    <?php echo $caja['tematica']; ?>
                </option>
            <?php } ?>
        </select>
    <?php } ?>
    <br>
    <input type="submit" value="Guardar"/>
    <?php mysqli_close($enlace);?>
</form>
</body>

</html>
