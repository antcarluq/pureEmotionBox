<?php 
clearstatcache();
include "/wp-load.php";

#Validar que los parametros de un formulario no son nulos
function assert_not_null_list($parametros){
    foreach ($parametros as $parametro) {
        if (is_null($parametro)){
            #throw new Exception("Hay errores en el formulario");
            echo "Se ha producido una excepcion en: " . __FUNCTION__ . "</br>"; 
        }
    break;
    }   
}



function assert_not_null($parametro){
    if (is_null($parametro)){
        #throw new Exception("Hay errores en el formulario");
        echo "Se ha producido una excepcion en: " . __FUNCTION__ . "</br>";
    }
}


#Validar que los parametros de un formulario no son vacios
function assert_not_blank_list($parametros){
    foreach ($parametros as $parametro) {
        $aux = preg_replace('[\W]', "", $parametro);
        if (empty($aux)){
            #throw new Exception("Hay errores en el formulario");
            echo "Se ha producido una excepcion en: " . __FUNCTION__ . "</br>";
        }
    break;
    }   
}

function assert_not_blank($parametro){
    $aux = preg_replace('[\W]', "", $parametro);
    if (empty($aux)){
        #throw new Exception("Hay errores en el formulario");
        echo "Se ha producido una excepcion en: " . __FUNCTION__ . "</br>";
    }
}



#Validar los roles que están ejecutando las acciones
function assert_is_shop_admin(){
    $res = false;
    $user = wp_get_current_user();
    $roles = get_user_meta( $user->id, "wp_capabilities")['0'];
    $key = 'um_shop-admin';
    if ($roles[$key]){
        $res = true;
    }
    return $res;
}

function assert_is_customer(){
    $res = false;
    $user = wp_get_current_user();
    $roles = get_user_meta( $user->id, "wp_capabilities")['0'];
    $key = 'um_cliente';
    if ($roles[$key]){
        $res = true;
    }
    return $res;
}

?>