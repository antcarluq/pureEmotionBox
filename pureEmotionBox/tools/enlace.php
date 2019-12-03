<?php 
function start_database(){
    $enlace = mysqli_connect("localhost", "pureemotionbox", "pureemotionboxPGPI21", "pureemotionbox");
    $enlace->set_charset("utf8");
    return $enlace;
}