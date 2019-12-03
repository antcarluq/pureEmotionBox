<?php 
include "wp-load.php";

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