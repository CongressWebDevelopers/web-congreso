<?php

function getImagenesFichero($ruta) {
    $imagenes = array();
    $file = fopen($ruta, "r") or exit("Unable to open file!");
    //Output a line of the file until the end is reached
    while (!feof($file)) {
        $imagenes[] = (fgets($file));
    }
    fclose($file);
    return $imagenes;
}

function getDescripcionActividad($ruta) {
    $imagenes = array();
    $texto = array();
    $file = fopen($ruta, "r") or exit("Unable to open file!");
    //Output a line of the file until the end is reached
    $i = -1;
    while (!feof($file)) {
        $cadenaActual = fgets($file);
        if (eregi('.jpg', $cadenaActual)) {
            $i++;
            $imagenes[$i] = $cadenaActual;
        } else
        if (isset($texto[$i]))
            $texto[$i] .= $cadenaActual;
        else
            $texto[$i] = $cadenaActual;
    }
    fclose($file);
    return array("imagenes" => $imagenes, "texto" => $texto);
}

?>
