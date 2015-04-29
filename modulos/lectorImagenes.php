<?php
function getImagenesFichero($ruta){
    $imagenes = array();
    $file = fopen($ruta, "r") or exit("Unable to open file!");
    //Output a line of the file until the end is reached
    while(!feof($file)){
        $imagenes[]=(fgets($file));
    }
    fclose($file);
    return $imagenes;
}
function getDescripcionActividad($ruta){
    $imagenes = array();
    $texto = array();
    $file = fopen($ruta, "r") or exit("Unable to open file!");
    //Output a line of the file until the end is reached
    while(!feof($file)){
        $cadenaActual = fgets($file);
        if(eregi('.jpg',$cadenaActual))
            $imagenes[]=$cadenaActual;
    }
    fclose($file);
    return $imagenes;
}
?>
